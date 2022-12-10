<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/future_updates.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Future Updates</title>
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
            <div class="container">
                <div class="container" id="Top">
                    <div class="Left">
                        <div class = "Title">What are we doing now ?</div>
                        <div class = "Corpus" >We are currently implementing our Website with every features that it needs. You can follow our real time advancement in our <a href="https://github.com/Sacha924/Web-Development-Project">Github</a>.</div>
                    </div>
                    <div class="Right">
                        <div> <img src="../images_for_design/image-2.png" style="width:100%;border-radius:12%;"/> </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="Futures_Updates">
                    <div class = "Title">What Could be our futures updates ?</div>
                    <div class = "Corpus">We would love to improve our website and there is somes ideas we have to improve the experience of every user of ONNLINE.</div>
                </div>
            
                <div class="DM">
                    <div class = "Title_Small">Direct Messages</div>
                    <div class = "Corpus_Small">We are aware that our Social Media doesn’t provide direct messages like other medias do. We are working on this area, this is the first featutre we would like to add when we will have finished our current website.</div>
                </div>
            
                <div class="LD">
                    <div class = "Title_Small">Likes & Dislikes</div>
                    <div class = "Corpus_Small">To improve your possibility of showing your point of vue we would love to include Likes and Dislikes for your post so that you could really see the impact you have on other users.</div>
                </div>
            
                <div class="PI">
                    <div class = "Title_Small">Post Images</div>
                    <div class = "Corpus_Small">This feature will be essential to help you illustrating your post and with direct message, it should help you to share images to your friends / colleagues if you want to.</div>
                </div>
            
                <div class="AI">
                    <div class = "Title_Small">AI for your feed</div>
                    <div class = "Corpus_Small">To improve your experience we would love to implement an AI that will be based on your likes / dislikes so that it will adapt itself to your will.</div>
                </div>
            </div>
           
            <div class = "Footer">
                <div class = Corpus></br>This Social media was created entirely by Hugo, Paolig, Arthur, Sacha and Antoine.</br>Thanks for your support !</br>_____________</div>
            </div>
         
    </div>
</body>



</html>