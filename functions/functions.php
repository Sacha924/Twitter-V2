<?php

$servername = "localhost";
$username = "";
$password = ""; 
$database = "mygrp1";


// Create connection
$con = mysqli_connect($servername, $username, $password, $database);

//function for inserting post
function insertPost(){
	if(isset($_POST['sub'])){
		global $con;    //To be able to use the con and user_ID variable everywhere
		global $user_ID;
        $content = htmlentities($_POST['content']);
		$upload_image = $_FILES['upload_image']['name'];
		$image_tmp = $_FILES['upload_image']['tmp_name'];
		$random_number = rand(1, 100000);
        //Check the length of the mess is Ok
        if(strlen($content) > 250){
			echo "<script>alert('Please Use 250 or less than 250 words!')</script>";
			echo "<script>window.open('app.php', '_self')</script>";
		}else{
            //We need to trate all the case :
            // Does the user post an image
            // Does the user post text 
            //Does the user post both ... Or Nothing!
			if(strlen($upload_image) >= 1 && strlen($content) >= 1){
				move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");
				$insert = "insert into posts (user_ID, post_content, upload_image, post_date) values('$user_ID', '$content', '$upload_image.$random_number', NOW())";

				$run = mysqli_query($con, $insert);
                if($run){
					echo "<script>alert('Your Post updated a moment ago!')</script>";
					echo "<script>window.open('app.php', '_self')</script>";

					$update = "update users set posts='yes' where user_ID='$user_ID'";
					$run_update = mysqli_query($con, $update);
				}

				exit();
			}else{
				if($upload_image=='' && $content == ''){
					echo "<script>alert('Error Occured while uploading!')</script>";
					echo "<script>window.open('app.php', '_self')</script>";
				}else{
					if($content==''){
						move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");
						$insert = "insert into posts (user_ID,post_content,upload_image,post_date) values ('$user_ID','No','$upload_image.$random_number',NOW())";
						$run = mysqli_query($con, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('app.php', '_self')</script>";

							$update = "update users set posts='yes' where user_ID='$user_ID'";
							$run_update = mysqli_query($con, $update);
						}

						exit();
					}else{
						$insert = "insert into posts (user_ID, post_content, post_date) values('$user_ID', '$content', NOW())";
						$run = mysqli_query($con, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('app.php', '_self')</script>";

							$update = "update users set posts='yes' where user_ID='$user_ID'";
							$run_update = mysqli_query($con, $update);
						}
					}
				}
			}
		}
	}
}
function get_posts(){
	global $con;
	$per_page = 4;
    //We could make the number per page bigger if our application was used by a lot of people. As long as it's a school project, we don't care 

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page=1;
	}

	$start_from = ($page-1) * $per_page;

	$get_posts = "select * from posts ORDER by 1 DESC LIMIT $start_from, $per_page";

	$run_posts = mysqli_query($con, $get_posts);

	while($row_posts = mysqli_fetch_array($run_posts)){

		$post_id = $row_posts['post_id'];
		$user_ID = $row_posts['user_ID'];
		$content = substr($row_posts['post_content'], 0,40);
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];

		$user = "select * from users where user_ID='$user_ID' AND posts='yes'";
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);

		$user_name = $row_user['username'];
		$profil_picture = $row_user['profil_picture'];

		//now displaying posts from database

        //Same that the post functions we will check the different case
		if($content=="No" && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='profile_pictures/$profil_picture' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_ID'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='profile_pictures/$profil_picture' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_ID'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='profile_pictures/$profil_picture' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_ID'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<h3><p>$content</p></h3>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}
	}

	include("pagination.php");
}


function search_user(){
	global $con;

	if(isset($_GET['search_user_btn'])){
		$search_query = htmlentities($_GET['search_user']); 
		$get_user="select * from users where username like '%$search_query%' OR l_name like '%$search_query%' OR f_name like '%$search_query%'";
		
	}
	else {
		$get_user="select * from users ORDER by user_ID DESC LIMIT 5";
	}

	$run_user=mysqli_query($con,$get_user);
	while( $row_user=mysqli_fetch_array($run_user)){
		$user_id=$row_user['user_ID'];
		$user_name=$row_user['username'];
		$f_name=$row_user['f_name'];
		$l_name=$row_user['l_name'];
		$user_image = $row_user['profil_picture'];

		echo "
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div class='col-sm-6'>
					<div class='row' id='find_people'>
						<div class='col-sm-4'>
							<a href='user_profile.php?u_id=$user_id'>
								<img src='profile_pictures/$user_image' width='150px' height='140px' title='$user_name' style='float:left; margin:1px;'/>
							</a>
						</div><br><br>
						<div class='col-sm-6'>
							<a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>
								<strong><h2><u>$user_name</u> : $f_name $l_name</h2></strong>
							</a>
							<a href='user_profile.php?u_id=$user_id' style='float:right;'><button class='btn btn-info'>View Profile</button></a><br><br>
						</div>
						<div class='col-sm-3'>
						</div>
					</div>
				</div>
			</div>
			";
	}
}

