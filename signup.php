<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/signup.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Signup</title>

</head>

<body>
    <div class="top">
        <div style="background-color: #068d9d;margin-bottom:5%;">
            <img src="./images_for_design/image_LogoONNLINE.png" style="margin: 3% 0 3% 35%;width:30%;border-radius:12%;"/>
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
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input type="text" class="form-control" placeholder="Username" name="username"
                                required="required">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input type="text" class="form-control" placeholder="First Name" name="first_name"
                                required="required">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input type="text" class="form-control" placeholder="Last Name" name="last_name"
                                required="required">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" placeholder="Password"
                                name="u_pass" required="required">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="email" type="email" class="form-control" placeholder="Email" name="u_email"
                                required="required">
                        </div><br>
                        <a data-toggle="tooltip" title="-->Signin" href="signin.php">Already have an
                            account?</a><br><br>
                        <!-- data-toggle="tooltip" comes from boostrap and allows us to create a tooltip. We use the title attribute to spectify thet text that should be display inside tooltip -->

                        <button id="signup" class="btn btn-info btn-lg" name="sign_up">Signup</button>
                        <?php 
                        include("add_user.php"); 
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>