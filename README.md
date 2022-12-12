# Web Development Project

## Creation of a Social Network

We are 5 students and we’re going to do a Web Development project in this repo. We have to create a light social network like Twitter or Mastodon for micro blogging. The minimal features of our social media are :

- [x] User / Password
- [x] SignUp
- [x] SignIn
- [x] LogOut
- [x] Post Messages
- [x] Post answers to a message
- [x] Post Images (optionnal)
- [x] Direct Messages (optionnal)
- [ ] Follow / Unfollow a User
- [x] Profile Page
- [x] Timeline 
- [ ] Likes / Unlike (Optionnal)

## Our Group :

- Paolig Blan
- Sacha Simon
- Antoine Sirot
- Arthur Liot
- Hugo Schneegans

## Our public website has to contain several pages :

- [x] Homepage ( not connected User, SignUp / LogIn )
- [x] Home for a conected user ⇒ timeline
- [x] Profile Page for a User ( connected User, his followers/following or anybody else in the same instance/software from the fediverse )
- [x] User search Page or form to Display the Profile of a User (username@domainname)
- [ ] Subscribe Page + email + email checked

## This is how our serveur program will be construct :

- Inbox Dispatcher (get messages from outside and put it in user timeline)
- Oubox dispatcher (post local messages to other users (locally or on the network))
- Programs to answer to website (login / logout / subscribe / follow / unfollow / post messages / post direct messages)

## Last our database has to keep infomation such as :

- Users

- Posts 
 
- Comments

- User Messages

# Explanation on the code structure

## Folders

cover_pictures : in this folder we will save the pictures for the cover page of a user.

DB-annex : we will find sql files that allow us to create a database.

images_for_design : images like logos, ... Everything we need for the design

images_posted : images that are used in the post of our users.

includes : codes that will be used many times need will be stored in this folder, facilitating the code flow.

profile_pictures : store the profile pictures.

style : store all the css files.

functions : all the functions that we will use for the website.

## Files

index.php : the homepage on which the user will go before connecting to the website

signup.php / signin.php : their names tell what they do

connection.php : establish the connection with the database

add_user.php : add the user in the database when he sign

app.php : temp

members.php : allows to search other users profile

messages.php : send direct messages to other accounts

edit_profile.php : the name is pretty self explanatory 

edit_post.php : same here 

delete_post.php : same also here

my_posts.php : page where you can see the user's post 

profile.php : user profile on the website

connection.php and header.php : both in the includes folder, connection.php allows us to connect to the DB, and header.php is our nav-bat to navigate inside the app (so it's the header of all the files). Header also gets all the info of the user from the DB.
