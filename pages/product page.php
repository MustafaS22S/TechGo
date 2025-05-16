<?php
session_start();
require_once '../login/classes.php';
require_once './classes.php';
require_once './db.php';

$product_id = $_GET["product_id"] ?? null;
if (!$product_id) {
  die("Product ID is missing.");
}

$rslt = Product::productMain($product_id);
$reco = Product::recommended($product_id);

// جلب المفضلة
$favorites = [];
$cartItems = [];

if (isset($_SESSION['user'])) {
  $user = unserialize($_SESSION['user']);
  $user_id = $user->user_id;

  // جلب المفضلة
  $stmt = $conn->prepare("
    SELECT p.product_id, p.name, p.price, p.image_url_main 
    FROM favorites f
    JOIN products p ON f.product_id = p.product_id
    WHERE f.user_id = ?
  ");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $favorites = $result->fetch_all(MYSQLI_ASSOC);
  $stmt->close();

  // جلب عربه التسوق
  $stmtCart = $conn->prepare("
    SELECT p.product_id, p.name, p.price, p.image_url_main, c.quantity
    FROM cart c
    JOIN products p ON c.product_id = p.product_id
    WHERE c.user_id = ?
  ");
  $stmtCart->bind_param("i", $user_id);
  $stmtCart->execute();
  $resultCart = $stmtCart->get_result();
  $cartItems = $resultCart->fetch_all(MYSQLI_ASSOC);
  $stmtCart->close();
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $rslt["name"] ?></title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet" />
  <link href="./iteam.css" rel="stylesheet" />
  <link rel="shortcut icon" href="../assets/images/logo/favicon.jpg" type="image/x-icon">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <?php

  if (isset($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);

    if ($user->role == "admin") {
      require_once("./admin_header.php");
    } else if ($user->role == "subscriber") {
      require_once("./subscriber_header.php");
    }
  } else {
    require_once("./header.php");
  }
  ?>

  ?>



  <div class="category">
    <div class="container">
      <div class="seccontainer">
        <div class="product">
          <img src="<?= $rslt["image_url_main"] ?>" alt=<?= $rslt["name"] ?> />
          <div class="info">
            <h2><?= $rslt["name"] ?></h2>
            <p>
              <?= $rslt["description"] ?>
            </p>
            <div class="price"><?= $rslt["price"] ?> EGP</div>

            <!-- icons row -->
            <div class="actions">
              <button class="icon-btn favorite-btn" data-product-id="<?= $rslt["product_id"] ?>" title="Add to Wishlist">❤️</button>
              <button class="icon-btn cart-btn" title="Add to Cart" data-product-id="<?= $rslt["product_id"] ?>">🛒</button>

            </div>

            <!-- main button -->
            <a href=""><button class="buy">Buy Now</button></a>
          </div>
        </div>
      </div>

      <div class="container recommended">

        <div class="product-main">

          <h2 class="title">Recommended Products</h2>

          <div class="product-grid">

            <?php
            foreach ($reco as $product) {
            ?>
              <div class="showcase">

                <div class="showcase-banner">

                  <img src="<?= $product["image_url_main"] ?>" alt="<?= $product["name"] ?>" class="product-img default" width="300">
                  <img src="<?= $product["image_url_thumbnail"] ?>" alt="<?= $product["name"] ?>" width="300" class="product-img hover">

                  <div class="showcase-actions">







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



    <script>
      document.querySelectorAll('.favorite-btn').forEach(button => {
        button.addEventListener('click', function() {
          const productId = this.getAttribute('data-product-id');

          fetch('add_to_favorites.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
              },
              body: `product_id=${productId}`
            })
            .then(response => response.text())
            .then(data => {
              alert(data);
            });
        });
      });
    </script>
    <script>
      document.querySelectorAll('.cart-btn').forEach(button => {
        button.addEventListener('click', () => {
          const productId = button.getAttribute('data-product-id');
          if (!productId) {
            alert('معرف المنتج غير موجود');
            return;
          }

          fetch('cart_add.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
              },
              body: `product_id=${encodeURIComponent(productId)}&quantity=1`
            })
            .then(response => response.text())
            .then(text => {
              alert(text); // مؤقتا نعرض الرسالة لتأكد من نجاح العملية
              // هنا ممكن تضيف تحديث للواجهة بدل التنبيه
            })
            .catch(err => {
              alert('حدث خطأ، حاول مرة أخرى');
              console.error(err);
            });
        });
      });
    </script>
    <script>
      document.querySelectorAll('.cart-btn').forEach(button => {
        button.addEventListener('click', () => {
          const productId = button.getAttribute('data-product-id');
          if (!productId) {
            alert('معرف المنتج غير موجود');
            return;
          }

          fetch('cart_add.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
              },
              body: `product_id=${encodeURIComponent(productId)}&quantity=1`
            })
            .then(response => response.text())
            .then(text => {
              alert(text); // مؤقتا نعرض الرسالة لتأكد من نجاح العملية
              // هنا ممكن تضيف تحديث للواجهة بدل التنبيه
            })
            .catch(err => {
              alert('حدث خطأ، حاول مرة أخرى');
              console.error(err);
            });
        });
      });
    </script>

    <!-- Footer Start -->
    <?php
    require_once("./footer.php");
    ?>