<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Messages</title>
</head>
<style>
#scroll_messages {
    max-height: 500px;
    overflow: scroll;
}

#btn-msg {
    width: 20%;
    height: 28px;
    border-radius: 5px;
    margin: 5px;
    border: none;
    color: #fff;
    float: right;
    background-color: #2ecc71;
}

#select_user {
    max-height: 500px;
    overflow: scroll;
}

#green {
    background-color: #2ecc71;
    border-color: #2980b9;
    width: 45%;
    border-radius: 3px;
    float: left;
    margin-bottom: 5px;
    padding: 2.5px;
    font-size: 16px;

}

#blue {
    background-color: #e74c3c;
    border-color: #c0392b;
    width: 45%;
    border-radius: 3px;
    float: right;
    margin-bottom: 5px;
    padding: 2.5px;
    font-size: 16px;
}
</style>

<body>
    <div class="row">
        <?php
       if(isset($_GET['u_id'])){
        global $con;

        $get_id=$_GET['u_id'];

        $get_user="select * from users where user_ID='$get_id'";

        $run_user= mysqli_query($con,$get_user);
        $row_user=mysqli_fetch_array($run_user);
        if (isset($row_user['user_ID']) && isset($row_user['username'])) {
            $user_to_msg=$row_user['user_ID'];
            $user_to_name=$row_user['username'];
        }else{
            $user_to_msg='';
            $user_to_name='';
        }
       }
       $user=$_SESSION['user_email'];
       $get_user="select * from users where email='$user'";
       $run_user=mysqli_query($con,$get_user);
       $row=mysqli_fetch_array($run_user);

       $user_from_msg=$row['user_ID'];
       $user_from_name=$row['username'];

        ?>
        <div class="col-sm-3" id="select_user">
            <?php
                $user="select * from users";

                $run_user=mysqli_query($con,$user);
                while($row_user=mysqli_fetch_array($run_user)){
                    $user_id=$row_user['user_ID'];
                    $user_name=$row_user['username'];
                    $first_name=$row_user['f_name'];
                    $last_name=$row_user['l_name'];
                    $user_image=$row_user['profil_picture'];

                    echo"
                        <div class='container-fluid'>
                            <a style='text-decoration: none; cursor:pointer;color:#7397F0;' href='messages.php?u_id=$user_id'>
                            <img class='img-circle' src='profile_pictures/$user_image' width='100px' height='90px title='$user_name'>   
                            <strong>&nbsp $first_name $last_name</strong><br><br>
                            </a>                     
                        </div>
                    ";
                }                 
            ?>
        </div>
        <div class="col-sm-6">
            <div class="load_msg" id="scroll_messages">
                <?php
                $sel_msg = "select * from user_messages where (user_to='$user_to_msg'
                        AND user_from='$user_from_msg') OR (user_from='$user_to_msg' AND 
                        user_to='$user_from_msg') ORDER by 1 ASC";
                $run_msg = mysqli_query($con, $sel_msg);
                while ($row_msg=mysqli_fetch_array($run_msg)){
                    $user_to = $row_msg['user_to'];
                    $user_from = $row_msg['user_from'];
                    $msg_body = $row_msg['msg_body'];
                    $msg_date = $row_msg['date'];
                        ?>
                <div id="loaded_msg">
                    <p><?php if($user_to ==$user_to_msg AND $user_from=$user_from_msg){
                                echo "<div class= 'message' id='blue' data-toggle='tooltip' title='$msg_date'>$msg_body
                                </div><br><br><br>";}
                                else if($user_from == $user_to_msg AND $user_to==$user_from_msg)
                                {echo "<div class='message' id='green' data-toggle='tooltip' title='$msg_date'>msg_body</div><br><br><br> ";}
                            ?></p>
                </div>
                <?php
                    }
                ?>
            </div>
            <?php
            if(isset($_GET['u_id'])){
                $u_id = $_GET['u_id'];
                if($u_id=="new"){
                    echo '
                        <form>
                            <center><h3>Select Someone To Chat</h3></center>
                            <textarea disabled class="form-control" placeholder="Enter you Message"></textarea>
                            <input type="submit" class="btn btn-default" disabled value="Send">
                            </form><br><br>
                    ';
                }
                else{
                echo '<form action="" method="POST">
                    <textarea class="form-control" placeholder="Enter you Message" name="msg_box" id="message_textarea"></textarea>
                    <input type="submit" name="send_msg" id="btn-msg" value="Send">
                    </form><br><br>
                    ';
                }
            }
        ?>

            <?php 
            if(isset($_POST['send_msg'])){
            $msg = htmlentities($_POST['msg_box']);

            if($msg == ""){
                echo "<h4 style='color:red;text-align: center;'>Message could not be sent!</h4> ";    
            }
            else if(strlen($msg) >50){
                echo "<h4 style='color:red;text-align: center;'>Message too long</h4> ";    
            }
            else{
                $insert = "insert into user_messages(user_to,user_from,msg_body,date,msg_seen) 
                values ('$user_to_msg', '$user_from_msg', '$msg', NOW(), 'no')";

                $run_insert = mysqli_query($con, $insert);
            }
            }
        ?>
        </div>
        <div class="col-sm-3">
            <?php
            if (isset($_GET['u_id'])) {

                global $con;

                $get_id = $_GET['u_id'];

                $get_user = "select * from users where user_ID='$get_id'";
                $run_user = mysqli_query($con, $get_user);
                $row = mysqli_fetch_array($run_user);
                
                if(isset($row['user_ID'])){
                    $user_id=$row['user_ID'];
                    $user_name=$row['username'];
                    $f_name=$row['f_name'];
                    $l_name=$row['l_name'];
                    $user_image = $row['profil_picture'];      
                }
                else{
                    $user_id='';
                    $user_name='';
                    $f_name='';
                    $l_name='';
                    $user_image ='';
                }

            }
            if($get_id=="new"){

            }
            else{
                echo" 
                    <div class='row'>
                        <div class='col-sm-2'>
                        </div>
                        <center>
                            <div style ='background-color:#e6e6e6;' class='col-sm-9'>
                                <h2>Information about</h2>

                                <ul class='list-group'>
                                    <li class='list-group-item' title='Username'><strong>$f_name</strong></li>
                                </ul>
                            </div>
                            <div class='col-sm-1'>
                            </div>
                        </center>
                    </div>
                ";
            }
            ?>
        </div>
    </div>
    <script>
    var div = document.getElementById("scroll_messages");
    div.scrollTop = div.scrollHeight;
    </script>
</body>

</html>