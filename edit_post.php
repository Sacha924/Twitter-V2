<!DOCTYPE html>
<html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Edit Post</title>
</head>

<body>
    <div class='row'>
        <div class='col-sm-3'>

        </div>
        <div class='col-sm-6'>
            <?php
                if(isset($_GET['post_id'])){
                    $get_id = $_GET['post_id'];
                    $get_post = "select * from posts where post_id='$get_id'";
                    $run_post = mysqli_query($con, $get_post);
                    $row = mysqli_fetch_array($run_post);
                    $content = $row['post_content'];
                }
            ?>
            <form action="" method="post" id="f" enctype="multipart/form-data">
                <center><h2>Edit Your Post</h2></center><br>
                <textarea class="form-control" id="content" rows="4" name="content"><?php echo $content; ?></textarea><br>
                <button id="btn-post" class="btn btn-info" name="update">Update</button>
            </form>

            <?php
                if(isset($_POST['update'])){
                    $content = $_POST['content'];
                    $update_post = "update posts set post_content='$content' where post_id='$get_id'";
                    $run_update = mysqli_query($con, $update_post);
                    if($run_update){
                        echo "<script>alert('Post has been updated!')</script>";
                        echo "<script>window.open('app.php', '_self')</script>";
                    }
                }
            ?>
        </div>

    </div>
</body>
</html>