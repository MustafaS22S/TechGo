<?php
session_start();
$errors = [];
if(empty($_REQUEST["email"])) $errors ["email"] = "email is Required";
if(empty($_REQUEST["password"])) $errors ["password"] = "Password is Required";
$email = filter_var($_REQUEST["email"],FILTER_SANITIZE_EMAIL);
$password = htmlspecialchars(trim($_REQUEST["password"]));

if( !empty($_REQUEST["email"]) && !filter_var($_REQUEST["email"],FILTER_VALIDATE_EMAIL))
$errors["email"] = "Email invalid format";

if (empty($errors)) {
    require_once('classes.php');
    $user = user::login($email,md5($password));
    if(!empty($user)){
        $_SESSION["user"] = serialize($user);
        if ($user->role == "admin"){
            header("location:../admin/admin.php");
        }else if ($user->role == "subscriber"){
            header("location:../pages/index.php");
        }
    }else{
        header("location:login.php?msg=user_not_found");}
    }

else{
    header("location:login.php?msg=loginError");
}