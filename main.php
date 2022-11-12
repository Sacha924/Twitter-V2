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

    <div class="MainContainer">
        <div class="NavBarContainer">
            <div class="WebsiteHead">
                <div class="WebsiteIcon">
                    <svg width="65" height="55" viewBox="0 0 65 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M32.5 0L40.0212 20.7295H64.3604L44.6696 33.541L52.1908 54.2705L32.5 41.459L12.8092 54.2705L20.3304 33.541L0.639606 20.7295H24.9788L32.5 0Z"
                            fill="#AEECEF" />
                    </svg>
                </div>
                <div class="WebsiteName">Social Network Name</div>
            </div>
            <div class="PagesContainer">
                <div class="Page">About us</div>
                <div class="Page">Rate the app</div>
                <div class="Page">Future Updates</div>
            </div>
            <div class="ButtonsContainer">
                <div class="loggin-form">
                    <form method="post" action="">
                        <div class="col-sm-6">
                            <button id="signup" name="signup">Sign up</button><br /><br />
                            <?php
                    if(isset($_POST['signup'])){
                        echo "<script>window.open('signup.php','_self')</script>"; 
                        // with the '_self' URL replaces the current page
                    }
                    ?>
                        </div>
                        <div class="col-sm-6">
                            <button id="login" name="login">Login</button><br /><br />
                            <?php
                    if(isset($_POST['login'])){
                        echo "<script>window.open('signin.php','_self')</script>"; 
                    }
                    ?>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="ContentContainer">
            <div class="PreviewImage"><svg width="449" height="529" viewBox="0 0 449 529" fill="none"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="449" height="529" rx="83" fill="url(#pattern0)" />
                    <defs>
                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_123_6"
                                transform="translate(-0.212903 0.060274) scale(0.00322581 0.00273973)" />
                        </pattern>
                        <image id="image0_123_6" width="460" height="345" href="images_for_design/image-1.png" />
                    </defs>
                </svg>
            </div>
            <div class="BullesContainer">
                <div class="AvatarImage1"><img src="images_for_design/profil-1.png" /></div>
                <div class="AvatarImage2"><img src="images_for_design/profil-2.png" /></div>
                <div class="AvatarImage3"><img src="images_for_design/profil-3.png" /></div>
                <div class="AvatarImage4"><img src="images_for_design/profil-4.png" /></div>
                <div class="Advertising"><span class="Span1">+ 1000 </span><span class="Span2">actives users</span>
                </div>
            </div>
            <div class="TextContent">
                <div class=" CTATitle">
                    <div>Meet New</div>
                    <div>Friends</div>
                    <div>Everywhere</div>
                </div>
                <div class="CTAButton">Join WEBSITE</div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>