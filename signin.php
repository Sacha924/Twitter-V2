<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/signin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <h1>Website_Title</h1>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="main-content">
                <div class="header">
                    <h3><strong>Join Our Social Network</strong></h3>
                    <hr>
                </div>
                <div class="l-part">
                    <form method="post" action="">
                        <input type="email" name="u_email" placeholder="Email" required="required"
                            class="form-control input-md"><br />
                        <div class="overlap-text">
                            <input type="password" name="u_pass" placeholder="Password" required="required"
                                class="form-control input-md"><br />
                        </div>
                        <a data-toggle=" tooltip" title="Create Account!" href="signup.php">Don't have an
                            account?</a><br /><br />

                        <button id="signin" class="btn btn-info btn-lg" name="login">Login</button>
                        <?php 
                        session_start();
                        include("includes/connection.php");
                        if(isset($_POST['login'])){
                            $email = htmlentities(mysqli_real_escape_string($con,$_POST["u_email"]));
                            $password = htmlentities(mysqli_real_escape_string($con,$_POST["u_pass"]));
                            $check_user = mysqli_num_rows(mysqli_query($con,"select * from users where email='$email' AND password='$password'"));
                            if($check_user == 1){
                                // Session variables are shared by all PHP pages in a session (accessed from the same browser). They allow the passage of information between pages.
                                $_SESSION['user_email'] = $email;
                                // echo "<script>window.location.href='profile.php'</script>";
                                echo "<script>window.open('profile.php', '_self')</script>";
                            }else{
                                echo"<script>alert('Your email or password is incorrect, try again')</script>";
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>