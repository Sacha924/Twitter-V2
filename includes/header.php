<?php
include("connection.php");
include("functions/functions.php");
//we don't start the session on this file because we will start the session on the other files that this file can call
?>
<div style="background-color: #068d9d;">
            <img src="./images_for_design/image_LogoONNLINE.png" style="margin: 0 0 0 43%;width:15%;border-radius:12%;"/>
</div>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1"
                data-toggle="collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- button is close there so we encompasses all our icon in one button when we are on cellphone or reduce screen size -->
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            
                <?php 
			$user = $_SESSION['user_email'];
			$row=mysqli_fetch_array(mysqli_query($con,"select * from users where email='$user'"));
					
			$user_ID = $row['user_ID']; 
			$first_name = $row['f_name'];
			$last_name = $row['l_name'];
            $username = $row['username'];
            $email = $row['email'];
			$password = $row['password'];
            $biography = $row['biography'];
			$Relationship_status = $row['relationship'];		
			$profil_picture = $row['profil_picture'];
			$cover_picture = $row['cover_picture'];
			$register_date = $row['reg_date'];					
            
			$posts = mysqli_num_rows(mysqli_query($con,"select * from posts where user_ID='$user_ID'"));
			?>
                <!-- For now this is very abstract and it will potentially change, but files correspond to the future feature -->
                <li><a href='profile.php?<?php echo "u_id=$user_ID" ?>'><?php echo "$first_name"; ?></a></li>
                <li><a href="app.php">Home</a></li>
                <li><a href="members.php">Find People</a></li>
                <li><a href="messages.php?u_id=new">Messages</a></li>


                <?php
						echo"

						<li class='dropdown'>
							<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span><i class='glyphicon glyphicon-chevron-down'></i></span></a>
							<ul class='dropdown-menu'>
								<li>
									<a href='my_posts.php?u_id=$user_ID'>My Posts <span class='badge badge-secondary'>$posts</span></a>
								</li>
								<li>
									<a href='edit_profile.php?u_id=$user_ID'>Edit Account</a>
								</li>
								<li role='separator' class='divider'></li>
								<li>
									<a href='logout.php'>Logout</a>
								</li>
							</ul>
						</li>
						";
					?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <form class="navbar-form navbar-left" method="get" action="results.php" style="margin-left:500px">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_query" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-info" name="search">Search</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>