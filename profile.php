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
                            <button class='dropdown-toggle btn btn-default' data-toggle='dropdown' id ='changeCover'>Change Cover</button>
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
            $random_number = rand(1,100000);

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
                $random_number = rand(1,100000);

                if($u_image==''){
                    echo "<script>alert('Please select a profil image by clicking on your profile image'</script>";
                    echo "<script>window.open('profile.php?u_id=$user_ID' , '_self')</script>";
                    exit();
                }else {
                    move_uploaded_file($image_tmp, "profile_pictures/$u_image.$random_number");
                    $update = "update users set profil_picture='$u_image.$random_number' where user_ID='$user_ID'";

                    $run = mysqli_query($con, $update);

                    if($run){
                        echo "<script>alert('Your Profil image has been updated'</script>";
                        echo "<script>window.open('profile.php?u_id=$user_ID' , '_self')</script>";
                    }
                }
            }
    ?>
        <div class="col-sm-2">

        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-2" id="user_infos">
            <?php
		echo"<h2><strong>About</strong></h2>
			<h4><strong>$first_name $last_name</strong></h4>
			<p><strong><i style='color:grey;'>$biography</i></strong></p><br>
			<p><strong>Relationship Status: </strong> $Relationship_status</p><br>
			<p><strong>Member Since: </strong> $register_date</p><br>";
		?>
        </div>
        <div class="col-sm-6">
            <?php
            global $con;
            if(isset($_GET['u_id'])){
                $u_id = $_GET['u_id'];
            }
            $get_posts = "select * from posts where user_ID='$user_ID' ORDER by 1 DESC LIMIT 5";
            $run_posts = mysqli_query($con, $get_posts);

            while ($row_posts=mysqli_fetch_array($run_posts)){
                $post_id=$row_posts['post_id'];
                $user_id=$row_posts['user_ID'];
                $content=$row_posts['post_content'];
                $upload_image=$row_posts['upload_image'];
                $post_date=$row_posts['post_date'];

                $user = "select * from users where user_ID='$user_id' AND posts='yes'";

                $run_user = mysqli_query($con, $user);
                $row_user=mysqli_fetch_array($run_user);

                $user_name=$row_user['username'];
                $user_image=$row_user['profil_picture'];

                if($content == 'No' && strlen($upload_image) >= 1){
                    echo "
                        <div id='own_posts'>
                            <div class='row'>
                                <div class='col-sm-2'>
                                    <p><img src='profile_pictures/$user_image' class='img-circle' width='100px' height='100px'></p>
                                
                                </div>

                                <div class='col-sm-6'>
                                    <h3><a style='text-decoration:none; cursor:pointer; color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                                    <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                                </div>
                                <div class='col-sm-4'>
                                </div>

                            </div>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
                                </div>  
                            </div><br>
                            <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a>
                            <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>  
                        </div>
                        <br><br>

                    ";
                }
                else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
                    echo "
                        <div id='own_posts'>
                            <div class='row'>
                                <div class='col-sm-2'>
                                    <p><img src='profile_pictures/$user_image' class='img-circle' width='100px' height='100px'></p>
                                
                                </div>

                                <div class='col-sm-6'>
                                    <h3><a style='text-decoration:none; cursor:pointer; color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                                    <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                                </div>
                                <div class='col-sm-4'>
                                </div>

                            </div>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <p>$content</p>
                                    <img id='posts-img' src='cover_pictures/$upload_image' style='height:350px;'>
                                </div>  
                            </div><br>
                            <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a>
                            <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>  
                        </div>
                        <br><br>

                    ";
                }
                else{
                    echo "
                        <div id='own_posts'>
                            <div class='row'>
                                <div class='col-sm-2'>
                                    <p><img src='profile_pictures/$user_image' class='img-circle' width='100px' height='100px'></p>
                                
                                </div>

                                <div class='col-sm-6'>
                                    <h3><a style='text-decoration:none; cursor:pointer; color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                                    <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                                </div>
                                <div class='col-sm-4'>
                                </div>

                            </div>
                            <div class='row'>
                                <div class='col-sm-2'>
                                </div>
                                <div class='col-sm-6'>
                                    <h3><p>$content</p></h3>
                                </div>  
                                <div class='col-sm-4'>
                                </div>
                            </div>
                        </div>
                        <br><br>

                    ";

                    global $con;
                    if(isset($_GET['u_id'])){
                        $u_id = $_GET['u_id'];
                    }
                    $get_posts ="select email from users where user_ID='$u_id'";
                    $run_user = mysqli_query($con, $get_posts);
                    $row=mysqli_fetch_array($run_user);
                    $u_email = $row['email'];
                    $user = $_SESSION['user_email'];
                    $get_user = "select * from users where email='$user'";
                    $run_user = mysqli_query($con, $get_user);
                    $row=mysqli_fetch_array($run_user);
                    
                    $user_id = $row['user_ID'];
                    $user_email = $row['email'];
                    if ($u_email!= $user_email){
                        echo "<script>window.open('profile.php?u_id=$user_id', '_self')</script>";
                    }
                    else {
                        echo "
                            <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a>
                            <a href='edit_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>Edit</button></a>
                            <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>  
                        
                        ";
                    }
                }

                include("functions/delete_post.php");
            }
            ?>
        </div>
        <div class='col-sm-2'>
        </div>
    </div>

</body>

</html>