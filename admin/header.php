<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>eCommerce Website</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="../assets/images/logo/favicon.jpg" type="image/x-icon">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="../assets/css/style.css">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body class="">


  <div class="overlay" data-overlay=""></div>

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
            wlcome
            to <b>TechGo</b> store
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

        <div class="header-search-container">

          <input type="search" name="search" class="search-field" placeholder="Enter your product name...">

          <button class="search-btn">
            <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
          </button>

        </div>

        <div class="header-user-actions">
          <a href="./login/login.php" class="action-btn" aria-label="User Account">
            <ion-icon name="person-outline" role="img" class="md hydrated" aria-label="person outline"></ion-icon>
          </a>
          <button class="action-btn" data-wishlist-open-btn="" aria-label="Open Wishlist">
            <ion-icon name="heart-outline" role="img" class="md hydrated" aria-label="heart outline"></ion-icon>
            <span class="count" data-wishlist-count="">0</span>
          </button>
          <button class="action-btn" data-cart-open-btn="" aria-label="Open Shopping Cart">
            <ion-icon name="bag-handle-outline" role="img" class="md hydrated" aria-label="bag handle outline"></ion-icon>
            <span class="count" data-cart-count="">0</span>
          </button>
        </div>

      </div>

    </div>

    <nav class="desktop-navigation-menu">

      <div class="container">

        <ul class="desktop-menu-category-list">

          <li class="menu-category">
            <a href="#" class="menu-title">Home</a>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Categories</a>

            <div class="dropdown-panel">

              <ul class="dropdown-panel-list">

                <li class="menu-title">
                  <a href="./pages/2Sections by n&t/index.php">Featured Sensors</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 1/Electrec Microphone Amplifier.php">Electrec Microphone</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 1/Force sensitive Resistor Sensor.php">Force sensitive Resistor</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 1/Gas Sensor.php">Gas Sensor</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 1/KY-015 DHT 11 Temperature Sensor .php">KY-015 DHT 11 Temperature</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 1/Ultrasonic Distance Sensor.php">Ultrasonic Distance Sensor</a>
                </li>

              </ul>

              <ul class="dropdown-panel-list">

                <li class="menu-title">
                  <a href="./pages/2Sections by n&t/index2.php">Microcontrollers</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 2/Arduino Pro Mini.php">Arduino Pro Mini</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 2/Arduino Uno R3.php">Arduino Uno R3</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 2/Joystick Shield for Arduino.php">Joystick Shield</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 2/Mini Breadboard 400 PIN.php">Mini Breadboard 400 PIN</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 2/Raspberry Pi Pico RP2020.php">Raspberry Pi Pico</a>
                </li>

              </ul>

              <ul class="dropdown-panel-list">

                <li class="menu-title">
                  <a href="./pages/2Sections by n&t/index3.php">Electronic Tools</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 3/2.4GHz Transceiver nRF 24L01 Wireless.webp.php">Emergency Stop Switch</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 3/Emergency Stop Switch.php">Emergency Stop Switch</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 3/GSM-GPRS Arduino SIM900.php">GSM-GPRS Arduino</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 3/OnOff Rocker Switch.php">OnOff Rocker Switch</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 3/RF Kit 433 Mhz Wireless.php">RF Kit 433 Mhz Wireless</a>
                </li>

              </ul>

              <ul class="dropdown-panel-list">

                <li class="menu-title">
                  <a href="./pages/2Sections by n&t/index4.php">Power Supply</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 4/Arduino Li-ion Battery Charging.php">Arduino Li-ion Charging</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 4/DC to DC Converter 48V→12V 30A Waterproof.php">DC to DC Converter</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 4/TP5100 Lithium Battery Charger.php">TP5100 Lithium Charger</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 4/Triple Channel 18650 Charger 3.7v 3A.php">Triple Channel Charger</a>
                </li>

                <li class="panel-list-item">
                  <a href="./pages/5Items by mus/section 4/Ultracell Lead Acid Battery 12V 26A.php">Ultracell Lead Acid Battery</a>
                </li>

              </ul>

            </div>
          </li>

          <li class="menu-category">
            <a href="./pages/3About by huss/about.php" class="menu-title">about us</a>
          </li>

          <li class="menu-category">
            <a href="./pages/4Contact by r&mar/contact.php" class="menu-title">contact us</a>

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
    <button class="action-btn" aria-label="Home"> <ion-icon name="home-outline" role="img" class="md hydrated" aria-label="home outline"></ion-icon>
    </button>
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
      <li class="menu-category"><a href="#" class="menu-title">Home</a></li>
      <li class="menu-category">
        <button class="accordion-menu" data-accordion-btn="">
          <p class="menu-title">Categories</p>
          <div>
            <ion-icon name="add-outline" class="add-icon md hydrated" role="img" aria-label="add outline"></ion-icon>
            <ion-icon name="remove-outline" class="remove-icon md hydrated" role="img" aria-label="remove outline"></ion-icon>
          </div>
        </button>
        <ul class="submenu-category-list" data-accordion="">
          <li class="submenu-category"><a href="./pages/2Sections by n&t/index.html" class="submenu-title">Featured Sensors</a></li>
          <li class="submenu-category"><a href="./pages/2Sections by n&t/index2.html" class="submenu-title">Microcontrollers</a></li>
          <li class="submenu-category"><a href="./pages/2Sections by n&t/index3.html" class="submenu-title">Electronic tools</a></li>
          <li class="submenu-category"><a href="./pages/2Sections by n&t/index4.html" class="submenu-title">Power supplies</a></li>

        </ul>
      </li>
      <li class="menu-category"><a href="./pages/3About by huss/about.html" class="menu-title">About Us</a></li>
      <li class="menu-category"><a href="./pages/4Contact by r&mar/contact.html" class="menu-title">Contact Us</a></li>
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
      <li class="sidebar-menu-item">
        <div class="item-img">
          <img src="./assets/images/products/Gas%20Sensor.webp" alt="Gas Sensor" width="70" height="70" loading="lazy">
        </div>
        <div class="item-content">
          <a href="#" class="item-title">Gas Sensor MQ5</a>
          <p class="item-price">25.00 EGP</p>
        </div>
        <button class="item-remove-btn" aria-label="Remove from Wishlist">
          <ion-icon name="close-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon>
        </button>
      </li>
      <li class="sidebar-menu-item empty-message" style="display: none;">
        <p>Your wishlist is currently empty.</p>
      </li>
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
      <li class="sidebar-menu-item">
        <div class="item-img">
          <img src="./assets/images/products/Delay%20Real-time.jpg" alt="Delay Real-time Relay" width="70" height="70" loading="lazy">
        </div>
        <div class="item-content">
          <a href="#" class="item-title">Delay Real-time Relay</a>
          <div class="item-qty-price">
            <span class="item-quantity">Qty: 1</span>
            <p class="item-price">58.00 EGP</p>
          </div>
        </div>
        <button class="item-remove-btn" aria-label="Remove from Cart">
          <ion-icon name="close-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon>
        </button>
      </li>
      <li class="sidebar-menu-item empty-message" style="display: none;">
        <p>Your cart is currently empty.</p>
      </li>
    </ul>
    <div class="menu-bottom">
      <div class="subtotal">
        <p>Subtotal:</p>
        <p class="subtotal-price">58.00 EGP</p>
      </div>
      <a href="#" class="bttn bttn-primary bttn-block">Checkout</a>
    </div>
  </nav>