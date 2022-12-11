<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Find People</title>
</head>
<body>
    <div class="row">
        <div class="col-sm-12">
            <center><h2>Find New People </h2></center><br><br>
            <div class="row">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-4">
                    <form class="search_form" action="">
                        <input type="text" placeholder="Search Friend" name="search_user">
                        <button class="btn btn-info" type="submit" name="search_user_btn">Search</button>
                    </form>
                </div>
            
            <div class="col-sm-4">
            </div>
            </div><br><br>
            <?php search_user();?>

        </div>
    </div>
</body>
</html>