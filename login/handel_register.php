<?php
session_start();
// var_dump($_REQUEST);
//check problems
$errors = [];
if(empty($_REQUEST["uname"])) $errors ["uname"] = "Name is Required";
if(empty($_REQUEST["email"])) $errors ["email"] = "email is Required";
if(strlen($_REQUEST["phone"])>=14) $errors ["phone"] = "the phone must be <15 digits of numper";
if(empty($_REQUEST["pw"]) || empty($_REQUEST["cp"])) 
    {$errors ["pw"] = "please check the password forms";}
else if($_REQUEST["pw"] != $_REQUEST["cp"]) {$errors ["cp"] = "Password confirmation must be equal the password";}   
if(empty($_REQUEST["cp"])) $errors ["cp"] = "Please confirm the password";

$name = htmlspecialchars(trim($_REQUEST["uname"]));
$email = filter_var($_REQUEST["email"],FILTER_SANITIZE_EMAIL);
$phone =htmlspecialchars($_REQUEST["phone"]);
$password = htmlspecialchars(trim($_REQUEST["pw"]));
$password_confirm = htmlspecialchars(trim($_REQUEST["cp"]));
// echo "<br>".$name."<br>".$email."<br>".$password."<br>".$password_confirm;

if( !empty($_REQUEST["email"]) && !filter_var($_REQUEST["email"],FILTER_VALIDATE_EMAIL))
$errors["email"] = "Email invalid format";
if (empty($errors)) {
    require_once('classes.php');
    try {
        header("location:login.php?msg=success");
        $rslt= Subscriber::register($name,$email,md5($password),$phone);
    } catch (\Throwable $th) {
        header("location:login.php?msg=alreadyRegistred");
    }

}
else{
    $_SESSION["errors"] = $errors;
    header("location:login.php");
}
?>