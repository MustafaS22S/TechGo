<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">

    <title>Admin Dashboard Panel - Add Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for the form within the dashboard content area */
        .form-container {
            background-color: var(--panel-color);
            /* Use dashboard's panel color */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Optional shadow for the form container */
            margin-top: 50px;
            /* Add some top margin to separate from the top navigation */
        }

        .form-container h2 {
            color: var(--text-color);
            /* Use dashboard's text color */
            margin-bottom: 1rem;
        }

        .form-container label {
            color: var(--black-light-color);
            /* Use dashboard's secondary text color */
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            font-weight: medium;
        }

        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container textarea,
        .form-container select {
            width: 100%;
            padding: 0.625rem 1rem;
            margin-bottom: 1rem;
            border: 1px solid var(--border-color);
            /* Use dashboard's border color */
            border-radius: 0.375rem;
            background-color: var(--panel-color);
            /* Use dashboard's panel color */
            color: var(--text-color);
            /* Use dashboard's text color */
            font-size: 0.875rem;
            transition: border-color 0.15s ease-in-out;
        }

        .form-container input[type="text"]:focus,
        .form-container input[type="number"]:focus,
        .form-container textarea:focus,
        .form-container select:focus {
            outline: none;
            border-color: var(--primary-color);
            /* Use dashboard's primary color for focus */
            box-shadow: 0 0 0 0.2rem rgba(var(--primary-color-rgb), 0.5);
            /* Optional focus shadow using rgba */
        }

        .form-container select {
            appearance: none;
            /* Remove default arrow */
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%239ca3af' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.5rem center;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        .form-container .grid-cols-1 {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        @media (min-width: 640px) {
            .form-container .grid-cols-1 {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .form-container .flex-col {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container .imagePreviewContainer {
            width: 100%;
            height: 14rem;
            /* Adjust as needed */
            background-color: #ddd;
            /* Placeholder background - consider a variable if you have one */
            border: 2px dashed #999;
            /* Consider a border color variable */
            border-radius: 0.375rem;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            margin-bottom: 1rem;
            overflow: hidden;
            /* To contain the image */
        }

        .form-container .imagePreviewContainer img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .form-container .uploadIconContainer {
            text-align: center;
            color: #777;
            /* Consider a secondary text color variable */
        }

        .form-container .btn {
            background-color: var(--primary-color);
            /* Use dashboard's primary color */
            color: var(--button-text-color, white);
            /* Assuming you might have a button text color */
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.15s ease-in-out;
            cursor: pointer;
            border: none;
            width: 100%;
            /* Make buttons full width */
        }

        .form-container .btn:hover {
            background-color: var(--bittersweet);
            /* Darken the primary color on hover - adjust as needed */
        }

        .form-container .mt-8 {
            margin-top: 2rem;
        }

        .form-container .text-green-400 {
            color: var(--success-color, #68D391);
            /* Use a success color variable if available */
        }

        .form-container .text-red-400 {
            color: var(--error-color, #FC8181);
            /* Use an error color variable if available */
        }

        .form-container .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <nav class="close">
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
                <li><a href="./admin.php">
                        <i class="uil uil-files-landscapes"></i>
                        <span class="link-name">Dashboard</span>
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

        <h2>Add New Product</h2>

        <div class="form-container">
            <h2 class="text-xl sm:text-2xl font-semibold">Product Details</h2>

            <form id="addProductForm" action="../pages/store_product.php" method="POST" enctype="multipart/form-data">
                <div class="md:flex md:gap-x-6">
                    <div class="w-full md:w-1/2">
                        <div class="mb-4">
                            <label for="productName" class="block mb-2 text-sm font-medium">Product Name</label>
                            <input type="text" id="productName" name="productName"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"
                                placeholder="e.g., Premium Wireless Headphones" required>
                        </div>

                        <div class="mb-4">
                            <label for="productDescription" class="block mb-2 text-sm font-medium">Description</label>
                            <textarea id="productDescription" name="productDescription" rows="3"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"
                                placeholder="Enter detailed product description..." required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="productCategory" class="block mb-2 text-sm font-medium">Category</label>
                            <select id="productCategory" name="productCategory"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out custom-select-arrow"
                                required>
                                <option value="" class="text-gray-500">Select category</option>
                                <option value="Featured Sensors" class="text-gray-700">Featured Sensors</option>
                                <option value="Microcontrollers" class="text-gray-700">Microcontrollers</option>
                                <option value="Electronic tools" class="text-gray-700">Electronic tools</option>
                                <option value="Power supplies" class="text-gray-700">Power supplies</option>

                            </select>
                        </div>

                        <div class="grid-cols-1 sm:grid-cols-2 sm:gap-x-4">
                            <div class="mb-4">
                                <label for="price" class="block mb-2 text-sm font-medium">price</label>
                                <input type="number"
                                    id="price" name="price"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"
                                    placeholder="90.00 eg">
                            </div>

                        </div>
                    </div>

                    <div class="w-full md:w-1/2 mt-6 md:mt-0">
                        <label class="block mb-2 text-sm font-medium self-start">Product Images</label>
                        <div class="flex flex-col">
                            <div class="flex flex-col items-center mb-4 image-upload-section">
                                <div id="imagePreviewContainer-0"
                                    class="w-full h-56 sm:h-64 bg-gray-100 rounded-lg flex items-center justify-center border-2 border-dashed border-gray-400 cursor-pointer relative mb-3"
                                    onclick="document.getElementById('productImageFile-0').click();">
                                    <img id="imagePreview-0" src="#" alt="Image Preview 1"
                                        class="hidden max-h-full max-w-full rounded-lg object-contain">
                                    <div id="uploadIconContainer-0" class="text-center">
                                        <svg class="w-16 h-16 text-gray-400 mx-auto" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.338 0 4.5 4.5 0 01-1.41 8.775H6.75z" />
                                        </svg>
                                        <p class="mt-2 text-sm text-gray-400">Click to upload</p>
                                    </div>
                                </div>
                                <input type="file" id="productImageFile-0" name="productImageFile-0" accept="image/*"
                                    class="hidden" onchange="previewImage(this, 0)">
                                <button type="button" onclick="document.getElementById('productImageFile-0').click();"
                                    class="btn w-full max-w-xs hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 transition duration-150 ease-in-out">
                                    Upload Product Image 1
                                </button>
                                <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 10MB.</p>
                            </div>

                            <div class="flex flex-col items-center mb-4 image-upload-section">
                                <div id="imagePreviewContainer-1"
                                    class="w-full h-56 sm:h-64 bg-gray-100 rounded-lg flex items-center justify-center border-2 border-dashed border-gray-400 cursor-pointer relative mb-3"
                                    onclick="document.getElementById('productImageFile-1').click();">
                                    <img id="imagePreview-1" src="#" alt="Image Preview 2"
                                        class="hidden max-h-full max-w-full rounded-lg object-contain">
                                    <div id="uploadIconContainer-1" class="text-center">
                                        <svg class="w-16 h-16 text-gray-400 mx-auto" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.338 0 4.5 4.5 0 01-1.41 8.775H6.75z" />
                                        </svg>
                                        <p class="mt-2 text-sm text-gray-400">Click to upload</p>
                                    </div>
                                </div>
                                <input type="file" id="productImageFile-1" name="productImageFile-1" accept="image/*"
                                    class="hidden" onchange="previewImage(this, 1)">
                                <button type="button" onclick="document.getElementById('productImageFile-1').click();"
                                    class="btn w-full max-w-xs hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 transition duration-150 ease-in-out">
                                    Upload Product Image 2
                                </button>
                                <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 10MB.</p>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="mt-8">
                    <button type="submit" id="addProductBtn"
                        class="btn bg-green-600 hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:ring-opacity-75 uppercase text-sm tracking-wider shadow-md hover:shadow-lg">
                        Add Product Now
                    </button>
                </div>
            </form>

            <div id="form-message" class="mt-6 text-center">
            </div>
        </div>
        </div>
    </section>

    <script src="./script.js"></script>
    <script>
        function previewImage(input, index) {
            const previewContainer = document.getElementById(`imagePreviewContainer-${index}`);
            const imagePreview = document.getElementById(`imagePreview-${index}`);
            const uploadIconContainer = document.getElementById(`uploadIconContainer-${index}`);
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                    uploadIconContainer.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = "#";
                imagePreview.classList.add('hidden');
                uploadIconContainer.classList.remove('hidden');
            }
        }
    </script>
</body>

</html>