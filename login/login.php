<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechGO Store login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="../pages/assets/images/logo/favicon.jpg" type="image/x-icon">
</head>

<body>
<header>
        <h2 class="logo">TechGo Store</h2>
        <nav class="nav">
            <a href="../pages/index.php">Home</a>
            <a href="../pages/contact.php">Contact</a>
            <a href="../pages/about.php">About</a>
        </nav>
    </header>
    <div class="wrapper">
        <div class="form-box login">
            <h2>Login</h2>


            <form action="handle_login.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                    <div class="input-line">
                    <small style='color:red'><?php if(isset($_SESSION["errors"]["email"])) echo $_SESSION["errors"]["email"] ?></small></div>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                    <div class="input-line">
                    <small style='color:red'><?php if(isset($_SESSION["errors"]["password"])) echo $_SESSION["errors"]["password"] ?></small></div>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account <a href="#" class="register-link">Register</a></p>
                </div>
                <?php
             if (isset($_GET["msg"]) && $_GET["msg"] == "success") {
                echo "<span style='color:limegreen'>You have registered successfully</span>";
             }
            
             elseif (isset($_GET["msg"]) && $_GET["msg"] == "alreadyRegistred") {
                echo "<span style='color:limegreen'>You already registered please login</span>";
                
             }
             elseif (isset($_GET["msg"]) && $_GET["msg"] == "user_not_found") {
                echo "<span style='color:red'>user or password not found please register</span>";
                
             }
            ?>
            </form>
            
        </div>
        <div class="form-box register">
            <h2>Registeration</h2>
            <form action="handel_register.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" name="uname" required>
                    <label>Username</label>
                    <div class="input-line">
                        <small style='color:red'><?php if(isset($_SESSION["errors"]["uname"])) echo $_SESSION["errors"]["uname"] ?></small></div>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                    <div class="input-line">
                        <small style='color:red'><?php if(isset($_SESSION["errors"]["email"])) echo $_SESSION["errors"]["email"] ?></small></div>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="call-outline"></ion-icon></span>
                    <input type="phone" name="phone" required>
                    <label>phone</label>
                    <div class="input-line">
                        <small style='color:red'><?php if(isset($_SESSION["errors"]["phone"])) echo $_SESSION["errors"]["phone"] ?></small></div>
                </div>    
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="pw" required>
                    <label>Password</label>
                    <div class="input-line">
                        <small style='color:red'><?php if(isset($_SESSION["errors"]["pw"])) echo $_SESSION["errors"]["pw"] ?></small></div>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="cp" required>
                    <label>confirm Password</label>
                    <div class="input-line"><small style='color:red'><div><?php if(isset($_SESSION["errors"]["cp"])) echo $_SESSION["errors"]["cp"] ?></div></small></div>
                </div>
                
                <div class="remember-forgot">
                    <label style="margin: 20px 0px 15px 0px;"><input type="checkbox">I agree to the conditions & terms</label>
                </div>
                <button type="submit" class="btn">Register </button>
                <div class="login-register">
                    <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
            <?php
            // if (!empty($_SESSION["errors"])) {
            //     foreach ($_SESSION["errors"] as $input_key => $errors) {
            //         echo "<span style='color:red'>$errors </span>" . "<br>";
            //     }
            // }
            ?>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        const wrapper = document.querySelector('.wrapper');
        const loginLink = document.querySelector('.login-link');
        const registerLink = document.querySelector('.register-link');

        registerLink.addEventListener('click', () => {
            wrapper.classList.add('active');
        });

        loginLink.addEventListener('click', () => {
            wrapper.classList.remove('active');
        });
    </script>
    <script>
        const nav = document.querySelector(".nav"),
            searchIcon = document.querySelector("#searchIcon"),
            navOpenBtn = document.querySelector(".navOpenBtn"),
            navCloseBtn = document.querySelector(".navCloseBtn");

        searchIcon.addEventListener("click", () => {
            nav.classList.toggle("openSearch");
            nav.classList.remove("openNav");
            if (nav.classList.contains("openSearch")) {
                return searchIcon.classList.replace("uil-search", "uil-times");
            }
            searchIcon.classList.replace("uil-times", "uil-search");
        });

        navOpenBtn.addEventListener("click", () => {
            nav.classList.add("openNav");
            nav.classList.remove("openSearch");
            searchIcon.classList.replace("uil-times", "uil-search");
        });
        navCloseBtn.addEventListener("click", () => {
            nav.classList.remove("openNav");
        });
    </script>
    <script>
        function showSidebar() {
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'flex'
        }

        function hideSidebar() {
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'none'
        }
    </script>
</body>

</html>
<?php
    unset($_SESSION["errors"]);
?>