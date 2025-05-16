

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
    <title>about</title>
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

    <!-- Main Section Start -->
    <main>


        <section class="about-intro">

            <div class="seccontener">
                <div class="about-content">
                    <h1 style=" font-size: 40px;">Leading Electronics Supplier</h1>
                    <p style="font-size: 20px;">“TechGo” is a leading Egyptian company in electronics supplies and spare parts. We provide electronics geeks or professionals with the best electronic components and devices to help them build smart projects. TechGo always works to develop and support the electronics field in Egypt to create a creative community of electronics enthusiasts with a maker mentality.</p>
                </div>
                <div class="about-banner">
                    <img src="./assets/1.jpg" alt="Electronics Banner">
                </div>
            </div>
        </section>

        <section class="about-details">
            <div class="seccontener">
                <div class="about-banner">
                    <img src="./assets/2.jpg" alt="Electronics Banner">
                </div>
                <div class="about-content">
                    <h1 style="font-size: 40px;">Import, Supply, Support</h1>
                    <p style="font-size: 20px;">We believe in customer orientation so we work to satisfy our customers' needs: importing high-quality electronics at the best prices, accepting special orders, and delivering orders across Egypt with the fastest couriers.</p>
                </div>
            </div>

            <div class="seccontener">
                <div class="about-content">
                    <h1 style="font-size: 40px;">Quality, Best Price, Availability</h1>
                    <p style="font-size: 20px;">Quality comes first in our vision to deliver the best quality products at the best price, ensuring availability for all products to meet our customers' needs.</p>
                </div>
                <div class="about-banner">
                    <img src="./assets/3.jpg" alt="Electronics Banner">
                </div>
            </div>

            <div class="seccontener">
                <div class="about-banner">
                    <img src="./assets/4.jpg" alt="Electronics Banner">
                </div>
                <div class="about-content">
                    <h1 style="font-size: 40px;">Fast Delivery</h1>
                    <p style="font-size: 20px;">We cooperate with the fastest shipping couriers in Egypt to ensure you receive your orders on time.</p>
                </div>
            </div>

            <div class="seccontener">
                <div class="about-content">
                    <h1 style="font-size: 40px;">Shop Online or Offline</h1>
                    <p style="font-size: 20px;">Shop your way: buy online through our reliable website or visit our store in Alexandria, Egypt.</p>
                </div>
                <div class="about-banner">
                    <img src="./assets/5.jpg" alt="Electronics Banner">
                </div>
            </div>
        </section>
    <!-- Main Section End -->



    <!-- Video Section Start -->
        <section class="about-video">
            <center>
            <h1 style="font-size: 60px;">We Love What We Do</h1>
            </center>   
            <div class="video">
                <video width="90%" controls autoplay loop>
                    <source src="./assets/000.mp4" type="video/mp4">
                </video>
            </div>
        </section>
    </main>
    <!-- Video Section Start -->





  <!-- Footer Start -->
  <?php
  require_once './footer.php';
  ?>