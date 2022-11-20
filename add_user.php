<?php
include("includes/connection.php");

if(isset($_POST['sign_up'])){
    // mysqli_real_escape_string makes data safe for inserting into MySQL
    // Htmlentities makes data safe for outputting into an HTML document
    //in parameter of mysqli_real_escape_string we put the con variable from connection.php, and the second parameter is the string to be escaped ($_POST_["nameInTheForm"]).
    $first_name = htmlentities(mysqli_real_escape_string($con,$_POST["first_name"]));
    $last_name = htmlentities(mysqli_real_escape_string($con,$_POST["last_name"]));
    $username = htmlentities(mysqli_real_escape_string($con,$_POST["username"]));
    $email = htmlentities(mysqli_real_escape_string($con,$_POST["u_email"]));
    $password = htmlentities(mysqli_real_escape_string($con,$_POST["u_pass"]));
    $biography="Welcome on my profile, this is my default status !";
    $relationship= ".";
    $profile_picture = "default_profile.png";
    $cover_picture = "default_cover.png";
    // $reg_date directly define in our insert values 
    $posts = "no";
    
    //verification on password
    // add a regexp for the security of the password
    if(strlen($password) <8 ){
        echo"<script>alert('Password should be minimum 8 characters!')</script>";
        exit();
        //die();
    }
    
    //verification on username (check that the username is not already used in our app)
	$usernameCheck = mysqli_num_rows(mysqli_query($con,"select username from users where username='{$username}'"));
    if($usernameCheck == 1){
        echo "<script>alert('Username already used, Please try using another username'); window.open('signup.php', '_self') </script>";
        exit();
        //die();
    }
    
    //verification on email (check that the email address is not already used in our app)
    $emailCheck = mysqli_num_rows(mysqli_query($con, "select * from users where email='{$email}'"));
    if($emailCheck == 1){
        echo "<script>alert('Email already exist, Please try using another email'); window.open('signup.php', '_self') </script>";
        exit();
    }
    
    $query = mysqli_query($con,"insert into users (f_name,l_name,username,email,password,biography,relationship,profil_picture,cover_picture,reg_date,posts) values('$first_name','$last_name','$username','$email','$password','$biography','$relationship','$profile_picture','$cover_picture',NOW(),'$posts')");
    
    if($query){
        echo "<script>alert('Welcome $first_name, you are an official new member Congratulation !'); window.open('signin.php', '_self') </script>";
    }
    else{
        echo "<script>alert('An error occured with your Registration ...'); window.open('signup.php', '_self') </script>";
    }
}
?>