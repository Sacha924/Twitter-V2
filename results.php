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
    <title>See Results</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title><?php echo "$user_name"; ?></title>
</head>

<body>
    <div class="row">
        <center>
            <h2>See Results</h2>     
        </center>         
        <?php results(); ?> 
    </div> 
</body>
</html>