function single_post(){
	if (isset($_GET['post_id'])){
		global $con;

		$get_id=$_GET['post_id'];
		$get_posts="select * from posts where post_id='$get_id'";
		$run_posts=mysqli_query($con,$get_posts);
		$row_posts=mysqli_fetch_array($run_posts);
		$post_id=$row_posts['post_id'];
		$user_id=$row_posts['user_ID'];	
		$content=$row_posts['post_content'];
		$upload_image=$row_posts['upload_image'];
		$post_date=$row_posts['post_date'];

		$user="select * from users where user_ID='$user_id' AND posts='yes'";
		$run_user=mysqli_query($con,$user);
		$row_user=mysqli_fetch_array($run_user);
		$user_name=$row_user['username'];
		$profil_picture=$row_user['profil_picture'];

		$user_com=$_SESSION['user_email'];
		$get_com="select * from users where email='$user_com'";
		$run_com=mysqli_query($con,$get_com);
		$row_com=mysqli_fetch_array($run_com);
		$user_com_id=$row_com['user_ID'];
		$user_com_name=$row_com['username'];

		if(isset($_GET['post_id'])){
			$post_id=$_GET['post_id'];
		}
		$get_posts="select post_id from posts where post_id='$post_id'";
		$run_user=mysqli_query($con,$get_posts);

		$post_id=$_GET['post_id'];
		$get_user="select * from posts where post_id='$post_id'";
		$run_user=mysqli_query($con,$get_user);
		$row=mysqli_fetch_array($run_user);

		$p_id=$row['post_id'];
		if($post_id!=$p_id ){
			echo "<script>alert('ERROR')</script>";
			echo "<script>window.open('app.php','_self')</script>";
		} else {
			if($content=="No" && strlen($upload_image) >= 1){
				echo"
				<div class='row'>
					<div class='col-sm-3'>
					</div>
					<div id='posts' class='col-sm-6'>
						<div class='row'>
							<div class='col-sm-2'>
							<p><img src='profile_pictures/$profil_picture' class='img-circle' width='100px' height='100px'></p>
							</div>
							<div class='col-sm-6'>
								<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
								<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
							</div>
							<div class='col-sm-4'>
							</div>
						</div>
						<div class='row'>
							<div class='col-sm-12'>
								<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
							</div>
						</div><br>
						<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
					</div>
					<div class='col-sm-3'>
					</div>
				</div><br><br>
				";
			}
	
			else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
				echo"
				<div class='row'>
					<div class='col-sm-3'>
					</div>
					<div id='posts' class='col-sm-6'>
						<div class='row'>
							<div class='col-sm-2'>
							<p><img src='profile_pictures/$profil_picture' class='img-circle' width='100px' height='100px'></p>
							</div>
							<div class='col-sm-6'>
								<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
								<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
							</div>
							<div class='col-sm-4'>
							</div>
						</div>
						<div class='row'>
							<div class='col-sm-12'>
								<p>$content</p>
								<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
							</div>
						</div><br>
						<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
					</div>
					<div class='col-sm-3'>
					</div>
				</div><br><br>
				";
			}
	
			else{
				echo"
				<div class='row'>
					<div class='col-sm-3'>
					</div>
					<div id='posts' class='col-sm-6'>
						<div class='row'>
							<div class='col-sm-2'>
							<p><img src='profile_pictures/$profil_picture' class='img-circle' width='100px' height='100px'></p>
							</div>
							<div class='col-sm-6'>
								<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
								<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
							</div>
							<div class='col-sm-4'>
							</div>
						</div>
						<div class='row'>
							<div class='col-sm-12'>
								<h3><p>$content</p></h3>
							</div>
						</div><br>
						<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
					</div>
					<div class='col-sm-3'>
					</div>
				</div><br><br>
				";
			}
			include("comments.php");

			echo "
				<div class='row'>
					<div class='col-md-6 col-md-offset-3'>
						<div class='panel panel-info'>
							<div class='panel-body'>
								<form action='' method='post' class='form-inline'>
									<textarea placeholder='Write your comment here...' class='pb-cmnt-textarea' name='comment'></textarea>
									<button class='btn btn-info pull-right' name='reply'>Comment</button>
								</form>
							</div>
						</div>
					</div>
			";

			if(isset($_POST['reply'])){
				$comment = htmlentities($_POST['comment']);

				if($comment == ""){
					echo "<script>alert('Enter your comment!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}
				else{
					$insert = "insert into comments (post_id, user_id, comment, comment_author, date) values ('$post_id', '$user_id', '$comment', '$user_com_name', NOW())";

					$run = mysqli_query($con, $insert);

					echo "<script>alert('Your Comment was added!')</script>";
					echo "<script>window.open('app.php', '_self')</script>";
				}
			}
		}

	}
}
function user_posts(){
	global $con;

	if(isset($_GET['u_id'])){
		$u_id = $_GET['u_id'];
	}
	$get_posts = "select * from posts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";

	$run_posts = mysqli_query($con,$get_posts);

	while($row_posts=mysqli_fetch_array($run_posts)){

		$post_id = $row_posts['post_id'];
		$user_ID = $row_posts['user_ID'];
		$content = $row_posts['post_content'];
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];

		$user = "select * from users where user_ID='$user_ID' AND posts='yes'";

		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);

		$username = $row_user['username'];
		$profil_picture = $row_user['profil_picture'];

		if(isset($_GET['u_id'])){
			$u_id = $_GET['u_id'];
		}
		$get_user = "select email from users where user_ID='$u_id'";
		$run_user = mysqli_query($con,$get_user);
		$row=mysqli_fetch_array($run_user);

		$email = $row['email'];

		$user = $_SESSION['user_email'];
		$get_user = "select * from users where email='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row=mysqli_fetch_array($run_user);

		$user_ID = $row['user_ID'];
		$user_email = $row['email'];

		if($user_email != $email){
			echo"<script>window.open('my_posts.php?u_id=$user_ID','_self')</script>";
		}
		else{
			if($content=="No" && strlen($upload_image) >= 1){
				echo"
				<div class='row'>
					<div class='col-sm-3'>
					</div>
					<div id='posts' class='col-sm-6'>
						<div class='row'>
							<div class='col-sm-2'>
							<p><img src='profile_pictures/$profil_picture' class='img-circle' width='100px' height='100px'></p>
							</div>
							<div class='col-sm-6'>
								<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_ID'>$username</a></h3>
								<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
							</div>
							<div class='col-sm-4'>
							</div>
						</div>
						<div class='row'>
							<div class='col-sm-12'>
								<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
							</div>
						</div><br>
						<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
					</div>
					<div class='col-sm-3'>
					</div>
				</div><br><br>
				";
			}
	
			else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
				echo"
				<div class='row'>
					<div class='col-sm-3'>
					</div>
					<div id='posts' class='col-sm-6'>
						<div class='row'>
							<div class='col-sm-2'>
							<p><img src='profile_pictures/$profil_picture' class='img-circle' width='100px' height='100px'></p>
							</div>
							<div class='col-sm-6'>
								<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_ID'>$username</a></h3>
								<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
							</div>
							<div class='col-sm-4'>
							</div>
						</div>
						<div class='row'>
							<div class='col-sm-12'>
								<p>$content</p>
								<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
							</div>
						</div><br>
						<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
					</div>
					<div class='col-sm-3'>
					</div>
				</div><br><br>
				";
			}
	
			else{
				echo"
				<div class='row'>
					<div class='col-sm-3'>
					</div>
					<div id='posts' class='col-sm-6'>
						<div class='row'>
							<div class='col-sm-2'>
							<p><img src='profile_pictures/$profil_picture' class='img-circle' width='100px' height='100px'></p>
							</div>
							<div class='col-sm-6'>
								<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_ID'>$username</a></h3>
								<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
							</div>
							<div class='col-sm-4'>
							</div>
						</div>
						<div class='row'>
							<div class='col-sm-12'>
								<h3><p>$content</p></h3>
							</div>
						</div><br>
						<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
					</div>
					<div class='col-sm-3'>
					</div>
				</div><br><br>
				";
			}

		}
	}
}

function results(){
	global $con;

	if(isset($_GET['search'])){
		$search_query = htmlentities($_GET['user_query']);
	}

	$get_posts = "select * from posts where post_content like '%$search_query%' OR upload_image like '%$search_query%' ORDER by 1 DESC LIMIT 5";

	$run_posts = mysqli_query($con,$get_posts);

	while($row_posts=mysqli_fetch_array($run_posts)){
		
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_ID'];
		$content = $row_posts['post_content'];
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];

		$user = "select * from users where user_ID='$user_id' AND posts='yes'";

		$run_user = mysqli_query($con,$user);
		$row_user=mysqli_fetch_array($run_user);

		$username = $row_user['username'];
		$profil_picture = $row_user['profil_picture'];
		$first_name = $row_user['f_name'];
		$last_name = $row_user['l_name'];

		if($content=="No" && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='profile_pictures/$profil_picture' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$username</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='profile_pictures/$profil_picture' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$username</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='profile_pictures/$profil_picture' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$username</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<h3><p>$content</p></h3>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}
	}
}


?>