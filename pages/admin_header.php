<?php
require_once '../login/classes.php';
require_once './classes.php';
require_once './db.php';

$favorites = [];

if (isset($_SESSION['user'])) {
  $user = unserialize($_SESSION['user']);
  $user_id = $user->user_id;

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
}
$wishlist_count = count($favorites);
$cart_count = count($cartItems);


$sensors = Product::products("Featured Sensors");
$microcontrollers = Product::products("Microcontrollers");
$electronic_tools = Product::products("Electronic tools");
$power_supplies = Product::products("Power supplies");

$sensors = Product::products("Featured Sensors");
$microcontrollers = Product::products("Microcontrollers");
$electronic_tools = Product::products("Electronic tools");
$power_supplies = Product::products("Power supplies");

?>


<body>




  <div class="overlay" data-overlay></div>

  <!--
    - HEADER
  -->

  <header>

    <div class="header-top">

      <div class="container">

        <ul class="header-social-container">

          <li>
            <a href="https://www.facebook.com/" class="social-link">
              <ion-icon name="logo-facebook" role="img" class="md hydrated" aria-label="logo facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="https://x.com/" class="social-link">
              <ion-icon name="close" role="img" class="md hydrated" aria-label="logo twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="https://www.instagram.com/" class="social-link">
              <ion-icon name="logo-instagram" role="img" class="md hydrated" aria-label="logo instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="https://www.linkedin.com/" class="social-link">
              <ion-icon name="logo-linkedin" role="img" class="md hydrated" aria-label="logo linkedin"></ion-icon>
            </a>
          </li>

        </ul>

        <div class="header-alert-news">
          <p>
            wlcome to <b>TechGo</b> store <?= $user->name ?>
          </p>
        </div>

        <div class="header-top-actions">

          <select name="currency">

            <option value="usd">EGP</option>
            <option value="eur">none</option>

          </select>

          <select name="language">

            <option value="en-US">English</option>
            <option value="es-ES">none</option>
            <option value="fr">soon</option>

          </select>

        </div>

      </div>

    </div>

    <div class="header-main">

      <div class="container">

        <a href="#" class="header-logo">
          <img src="../assets/images/logo/favicon.jpg" alt="Techgo" width="120" height="36">
        </a>

        <form action="search.php" method="get" class="header-search-container">
          <input type="search" name="search" class="search-field" placeholder="Enter your product name..." required>
          <button class="search-btn">
            <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
          </button>
        </form>

        <div class="header-user-actions">
          <a href="../login/handle_logout.php" class="action-btn" aria-label="User Account">
            <ion-icon name="log-out-outline"></ion-icon>
          </a>
          <button class="action-btn" data-wishlist-open-btn="" aria-label="Open Wishlist">
            <ion-icon name="heart-outline"></ion-icon>
            <span class="count" data-wishlist-count=""><?= $wishlist_count ?></span>
          </button>
          <button class="action-btn" data-cart-open-btn="" aria-label="Open Shopping Cart">
            <ion-icon name="bag-handle-outline" role="img" class="md hydrated" aria-label="bag handle outline"></ion-icon>
            <span class="count" data-cart-count=""><?= $cart_count ?></span>
          </button>
        </div>

      </div>

    </div>

    <nav class="desktop-navigation-menu">

      <div class="container">

        <ul class="desktop-menu-category-list">

          <li class="menu-category">
            <a href="./index.php" class="menu-title">Home</a>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Categories</a>

            <div class="dropdown-panel">

              <ul class="dropdown-panel-list">

                <li class="menu-title">
                  <a href="./Featured Sensors.php">Featured Sensors</a>
                </li>
                <?php
                foreach ($sensors as $product) {
                ?>
                  <li class="panel-list-item">
                    <a href="./product page.php?product_id=<?= $product["product_id"] ?>"><?= $product["name"] ?></a>
                  </li>
                <?php
                }
                ?>

              </ul>

              <ul class="dropdown-panel-list">

                <li class="menu-title">
                  <a href="./Microcontrollers.php">Microcontrollers</a>
                </li>

                <?php
                foreach ($microcontrollers as $product) {
                ?>
                  <li class="panel-list-item">
                    <a href="./product page.php?product_id=<?= $product["product_id"] ?>"><?= $product["name"] ?></a>
                  </li>
                <?php
                }
                ?>



              </ul>

              <ul class="dropdown-panel-list">

                <li class="menu-title">
                  <a href="./Electronic tools.php">Electronic Tools</a>
                </li>

                <?php
                foreach ($electronic_tools as $product) {
                ?>
                  <li class="panel-list-item">
                    <a href="./product page.php?product_id=<?= $product["product_id"] ?>"><?= $product["name"] ?></a>
                  </li>
                <?php
                }
                ?>


              </ul>

              <ul class="dropdown-panel-list">

                <li class="menu-title">
                  <a href="./Power supplies.php">Power Supply</a>
                </li>

                <?php
                foreach ($power_supplies as $product) {
                ?>
                  <li class="panel-list-item">
                    <a href="./product page.php?product_id=<?= $product["product_id"] ?>"><?= $product["name"] ?></a>
                  </li>
                <?php
                }
                ?>

              </ul>

            </div>
          </li>

          <li class="menu-category">
            <a href="./contact.php" class="menu-title">contact us</a>
          </li>

          <li class="menu-category">
            <a href="./about.php" class="menu-title">about us</a>

          </li>

          <li class="menu-category">
            <a href="../admin/admin.php" class="menu-title">Dashboard</a>

          </li>

        </ul>

      </div>

    </nav>



  </header>

  <div class="mobile-bottom-navigation">
    <button class="action-btn" data-mobile-menu-open-btn="" aria-label="Open Menu"> <ion-icon name="menu-outline" role="img" class="md hydrated" aria-label="menu outline"></ion-icon>
    </button>
    <button class="action-btn" data-cart-open-btn="" aria-label="Open Shopping Cart"> <ion-icon name="bag-handle-outline" role="img" class="md hydrated" aria-label="bag handle outline"></ion-icon>
      <span class="count" data-cart-count="">0</span>
    </button>
    <a href="./index.php"><button class="action-btn" aria-label="Home"> <ion-icon name="home-outline" role="img" class="md hydrated" aria-label="home outline"></ion-icon>
      </button></a>
    <button class="action-btn" data-wishlist-open-btn="" aria-label="Open Wishlist"> <ion-icon name="heart-outline" role="img" class="md hydrated" aria-label="heart outline"></ion-icon>
      <span class="count" data-wishlist-count="">0</span>
    </button>
  </div>


  <nav class="mobile-navigation-menu has-scrollbar" data-mobile-menu="">
    <div class="menu-top">
      <h2 class="menu-title">Menu</h2>
      <button class="menu-close-btn" data-mobile-menu-close-btn="" aria-label="Close Menu">
        <ion-icon name="close-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon>
      </button>
    </div>
    <ul class="mobile-menu-category-list">
      <li class="menu-category"><a href="./index.php" class="menu-title">Home</a></li>
      <li class="menu-category">
        <button class="accordion-menu" data-accordion-btn="">
          <p class="menu-title">Categories</p>
          <div>
            <ion-icon name="add-outline" class="add-icon md hydrated" role="img" aria-label="add outline"></ion-icon>
            <ion-icon name="remove-outline" class="remove-icon md hydrated" role="img" aria-label="remove outline"></ion-icon>
          </div>
        </button>
        <ul class="submenu-category-list" data-accordion="">
          <li class="submenu-category"><a href="./Featured Sensors.php" class="submenu-title">Featured Sensors & Robotics</a></li>
          <li class="submenu-category"><a href="./Microcontrollers.php" class="submenu-title">Microcontrollers</a></li>
          <li class="submenu-category"><a href="./Electronic tools.php" class="submenu-title">Electronic tools</a></li>
          <li class="submenu-category"><a href="./Power supplies.php" class="submenu-title">Power supplies</a></li>

        </ul>
      </li>
      <li class="menu-category"><a href="./about.php" class="menu-title">About Us</a></li>
      <li class="menu-category"><a href="./contact.php" class="menu-title">Contact Us</a></li>
      <li class="menu-category"><a href="../admin/admin.php" class="menu-title">Dashboard</a></li>
    </ul>
    <div class="menu-bottom">
      <ul class="menu-category-list">
        <li class="menu-category">
          <button class="accordion-menu" data-accordion-btn="">
            <p class="menu-title">Language</p>
            <ion-icon name="caret-back-outline" class="caret-back md hydrated" role="img" aria-label="caret back outline"></ion-icon>
          </button>
          <ul class="submenu-category-list" data-accordion="">
            <li class="submenu-category"><a href="#" class="submenu-title">English</a></li>
            <li class="submenu-category"><a href="#" class="submenu-title">العربية (soon)</a></li>
          </ul>
        </li>
        <li class="menu-category">
          <button class="accordion-menu" data-accordion-btn="">
            <p class="menu-title">Currency</p>
            <ion-icon name="caret-back-outline" class="caret-back md hydrated" role="img" aria-label="caret back outline"></ion-icon>
          </button>
          <ul class="submenu-category-list" data-accordion="">
            <li class="submenu-category"><a href="#" class="submenu-title">EGP</a></li>
            <li class="submenu-category"><a href="#" class="submenu-title">soon</a></li>
          </ul>
        </li>
      </ul>
      <ul class="menu-social-container">
        <li><a href="https://www.facebook.com/" class="social-link" aria-label="Facebook"><ion-icon name="logo-facebook" role="img" class="md hydrated" aria-label="logo facebook"></ion-icon></a></li>
        <li><a href="https://x.com/" class="social-link" aria-label="Twitter"><ion-icon name="logo-twitter" role="img" class="md hydrated" aria-label="logo twitter"></ion-icon></a></li>
        <li><a href="https://www.instagram.com/" class="social-link" aria-label="Instagram"><ion-icon name="logo-instagram" role="img" class="md hydrated" aria-label="logo instagram"></ion-icon></a></li>
        <li><a href="https://www.linkedin.com/" class="social-link" aria-label="LinkedIn"><ion-icon name="logo-linkedin" role="img" class="md hydrated" aria-label="logo linkedin"></ion-icon></a></li>
      </ul>
    </div>
  </nav>

  <nav class="sidebar-menu wishlist-menu has-scrollbar" data-wishlist-menu="">
    <div class="menu-top">
      <h2 class="menu-title">Wishlist</h2>
      <button class="menu-close-btn" data-wishlist-close-btn="" aria-label="Close Wishlist">
        <ion-icon name="close-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon>
      </button>
    </div>
    <ul class="sidebar-menu-list">
      <?php if (count($favorites) > 0): ?>
        <?php foreach ($favorites as $item): ?>
          <li class="sidebar-menu-item">
            <div class="item-img">
              <img src="<?= $item['image_url_main'] ?>" alt="<?= $item['name'] ?>" width="70" height="70" loading="lazy">
            </div>
            <div class="item-content">
              <a href="product page.php?product_id=<?= $item['product_id'] ?>" class="item-title"><?= $item['name'] ?></a>
              <p class="item-price"><?= $item['price'] ?> EGP</p>
            </div>
            <form method="POST" action="remove_from_favorites.php">
              <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
              <button class="item-remove-btn" aria-label="Remove from Wishlist">
                <ion-icon name="close-outline"></ion-icon>
              </button>
            </form>
          </li>
        <?php endforeach; ?>
      <?php else: ?>
        <li class="sidebar-menu-item empty-message">
          <p>Your wishlist is currently empty.</p>
        </li>
      <?php endif; ?>
    </ul>

    <div class="menu-bottom">
      <a href="#" class="bttn bttn-primary bttn-block">View Full Wishlist</a>
    </div>
  </nav>


  <nav class="sidebar-menu cart-menu has-scrollbar" data-cart-menu="">
    <div class="menu-top">
      <h2 class="menu-title">Shopping Cart</h2>
      <button class="menu-close-btn" data-cart-close-btn="" aria-label="Close Cart">
        <ion-icon name="close-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon>
      </button>
    </div>

    <ul class="sidebar-menu-list">
      <?php
      $cartItems = [];
      if (count($cartItems) > 0):
        foreach ($cartItems as $item):
      ?>
          <li class="sidebar-menu-item">
            <div class="item-img">
              <img src="<?= $item['image_url_main'] ?>" alt="<?= $item['name'] ?>" width="70" height="70" loading="lazy">
            </div>
            <div class="item-content">
              <a href="product page.php?product_id=<?= $item['product_id'] ?>" class="item-title"><?= $item['name'] ?></a>
              <div class="item-qty-price">
                <span class="item-quantity">Qty: <?= $item['quantity'] ?></span>
                <p class="item-price"><?= number_format($item['price'] * $item['quantity'], 2) ?> EGP</p>
              </div>
            </div>
            <form method="POST" action="remove_from_cart.php">
              <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
              <button class="item-remove-btn" aria-label="Remove from Cart">
                <ion-icon name="close-outline"></ion-icon>
              </button>
            </form>
          </li>
        <?php
        endforeach;
      else:
        ?>
        <li class="sidebar-menu-item empty-message">
          <p>Your cart is currently empty.</p>
        </li>
      <?php endif; ?>
    </ul>

    <div class="menu-bottom">
      <div class="subtotal">
        <p>Subtotal:</p>
        <p class="subtotal-price">
          <?= number_format(array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
          }, $cartItems)), 2) ?> EGP
        </p>
      </div>
      <a href="checkout.php" class="bttn bttn-primary bttn-block">Checkout</a>
    </div>
  </nav>