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
    <title>Edit Account Settings</title>
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
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <form action="" method="post" enctype="mutlipart/form-data">
                <table class="table table-bordered table-hover">
                    <tr align="center">
                        <td colspan="6" class="active">
                            <h2>Change Your Profile</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Change Your First Name</td>
                        <td>
                            <input class="form-control" type="text" name="f_name" required value="<?php echo $first_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Change Your Last Name</td>
                        <td>
                            <input class="form-control" type="text" name="l_name" required value="<?php echo $last_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Change Your Username</td>
                        <td>
                            <input class="form-control" type="text" name="username" required value="<?php echo $username; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Biography</td>
                        <td>
                            <input class="form-control" type="text" name="biography" required value="<?php echo $biography; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Relationship Status</td>
                        <td>
                            <select class="form-control" name="Relationship">
                                <option><?php echo $Relationship_status; ?></option>
                                <option>Single</option>
                                <option>In a Relationship</option>
                                <option>Engaged</option>
                                <option>Married</option>
                                <option>It's Complicated</option>
                                <option>Separated</option>
                                <option>Divorced</option>
                                <option>Widowed</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Password</td>
                        <td>
                            <input class="form-control" type="password" name="password" id="user_ID" required value="<?php echo $password; ?>">
                            <input type="checkbox" onclick="myFunction()"><strong> Show Password </strong>
                        </td>        
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Email</td>
                        <td>
                            <input class="form-control" type="email" name="email" required value="<?php echo $email; ?>">
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="6">
                            <input type="submit" name="update" class="btn btn-info" value="Update">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
<?php
    if(isset($_POST['update'])){
        $first_name = htmlentities($_POST['f_name']);
        $last_name = htmlentities($_POST['l_name']);
        $username = htmlentities($_POST['username']);
        $Relationship = htmlentities($_POST['Relationship']);
        $password = htmlentities($_POST['password']);
        $email = htmlentities($_POST['email']);
        $biography = htmlentities($_POST['biography']);      

        $update = "update users set f_name='$first_name', l_name='$last_name', username='$username', Relationship='$Relationship', password='$password', email='$email', biography='$biography' where user_ID=$user_ID";

        $run = mysqli_query($con, $update);
        
        if($run){
            echo "<script>alert('Your Profile Updated!')</script>";
            echo "<script>window.open('edit_profile.php?u_id$user_ID, '_self')</script>";
        }
    }
?>