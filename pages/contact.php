<?php
session_start();
require_once '../login/classes.php';
include_once "./classes.php";
$sensors = Product::products("Featured Sensors");
$microcontrollers = Product::products("Microcontrollers");
$electronic_tools = Product::products("Electronic tools");
$power_supplies = Product::products("Power supplies");
// var_dump($reco);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>contact</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>

    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link href="./contact.css" rel="stylesheet"/>
    <link href="./about.css" rel="stylesheet"/>


    <link rel="shortcut icon" href="../assets/images/logo/favicon.jpg" type="image/x-icon">

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  </head>
<?php
  if (isset($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);

    if ($user->role == "admin"){
    require_once("./admin_header.php");}

    else if ($user->role == "subscriber"){
    require_once("./subscriber_header.php");
}

} else {
    require_once("./header.php");
}
  ?>

  <section class="contact-us">
    <h2>CONTACT US</h2>

    <div class="contact-info">
      <div class="contact-item call">
        <span class="icon"><i class="fas fa-phone-alt"></i></span>
        <div>
          <h3>CALL US</h3>
          <p>Hotline: (+2) 012 2224 6680‬</p>
        </div>
      </div>
      
      <div class="contact-item whatsapp">
        <span class="icon"><i class="fab fa-whatsapp"></i></span>
        <div>
          <h3>WhatsApp</h3>
          <p>(+2) 01205987653‬</p>
        </div>
      </div>
      
      <div class="contact-item email">
        <span class="icon"><i class="fas fa-envelope"></i></span>
        <div>
          <h3>EMAIL ADDRESS</h3>
          <p>RM@gmail.com</p>
        </div>
      </div>
      
      <div class="contact-item location">
        <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
        <div>
          <h3>STORE LOCATION</h3>
          <p>Borg Alarab, Alex, Egypt</p>
        </div>
      </div>
      
      <div class="contact-item hours">
        <span class="icon"><i class="fas fa-clock"></i></span>
        <div>
          <h3>WORK HOURS</h3>
          <p>Saturday - Thursday | 10AM - 8:30PM</p>
          <p>Friday | 2PM - 8PM</p>
          <p>Customer service | 10AM - 6PM</p>
        </div>
      </div>
      
      <div class="contact-item support">
        <span class="icon"><i class="fas fa-life-ring"></i></span>
        <div>
          <h3>SUPPORT PORTAL</h3>
          <p>Submit tickets or get help online via our portal.</p>
        </div>
      </div>
      
    </div>
  </section>





  <!-- Footer Start -->
 <?php
  require_once './footer.php';
  ?>