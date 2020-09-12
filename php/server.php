<?php

session_start();



//connect to db

$conn = mysqli_connect('localhost','root','','demo') or die("could not connect to the database");


//register here
/*
$username = mysqli_real_escape_string($db,$_POST['username']);
$email = mysqli_real_escape_string($db,$_POST['email']);
$password1 = mysqli_real_escape_string($db,$_POST['password1']);
$password2 = mysqli_real_escape_string($db,$_POST['password2']);


//if(empty($username)) { array_push($errors, "Username is required")};
// if(empty($email)) {array_push($errors, "email is required")};
// if(empty($password1)) {array_push($errors, "password is required")};
// if(password1 != password2) {array_push($errors, "passwords do not match")};

$user_check_query = "SELECT * FROM user WHERE username = $username or email = $email LIMIT 1";

$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if($user['username'] === $username){array_push($errors,"Username alreary exists");}
if($user['email'] === $email){array_push($errors,"This email alreary has been used");}


	//register the user if no error


if(count($errors) == 0){
	$password = md5($password1);
	$query = "INSERT INTO user(username,email,password) VALUES ('$username', '$email','$password')";

mysqli_query($db,$query);
$_SESSION['username'] = $username;
$_SESSION['success'] = "You are logged in";
header('location:index.php');

}*/