<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/about_us.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>About Us</title>
</head>

<body>

    <div class="MainContainer">
        <div class="NavBarContainer">
            
            
                <div class="WebsiteIcon">
                    <img src="../images_for_design/image_LogoONNLINE.png" style="width:130%;border-radius:12%;"/>
                </div>
                
            
                <div class="ButtonsContainer">
                        <form method="post" action="">
                            
                            <div class="col-sm-2">
                                <button class="features" name="about_us">About us</button><br /><br />
                            </div>
                            <div class="col-sm-2">
                                <button class="features" name="rate_the_app">Rate the App</button><br /><br />
                            </div>
                            <div class="col-sm-2">
                                <button class="features" name="future_updates">Future Updates</button><br /><br />
                            </div>
                            <div class="col-sm-2">
                                <button id="signup" name="signup">Sign up</button><br /><br />
                            </div>
                            <div class="col-sm-2">
                                <button id="login" name="login">Login</button><br /><br />
                            </div>
                        </form>
                </div>
            </div>
                <?php
                    if(isset($_POST['rate_the_app'])){
                        echo "<script>window.open('./rate_the_app.php','_self')</script>"; 
                        // with the '_self' URL replaces the current page
                    }
                    if(isset($_POST['about_us'])){
                        echo "<script>window.open('./about_us.php','_self')</script>"; 
                    }
                    if(isset($_POST['future_updates'])){
                        echo "<script>window.open('./future_updates.php','_self')</script>"; 
                    }
                    if(isset($_POST['signup'])){
                        echo "<script>window.open('../signup.php','_self')</script>"; 
                    }
                    if(isset($_POST['login'])){
                        echo "<script>window.open('../signin.php','_self')</script>"; 
                    }
                ?>
            
         <div class = "container">
            
             <div class="container" id="Top">
                <div class="Left">
                    <div class  = "Title">What is ONNLINE?</div>
                    <div class  = "Corpus">This is a project where we provide a Social Media where you can discuss with other people and share whatever you want in your feed. For further informations look at our GitHub : https://github.com/Sacha924/Web-Development-Project</div>
                </div>
                <div class="Right">
                    <div class = "SM_Image"> <img src="../images_for_design/image-4.png" style="width:200%;border-radius:12%;"/> </div>
                </div>
            </div>
            
            
            <div class="container">
                <div class  = "Title">Who are we ?</div>
                <div class  = "Corpus">We are 5 students (Hugo, Paolig, Sacha, Arthur and Antoine) in first year of master at the ESILV Paris. We’re doing this project in our class of Web Development and we split tasks between us to use the best of everyone</div>
            </div>
            
            <div class="container_col" id="Top">
                <div class="LeftName">
                    <div class = "Corpus_Small">Paolig : Futur développeur blockchain, ou éboueur en fonction de comment se passe le semestre </div>
                </div>
                <div class="RightImage">
                    <div > <img src="../images_for_design/image_pao.png" style="width:150%;border-radius:12%;"/> </div>
                </div>
            </div>

            <div class="container_col">
                <div class="LeftImage">
                    <div > <img src="../images_for_design/image_sacha.png" style="width:140%;border-radius:12%;"/> </div>
                </div>
                <div class="RightName">
                    <div class = "Corpus_Small">Sacha : Dev solidity qui passe plus de temps à la salle que sur un ordi</div>
                </div>
            </div>

            <div class="container_col">
                <div class="LeftName">
                    <div class = "Corpus_Small">Hugo : Futur ingénieur en Fintech, il passe autant de temps à essayer de progresser aux échecs qu'à échouer de progresser en Rust.</div>
                </div>
                <div class="RightImage">
                    <div > <img src="../images_for_design/image_hugo.png" style="width:140%;border-radius:12%;"/> </div>
                </div>
            </div>

            <div class="container_col">
                <div class="LeftImage">
                    <img src="../images_for_design/image_antoine.png" style="width:140%;border-radius:12%;"/>
                </div>
                <div class="RightName">
                    <div class = "Corpus_Small">Antoine : Il ne comprend pas Figma mais fait de beaux prototypes. Coach Solidity il s'initie au Front comme il peut.</div>
                </div>
            </div>

            <div class="container_col">
                <div class="LeftName">
                <div class = "Corpus_Small">Arthur : Ich bin Rodolf Van Der Schmutz Von Berlin</div>
                </div>
                <div class="RightImage">
                    <div > <img src="../images_for_design/image_arthur.png" style="width:170%;border-radius:12%;"/> </div>
                </div>
            </div>

        </div>  
    </div>
</div>

                       
</body>

</html>