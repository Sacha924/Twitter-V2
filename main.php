<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <h1>WebPage_Title</h1>
            </div>
        </div>
    </div>


    <div class="flex-row">
        <div class="flex-col">
            <div class="tagline">
                <span class="black">Meet</span>
                <span class="red">New</span> <br /><br />
                <span class="green">Friends</span> <br /><br />
                <span class="blue">Everywhere</span>
            </div>
            <div class="advertising">
                <img class="ellipse" src="images_for_design/profil-1.png" alt="profil 1" />
                <img class="ellipse" src="images_for_design/profil-2.png" alt="profil 2" />
                <img class="ellipse" src="images_for_design/profil-3.png" alt="profil 3" />
                <img class="ellipse" src="images_for_design/profil-4.png" alt="profil 4" />
                <div class="overlap-adv">
                    <div class="users_number">+ 1000</div>
                    <div class="active-users">Active Users</div>
                </div>
            </div>

        </div>
        <img class="welcome_image" src="images_for_design/image-1.png" alt="image 1" />
    </div>

    <div class="loggin-form">
        <form method="post" action="">
            <div class="col-sm-6">
                <button id="signup" class="btn btn-info btn-lg" name="signup">Sign
                    up</button><br /><br />
                <?php
                    if(isset($_POST['signup'])){
                        echo "<script>window.open('signup.php','_self')</script>"; 
                        // with the '_self' URL replaces the current page
                    }
                    ?>
            </div>
            <div class="col-sm-6">
                <button id="login" class="btn btn-info btn-lg" name="login">Login</button><br /><br />
                <?php
                    if(isset($_POST['login'])){
                        echo "<script>window.open('signin.php','_self')</script>"; 
                    }
                    ?>
            </div>
        </form>
    </div>

</html>