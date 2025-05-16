<?php
session_start();
require_once '../login/classes.php';
include_once './classes.php';
$homeCards = Product::homeCards();
$newArrivals = Product::newArrivals();

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

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <link
    href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet" />

  <link href="./iteam.css" rel="stylesheet" />
  <link href="./assets/css/style.css" rel="stylesheet" />

  <link rel="shortcut icon" href="../assets/images/logo/favicon.jpg" type="image/x-icon">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

</head>


<!--
    - MAIN
  -->

<main>

  <!--
      - BANNER
    -->

  <!-- slider start -->
  <div class="container">
    <div class="img-slider">

      <div class="slide active">
        <img src="./assets/images/slider/4.jpg" alt="Arduino UNO">
        <div class="info">
          <h2>Arduino UNO big Sale</h2>
          <p>15% sale encouraging you to bring your interactive electronic projects to life with ease.</p>
          <button class="slide-button" onclick="location.href='./Microcontrollers.php'">View More</button>
        </div>
      </div>


      <div class="slide">
        <img src="./assets/images/slider/10.jpg" alt="Project">
        <div class="info">
          <h2>Build your project with us</h2>
          <p>Everything you need for your project is available with us.</p>
          <button class="slide-button" onclick="location.href='./Featured Sensors.php'">View More</button>
        </div>
      </div>


      <div class="slide">
        <img src="./assets/images/slider/9.jpg" alt="ESP8266 Sale">
        <div class="info">
          <h2>ESP8266 big sale</h2>
          <p>Don't miss 15% sale on powerful and affordable Wi-Fi-enabled microcontrollers.</p>
          <button class="slide-button" onclick="location.href='./Microcontrollers.php'">View More</button>
        </div>
      </div>


      <div class="slide">
        <img src="./assets/images/slider/11.jpg" alt="High-Quality PCB">
        <div class="info">
          <h2>High quality PCB</h2>
          <p>Build your PCB board with high quality at unbeatable prices.</p>
          <button class="slide-button" onclick="location.href='./Electronic tools.php'">View More</button>
        </div>
      </div>


      <div class="slide">
        <img src="./assets/images/slider/12.jpg" alt="SMD Components">
        <div class="info">
          <h2>SMD High-Quality Brands</h2>
          <p>Buy SMD components with high quality and top brands.</p>
          <button class="slide-button" onclick="location.href='./Power supplies.php'">View More</button>
        </div>
      </div>


      <div class="navigation">
        <div class="btn active"></div>
        <div class="btn"></div>
        <div class="btn"></div>
        <div class="btn"></div>
        <div class="btn"></div>
      </div>
    </div>
  </div>

  <script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const btns = document.querySelectorAll('.btn');


    function changeSlide(index) {
      slides.forEach((slide, i) => {
        slide.classList.remove('active');
        btns[i].classList.remove('active');
      });

      slides[index].classList.add('active');
      btns[index].classList.add('active');
    }


    btns.forEach((btn, i) => {
      btn.addEventListener('click', () => {
        currentSlide = i;
        changeSlide(currentSlide);
      });
    });


    function autoChangeSlide() {
      setInterval(() => {
        currentSlide = (currentSlide + 1) % slides.length;
        changeSlide(currentSlide);
      }, 8000);
    }

    autoChangeSlide();
  </script>
  <!-- slider end -->



  <!--
      - CATEGORY
    -->

  <div class="category">

    <div class="container">

      <div class="category-item-container has-scrollbar">

        <div class="category-item">

          <div class="category-img-box">
            <img src="./assets/images/icons/sensor-lab-svgrepo-com.svg" alt="electronics" width="30">
          </div>

          <div class="category-content-box">

            <div class="category-content-flex">
              <h3 class="category-item-title">Featured Sensors</h3>

              <p class="category-item-amount">(5)</p>
            </div>

            <a href="./Featured Sensors.php" class="category-btn">Show all</a>

          </div>

        </div>

        <div class="category-item">

          <div class="category-img-box">
            <img src="./assets/images/icons/electronics.svg" alt="electronics" width="30">
          </div>

          <div class="category-content-box">

            <div class="category-content-flex">
              <h3 class="category-item-title">Microcontrollers</h3>

              <p class="category-item-amount">(5)</p>
            </div>

            <a href="./Microcontrollers.php" class="category-btn">Show all</a>

          </div>

        </div>

        <div class="category-item">

          <div class="category-img-box">
            <img src="./assets/images/icons/electric2-svgrepo-com.svg" alt="electronics" width="30">
          </div>

          <div class="category-content-box">

            <div class="category-content-flex">
              <h3 class="category-item-title">Electronic tools</h3>

              <p class="category-item-amount">(5)</p>
            </div>

            <a href="./Electronic tools.php" class="category-btn">Show all</a>

          </div>

        </div>

        <div class="category-item">

          <div class="category-img-box">
            <img src="./assets/images/icons/electricity-svgrepo-com.svg" alt="electronics" width="30">
          </div>

          <div class="category-content-box">

            <div class="category-content-flex">
              <h3 class="category-item-title">Power supplys</h3>

              <p class="category-item-amount">(5)</p>
            </div>

            <a href="./Power supplies.php" class="category-btn">Show all</a>

          </div>
        </div>
      </div>
    </div>
  </div>





  <!--
      - PRODUCT
    -->

  <div class="product-container">

    <div class="container">





      <div class="product-box">

        <!--
            - PRODUCT MINIMAL
          -->

        <div class="product-minimal">

          <div class="product-showcase">

            <h2 class="title">New Arrivals</h2>

            <div class="showcase-wrapper has-scrollbar">

              <div class="showcase-container">

                <?php
                foreach ($newArrivals as $product) {
                ?>
                  <div class="showcase">

                    <a href="#" class="showcase-img-box">
                      <img src="<?= $product["image_url_main"] ?>" alt="<?= $product["name"] ?>" width="70" class="showcase-img">
                    </a>

                    <div class="showcase-content">

                      <a href="./product page.php?product_id=<?= $product["product_id"] ?>">
                        <h4 class="showcase-title"><?= $product["name"] ?></h4>
                      </a>

                      <a href="<?= $product["category"] ?>.php" class="showcase-category"><?= $product["category"] ?></a>

                      <div class="price-box">
                        <p class="price"><?= $product["price"] ?> EGP</p>
                        <del></del>
                      </div>

                    </div>

                  </div>

                <?php
                }
                ?>

              </div>
            </div>
          </div>

          <div class="product-showcase">

            <h2 class="title">Trending</h2>

            <div class="showcase-wrapper  has-scrollbar">

              <div class="showcase-container">

                <div class="showcase">

                  <a href="#" class="showcase-img-box">
                    <img src="./assets/images/products/Delay Real-time.jpg" alt="Delay Real-time.jpg" width="70" class="showcase-img">
                  </a>

                  <div class="showcase-content">

                    <a href="#">
                      <h4 class="showcase-title">Delay Real-time</h4>
                    </a>

                    <a href="#" class="showcase-category">sensors</a>

                    <div class="price-box">
                      <p class="price">45.00eg</p>
                      <del>65.00eg</del>
                    </div>

                  </div>

                </div>
                <div class="showcase">

                  <a href="#" class="showcase-img-box">
                    <img src="./assets/images/products/Delay Real-time.jpg" alt="Delay Real-time.jpg" width="70" class="showcase-img">
                  </a>

                  <div class="showcase-content">

                    <a href="#">
                      <h4 class="showcase-title">Delay Real-time</h4>
                    </a>

                    <a href="#" class="showcase-category">sensors</a>

                    <div class="price-box">
                      <p class="price">45.00eg</p>
                      <del>65.00eg</del>
                    </div>

                  </div>

                </div>

                <div class="showcase">

                  <a href="#" class="showcase-img-box">
                    <img src="./assets/images/products/Delay Real-time.jpg" alt="Delay Real-time.jpg" width="70" class="showcase-img">
                  </a>

                  <div class="showcase-content">

                    <a href="#">
                      <h4 class="showcase-title">Delay Real-time</h4>
                    </a>

                    <a href="#" class="showcase-category">sensors</a>

                    <div class="price-box">
                      <p class="price">45.00eg</p>
                      <del>65.00eg</del>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--
            - PRODUCT FEATURED
          -->

        <div class="product-featured">

          <h2 class="title">Deal of the day</h2>

          <div class="showcase-wrapper has-scrollbar">

            <div class="showcase-container">

              <div class="showcase">

                <div class="showcase-banner">
                  <img src="./assets/images/slider/4.jpg" alt="Arduino UNO" class="showcase-img">
                </div>

                <div class="showcase-content">

                  <a href="#">
                    <h3 class="showcase-title">Arduino UNO</h3>
                  </a>

                  <p class="showcase-desc">
                    Arduino UNO 25% sale today
                  </p>

                  <div class="price-box">
                    <p class="price">150.00eg</p>

                    <del>200.00eg</del>
                  </div>

                  <button class="add-cart-btn">add to cart</button>

                  <div class="showcase-status">
                    <div class="wrapper">
                      <p>
                        already sold: <b>20</b>
                      </p>

                      <p>
                        available: <b>40</b>
                      </p>
                    </div>

                    <div class="showcase-status-bar"></div>
                  </div>

                  <div class="countdown-box">

                    <p class="countdown-desc">
                      Hurry Up! Offer ends in:
                    </p>

                    <div class="countdown">

                      <div class="countdown-content">

                        <p class="display-number">0</p>

                        <p class="display-text">Days</p>

                      </div>

                      <div class="countdown-content">
                        <p class="display-number">24</p>
                        <p class="display-text">Hours</p>
                      </div>

                      <div class="countdown-content">
                        <p class="display-number">59</p>
                        <p class="display-text">Min</p>
                      </div>

                      <div class="countdown-content">
                        <p class="display-number">00</p>
                        <p class="display-text">Sec</p>
                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <div class="showcase-container">

              <div class="showcase">

                <div class="showcase-banner">
                  <img src="./assets/images/slider/11.jpg" alt="PCB" class="showcase-img">
                </div>

                <div class="showcase-content">

                  <h3 class="showcase-title">
                    <a href="#" class="showcase-title">PCB</a>
                  </h3>

                  <p class="showcase-desc">
                    Lorem ipsum dolor sit amet consectetur Lorem ipsum
                    dolor dolor sit amet consectetur Lorem ipsum dolor
                  </p>

                  <div class="price-box">
                    <p class="price">199.00eg</p>
                    <del>250.00eg</del>
                  </div>

                  <button class="add-cart-btn">add to cart</button>

                  <div class="showcase-status">
                    <div class="wrapper">
                      <p> already sold: <b>15</b> </p>

                      <p> available: <b>40</b> </p>
                    </div>

                    <div class="showcase-status-bar"></div>
                  </div>

                  <div class="countdown-box">

                    <p class="countdown-desc">Hurry Up! Offer ends in:</p>

                    <div class="countdown">
                      <div class="countdown-content">
                        <p class="display-number">360</p>
                        <p class="display-text">Days</p>
                      </div>

                      <div class="countdown-content">
                        <p class="display-number">24</p>
                        <p class="display-text">Hours</p>
                      </div>

                      <div class="countdown-content">
                        <p class="display-number">59</p>
                        <p class="display-text">Min</p>
                      </div>

                      <div class="countdown-content">
                        <p class="display-number">00</p>
                        <p class="display-text">Sec</p>
                      </div>
                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>



        <!--
            - PRODUCT GRID
          -->

        <div class="product-main">

          <h2 class="title">Some of our products</h2>

          <div class="product-grid">

            <?php
            foreach ($homeCards as $product) {
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

        <!--
      - TESTIMONIALS, CTA & SERVICE
    -->

        <div>

          <div class="container">

            <div class="testimonials-box">

              <!--
            - TESTIMONIALS
          -->

              <div class="testimonial">

                <h2 class="title">testimonial</h2>

                <div class="testimonial-card">

                  <img src="./assets/images/mh.png" alt="alan doe" class="testimonial-banner" width="80" height="80">

                  <p class="testimonial-name">Muhammad Hamdy</p>

                  <p class="testimonial-title">CEO &amp; Founder MH</p>

                  <img src="./assets/images/icons/quotes.svg" alt="quotation" class="quotation-img" width="26">

                  <p class="testimonial-desc">
                    Lorem ipsum dolor sit amet consectetur Lorem ipsum
                    dolor dolor sit amet.
                  </p>

                </div>

              </div>

              <!--
            - CTA
          -->

              <div class="cta-container">

                <img src="./assets/images/cta-banner.jpg" alt="student collection" class="cta-banner">

                <a href="#" class="cta-content">

                  <p class="discount">25% Discount</p>

                  <h2 class="cta-title">Student collection</h2>

                  <p class="cta-text">Starting @ 10eg</p>

                  <button class="cta-btn">Shop now</button>

                </a>

              </div>

              <!--
            - SERVICE
          -->

              <div class="service">

                <h2 class="title">Our Services</h2>

                <div class="service-container">

                  <a href="#" class="service-item">

                    <div class="service-icon">
                      <ion-icon name="boat-outline" role="img" class="md hydrated" aria-label="boat outline"></ion-icon>
                    </div>

                    <div class="service-content">

                      <h3 class="service-title">Worldwide Delivery</h3>
                      <p class="service-desc">For Order Over $100</p>

                    </div>

                  </a>

                  <a href="#" class="service-item">

                    <div class="service-icon">
                      <ion-icon name="rocket-outline" role="img" class="md hydrated" aria-label="rocket outline"></ion-icon>
                    </div>

                    <div class="service-content">

                      <h3 class="service-title">Next Day delivery</h3>
                      <p class="service-desc">EG Orders Only</p>

                    </div>

                  </a>

                  <a href="#" class="service-item">

                    <div class="service-icon">
                      <ion-icon name="call-outline" role="img" class="md hydrated" aria-label="call outline"></ion-icon>
                    </div>

                    <div class="service-content">

                      <h3 class="service-title">Best Online Support</h3>
                      <p class="service-desc">Hours: 8AM - 11PM</p>

                    </div>

                  </a>

                  <a href="#" class="service-item">

                    <div class="service-icon">
                      <ion-icon name="arrow-undo-outline" role="img" class="md hydrated" aria-label="arrow undo outline"></ion-icon>
                    </div>

                    <div class="service-content">

                      <h3 class="service-title">Return Policy</h3>
                      <p class="service-desc">Easy &amp; Free Return</p>

                    </div>

                  </a>

                  <a href="#" class="service-item">

                    <div class="service-icon">
                      <ion-icon name="ticket-outline" role="img" class="md hydrated" aria-label="ticket outline"></ion-icon>
                    </div>

                    <div class="service-content">

                      <h3 class="service-title">30% money back</h3>
                      <p class="service-desc">For Order Over $100</p>

                    </div>

                  </a>

                </div>

              </div>

            </div>

          </div>

        </div>

        <!--
      - BLOG
    -->

        <div class="blog">

          <div class="container">

            <div class="blog-container has-scrollbar">

              <div class="blog-card">

                <a href="#">
                  <img src="./assets/images/slider/4.jpg" alt="lorem2" width="300" class="blog-banner">
                </a>

                <div class="blog-content">

                  <a href="#" class="blog-category">module</a>

                  <a href="#">
                    <h3 class="blog-title">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h3>
                  </a>

                  <p class="blog-meta">
                    By <cite>Mr Admin</cite> / <time datetime="2022-04-26">Apr 26, 2025</time>
                  </p>

                </div>

              </div>

              <div class="blog-card">

                <a href="#">
                  <img src="./assets/images/slider/4.jpg" alt="lorem2" width="300" class="blog-banner">
                </a>

                <div class="blog-content">

                  <a href="#" class="blog-category">module</a>

                  <a href="#">
                    <h3 class="blog-title">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h3>
                  </a>

                  <p class="blog-meta">
                    By <cite>Mr Admin</cite> / <time datetime="2025-04-26">Apr 26, 2025</time>
                  </p>

                </div>

              </div>

              <div class="blog-card">

                <a href="#">
                  <img src="./assets/images/slider/4.jpg" alt="lorem2" width="300" class="blog-banner">
                </a>

                <div class="blog-content">

                  <a href="#" class="blog-category">module</a>

                  <a href="#">
                    <h3 class="blog-title">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h3>
                  </a>

                  <p class="blog-meta">
                    By <cite>Mr Admin</cite> / <time datetime="2025-04-26">Apr 26, 2025</time>
                  </p>

                </div>

              </div>

              <div class="blog-card">

                <a href="#">
                  <img src="./assets/images/slider/4.jpg" alt="lorem2" width="300" class="blog-banner">
                </a>

                <div class="blog-content">

                  <a href="#" class="blog-category">module</a>

                  <a href="#">
                    <h3 class="blog-title">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h3>
                  </a>

                  <p class="blog-meta">
                    By <cite>Mr Admin</cite> / <time datetime="2025-04-26">Apr 26, 2025</time>
                  </p>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>
    </div>
  </div>
</main>

<!--
    - FOOTER
  -->
<?php
require_once './footer.php';
?>