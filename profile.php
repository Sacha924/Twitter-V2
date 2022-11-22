<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>

<head>
    <?php
		$user = $_SESSION['user_email'];
		$row = mysqli_fetch_array(mysqli_query($con,"select * from users where email='$user'"));
		$user_name = $row['username'];
	?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/profile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title><?php echo "$user_name"; ?></title>
</head>

<body>
    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <?php
                echo"
                <div>
                    <div><img id='cover-img' class='img-rounded' src='cover_pictures/$cover_picture' alt='cover'></div>
                    <form action='profile.php?u_id=$user_ID' method='post' enctype='multipart/form-data'>
                    <ul class='nav pull-left'>
                        <li class='dropdown'>
                            <button class='dropdown-toggle btn btn-default' data-toggle='dropdown'>Change Cover</button>
                            <div class='dropdown-menu'>
                                <p>Click <strong>Select Cover</strong> and then click the <br> <strong>Update Cover</strong></p>
                                <label class='btn btn-info'> Select Cover
                                <input type='file' name='u_cover' size='60' />
                                </label><br/><br/>
                                <button name='submit' class='btn btn-info'>Update Cover</button>
                            </div>
                        </li>
                    </ul>
                    </form>
			</div>
			<div id='profile-img'>
				<img src='profile_pictures/$profil_picture' alt='Profile' class='img-circle' width='180px' height='185px'>
				<form action='profile.php?u_id='$user_ID' method='post' enctype='multipart/form-data'>

				<label id='update_profile'> Select Profile
				<input type='file' name='u_image' size='60' />
				</label><br/><br/>
				<button id='button_profile' name='update' class='btn btn-info'>Update Profile</button>
				</form>
			</div><br/>
            
			";
		?>
        <?php

            if(isset($_POST['submit'])){

                $u_cover = $_FILES['u_cover']['name'];
                $image_tmp = $_FILES['u_cover']['tmp_name'];
                $random_number = rand(1,100);

                if($u_cover==''){
                    echo "<script>alert('Please select a cover image'</script>";
                    echo "<script>window.open('profile.php?u_id=$user_ID' , '_self')</script>";
                    exit();
                }else {
                    move_uploaded_file($image_tmp, "cover_pictures/$u_cover.$random_number");
                    $update = "update users set cover_picture='$u_cover.$random_number' where user_ID='$user_ID'";

                    $run = mysqli_query($con, $update);

                    if($run){
                        echo "<script>alert('Your cover has been updated'</script>";
                        echo "<script>window.open('profile.php?u_id=$user_ID' , '_self')</script>";
                    }
                }
            }
        ?>
    </div>    
    <?php
                    if(isset($_POST['update'])){

                        $u_image = $_FILES['u_image']['name'];
                        $image_tmp = $_FILES['u_image']['tmp_name'];
                        $random_number = rand(1,100);
        
                        if($u_image==''){
                            echo "<script>alert('Please select a profil image by clicking on your profile image'</script>";
                            echo "<script>window.open('profile.php?u_id=$user_ID' , '_self')</script>";
                            exit();
                        }else {
                            move_uploaded_file($image_tmp, "users/$u_image.$random_number");
                            $update = "update users set user_image='$u_image.$random_number' where user_ID='$user_ID'";
        
                            $run = mysqli_query($con, $update);
        
                            if($run){
                                echo "<script>alert('Your Profil image has been updated'</script>";
                                echo "<script>window.open('profile.php?u_id=$user_ID' , '_self')</script>";
                            }
                        }
                    }
    ?>

</body>

</html>