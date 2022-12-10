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
    <link rel="stylesheet" href="style/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title><?php echo "$user_name"; ?></title>
</head>

<body>
    <div class="row">
        <div id="insert_post" class="col-sm-12">
            <form action="app.php?id=<?php echo $user_ID; ?>" method="post" id="f" enctype="multipart/form-data">
                <textarea class="form-control" id="content" rows="4" name="content"
                    placeholder="What's in your mind?"></textarea><br>
                <label class="btn btn-warning" id="upload_image_button">Select Image
                    <input type="file" name="upload_image" size="30">
                </label>
                <button id="btn-post" class="btn btn-success" name="sub">Post</button>
            </form>
            <?php insertPost(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2><strong>News Feed</strong></h2><br>
            <?php echo get_posts(); ?>
        </div>
    </div>
</body>

</html>