<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">

    <title>Admin Dashboard Panel</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="./logo.png" alt="">
            </div>

            <span class="logo_name">TechGO</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="../pages/index.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Home</span>
                </a></li>
                <li><a href="./add_product.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Add Products</span>
                </a></li>

            </ul>
            
            <ul class="logout-mode">
                <li><a href="../login/handle_logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <img src="./profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-shopping-basket"></i>
                        <span class="text">Total sales</span>
                        <span class="number">50,120</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Comments</span>
                        <span class="number">20,120</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-user"></i>
                        <span class="text">subscribers</span>
                        <span class="number">10,120</span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Activity</span>
                </div>

                <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Name</span>
                        <span class="data-list">Muhammad Hamdy</span>
                        <span class="data-list">Alhussein Abdelnasser</span>
                        <span class="data-list">Mohamed Ahmed</span>
                        <span class="data-list">Mohamed Ahmed</span>
                        <span class="data-list">Muhammad Hamdy</span>
                        <span class="data-list">Muhammad Hamdy</span>
                        <span class="data-list">Alhussein Abdelnasser</span>
                    </div>
                    <div class="data email">
                        <span class="data-title">Email</span>
                        <span class="data-list">Muhammad Hamdy@gmail.com</span>
                        <span class="data-list">Muhammad Hamdy@gmail.com</span>
                        <span class="data-list">Muhammad Hamdy@gmail.com</span>
                        <span class="data-list">Muhammad Hamdy@gmail.com</span>
                        <span class="data-list">Muhammad Hamdy@gmail.com</span>
                        <span class="data-list">Muhammad Hamdy@gmail.com</span>
                        <span class="data-list">Muhammad Hamdy@gmail.com</span>
                    </div>
                    <div class="data joined">
                        <span class="data-title">Purchase date</span>
                        <span class="data-list">2025-05-1</span>
                        <span class="data-list">2025-05-1</span>
                        <span class="data-list">2025-05-1</span>
                        <span class="data-list">2025-05-1</span>
                        <span class="data-list">2025-05-1</span>
                        <span class="data-list">2025-05-1</span>
                        <span class="data-list">2025-05-1</span>
                       
                    </div>
                    <div class="data type">
                        <span class="data-title">Purchasing status</span>
                        <span class="data-list">pending</span>
                        <span class="data-list">pending</span>
                        <span class="data-list">pending</span>
                        <span class="data-list">pending</span>
                        <span class="data-list">pending</span>
                        <span class="data-list">pending</span>
                        <span class="data-list">pending</span>
                        
                    </div>
                    <div class="data status">
                        <span class="data-title">Product</span>
                        <span class="data-list">Ultra sonic</span>
                        <span class="data-list">Ultra sonic</span>
                        <span class="data-list">Ultra sonic</span>
                        <span class="data-list">Ultra sonic</span>
                        <span class="data-list">Ultra sonic</span>
                        <span class="data-list">Ultra sonic</span>
                        <span class="data-list">Ultra sonic</span>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="./script.js"></script>
</body>
</html>