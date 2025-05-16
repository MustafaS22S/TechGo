<?php
session_start();
require_once '../login/classes.php';
require_once './classes.php';
$rslt = Product::products("Featured Sensors");
// var_dump($rslt);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Featured Sensors</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>

    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <link href="./iteam.css" rel="stylesheet"/>

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








<div class="category">

  <div class="container">
    <!--
            - PRODUCT GRID
          -->

    <div class="product-main">

      <h2 class="title">Featured Sensors & Robotics</h2>

      <div class="product-grid">
        <?php
        foreach ($rslt as $product) {
        ?>
          <div class="showcase">

            <div class="showcase-banner">

              <img src="<?= $product["image_url_main"] ?>" alt="<?= $product["name"] ?>" class="product-img default" width="300">
              <img src="<?= $product["image_url_thumbnail"] ?>" alt="<?= $product["name"] ?>" width="300" class="product-img hover">

              <div class="showcase-actions">

                <button class="btn-action">
                  <ion-icon name="heart-outline" role="img" class="md hydrated" aria-label="heart outline"></ion-icon>
                </button>



                <button class="btn-action">
                  <ion-icon name="bag-add-outline" role="img" class="md hydrated" aria-label="bag add outline"></ion-icon>
                </button>

              </div>

            </div>

            <div class="showcase-content">

              <p class="showcase-category"><?= $product["category"] ?></p>

              <a href="./product page.php?product_id=<?= $product["product_id"] ?>">
                <h3 class="showcase-title"><?= $product["name"] ?></h3>
              </a>

              <div class="price-box">
                <p class="price"><?= $product["price"] ?> EGP</p>
              </div>

            </div>

          </div>

        <?php
        }
        ?>

      </div>

    </div>
  </div>
</div>

<!-- Footer Start -->
<?php
require_once './footer.php';
?>