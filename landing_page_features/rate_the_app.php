<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/rate_the_app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
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
                        <div class = "Title">Support and FAQ ?</div>
                        <div class = "Corpus" >If you saw a problem on our Website don’t hesitate to reach us on our <a href="https://github.com/Sacha924/Web-Development-Project">Github</a> or by email to : sacha.simon@edu.devinci.fr Sacha will be pleased to answer your question and take your crititcs. </div>
                    </div>
                    <div class="Right">
                        <div> <img src="../images_for_design/image-5.png" style="width:160%;border-radius:12%;"/> </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="Futures_Updates">
                    <div class = "Title">Frequently Ask Questions :</div>
                    <div class = "Corpus">You can find here some basic question and answers to have to improce your experiience on ONNLINE.</div>
                </div>
            
                <div class="DM">
                    <div class = "Title_Small">Are these pages the current social media ?</div>
                    <div class = "Corpus_Small">No, these pages are a support, landing featutres to help your comprehension of our project and its advancement. To go on our social media please click on the Login or Signup button on the top right of the page.</div>
                </div>
            
                <div class="LD">
                    <div class = "Title_Small">How did you work on this project ?</div>
                    <div class = "Corpus_Small">First we created the architecture of the website to understand what everyone wanted and how to create it. After we split our team into different categories to improves our researches and gain time during the implementation of the website.</div>
                </div>
            
                <div class="PI">
                    <div class = "Title_Small">Why ONNLINE ?</div>
                    <div class = "Corpus_Small">Our name is a reference of another project where all 5 of us are working on. We are working with a start-up named OFFLINE so we choose this name was evident of everyone.</div>
                </div>
            
                <div class="AI">
                    <div class = "Title_Small">How was the work’s atmosphere ?</div>
                    <div class = "Corpus_Small">Working together is always a great experience. We knew each other before this project and we really like working together so this project was really pleasant to work together.</div>
                </div>
            </div>
           
            <div class = "Footer">
                <div class = Corpus></br>This Social media was created entirely by Hugo, Paolig, Arthur, Sacha and Antoine.</br>Thanks for your support !</br>_____________</div>
            </div>
         
    </div>
</body>



</html>