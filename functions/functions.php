<?php

$con = mysqli_connect("localhost","root","","web_dev_fin_a4") or die("Connection was not established");

//function for inserting post
function insertPost(){
	if(isset($_POST['sub'])){
		global $con;    //To be able to use the con and user_ID variable everywhere
		global $user_ID;
        $content = htmlentities($_POST['content']);
		$upload_image = $_FILES['upload_image']['name'];
		$image_tmp = $_FILES['upload_image']['tmp_name'];
		$random_number = rand(1, 100000);
        //Check the length of the mess is Ok
        if(strlen($content) > 250){
			echo "<script>alert('Please Use 250 or less than 250 words!')</script>";
			echo "<script>window.open('app.php', '_self')</script>";
		}else{
            //We need to trate all the case :
            // Does the user post an image
            // Does the user post text 
            //Does the user post both ... Or Nothing!
			if(strlen($upload_image) >= 1 && strlen($content) >= 1){
				move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");
				$insert = "insert into posts (user_ID, post_content, upload_image, post_date) values('$user_ID', '$content', '$upload_image.$random_number', NOW())";

				$run = mysqli_query($con, $insert);
                if($run){
					echo "<script>alert('Your Post updated a moment ago!')</script>";
					echo "<script>window.open('app.php', '_self')</script>";

					$update = "update users set posts='yes' where user_ID='$user_ID'";
					$run_update = mysqli_query($con, $update);
				}

				exit();
			}else{
				if($upload_image=='' && $content == ''){
					echo "<script>alert('Error Occured while uploading!')</script>";
					echo "<script>window.open('app.php', '_self')</script>";
				}else{
					if($content==''){
						move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");
						$insert = "insert into posts (user_ID,post_content,upload_image,post_date) values ('$user_ID','No','$upload_image.$random_number',NOW())";
						$run = mysqli_query($con, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('app.php', '_self')</script>";

							$update = "update users set posts='yes' where user_ID='$user_ID'";
							$run_update = mysqli_query($con, $update);
						}

						exit();
					}else{
						$insert = "insert into posts (user_ID, post_content, post_date) values('$user_ID', '$content', NOW())";
						$run = mysqli_query($con, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('app.php', '_self')</script>";

							$update = "update users set posts='yes' where user_ID='$user_ID'";
							$run_update = mysqli_query($con, $update);
						}
					}
				}
			}
		}
	}
}
        
?>