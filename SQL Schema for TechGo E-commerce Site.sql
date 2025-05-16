-- SQL Schema for TechGo E-commerce Site
create database if not exists techgo;

use techgo;
-- Disable foreign key checks temporarily to avoid order issues during creation
SET FOREIGN_KEY_CHECKS = 0;

-- Table: Categories
-- Stores product categories and potentially subcategories.
CREATE TABLE Categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    parent_category_id INT NULL, -- For subcategories (references Categories.category_id)
    name VARCHAR(100) NOT NULL UNIQUE, -- Category name (e.g., 'Microcontrollers', 'SMD Components')
    description TEXT NULL, -- Optional description
    image_url VARCHAR(255) NULL, -- Optional image/icon URL (like './assets/images/icons/electronics.svg')
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (parent_category_id) REFERENCES Categories (category_id) ON DELETE SET NULL ON UPDATE CASCADE
);

-- Table: Products
-- Stores details about each product offered.
CREATE TABLE Products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL, -- Foreign key linking to the Categories table
    name VARCHAR(255) NOT NULL, -- Product name (e.g., 'Arduino Uno R3-Clone')
    sku VARCHAR(100) UNIQUE NULL, -- Stock Keeping Unit (optional but good practice)
    description TEXT NULL, -- Detailed product description
    price DECIMAL(10, 2) NOT NULL, -- Product price (e.g., 150.00)
    discounted_price DECIMAL(10, 2) NULL, -- Optional sale price
    stock_quantity INT NOT NULL DEFAULT 0, -- Available stock count
    image_url_main VARCHAR(255) NULL, -- Main product image URL
    image_url_thumbnail VARCHAR(255) NULL, -- Thumbnail image URL
    is_active BOOLEAN DEFAULT TRUE, -- Whether the product is currently listed/available
    is_featured BOOLEAN DEFAULT FALSE, -- Whether the product is featured (e.g., for 'Hot Offers')
    average_rating DECIMAL(3, 2) DEFAULT 0.00, -- Average user rating (can be calculated or stored)
    rating_count INT DEFAULT 0, -- Number of ratings received
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES Categories (category_id) ON DELETE RESTRICT ON UPDATE CASCADE -- Prevent deleting a category if products exist
);

-- Table: Users
-- Stores customer account information.
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Store hashed passwords, never plain text!
    phone VARCHAR(20) NULL,
    role enum('subscriber', 'admin') default 'subscriber',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    is_active BOOLEAN DEFAULT TRUE
);

-- Table: Addresses
-- Stores user shipping/billing addresses (optional, can be simplified if only one address per user needed).
CREATE TABLE Addresses (
    address_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    address_line1 VARCHAR(255) NOT NULL,
    address_line2 VARCHAR(255) NULL,
    city VARCHAR(100) NOT NULL,
    state_province VARCHAR(100) NULL,
    postal_code VARCHAR(20) NOT NULL,
    country VARCHAR(50) NOT NULL DEFAULT 'Egypt', -- Default based on context
    address_type ENUM('shipping', 'billing') NOT NULL,
    is_default BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users (user_id) ON DELETE CASCADE ON UPDATE CASCADE -- Delete addresses if user is deleted
);

-- Table: Wishlists
-- Links users to products they have added to their wishlist.
CREATE TABLE Wishlists (
    wishlist_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users (user_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (product_id) REFERENCES Products (product_id) ON DELETE CASCADE ON UPDATE CASCADE,
    UNIQUE KEY user_product_wishlist (user_id, product_id) -- Prevent adding the same product multiple times per user
);

-- Table: CartItems
-- Stores items currently in a user's shopping cart.
-- Note: For non-logged-in users, you might use session IDs instead of user_id. This schema assumes logged-in users.
CREATE TABLE CartItems (
    cart_item_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL, -- Or a session_id for anonymous users
    product_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1 CHECK (quantity > 0), -- Ensure quantity is positive
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users (user_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (product_id) REFERENCES Products (product_id) ON DELETE CASCADE ON UPDATE CASCADE,
    UNIQUE KEY user_product_cart (user_id, product_id) -- Only one entry per product per user's cart
);

-- Table: Orders
-- Stores information about completed customer orders.
CREATE TABLE Orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(12, 2) NOT NULL,
    status ENUM(
        'pending',
        'processing',
        'shipped',
        'delivered',
        'cancelled',
        'refunded'
    ) NOT NULL DEFAULT 'pending',
    shipping_address_id INT NULL, -- Link to the Addresses table
    billing_address_id INT NULL, -- Link to the Addresses table
    payment_method VARCHAR(50) NULL,
    payment_status ENUM('pending', 'paid', 'failed') NOT NULL DEFAULT 'pending',
    tracking_number VARCHAR(100) NULL,
    notes TEXT NULL, -- Customer or internal notes
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users (user_id) ON DELETE RESTRICT ON UPDATE CASCADE, -- Don't delete user if they have orders
    FOREIGN KEY (shipping_address_id) REFERENCES Addresses (address_id) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (billing_address_id) REFERENCES Addresses (address_id) ON DELETE SET NULL ON UPDATE CASCADE
);

-- Table: OrderItems
-- Stores the individual products included in each order (linking Orders and Products).
CREATE TABLE OrderItems (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL, -- Store the product ID at the time of order
    quantity INT NOT NULL CHECK (quantity > 0),
    price_at_purchase DECIMAL(10, 2) NOT NULL, -- Store the price paid, as product price might change later
    product_name_at_purchase VARCHAR(255) NOT NULL, -- Store name in case product details change/deleted
    FOREIGN KEY (order_id) REFERENCES Orders (order_id) ON DELETE CASCADE ON UPDATE CASCADE, -- Delete items if order is deleted
    FOREIGN KEY (product_id) REFERENCES Products (product_id) ON DELETE RESTRICT ON UPDATE CASCADE -- Prevent deleting product if it's in an order (or use SET NULL if preferred)
);

-- Table: NewsletterSubscriptions
-- Stores email addresses collected for the newsletter.
CREATE TABLE NewsletterSubscriptions (
    subscription_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_active BOOLEAN DEFAULT TRUE
);

-- Table: ProductRatings (Optional - for storing individual ratings)
-- Stores individual user ratings for products.
CREATE TABLE ProductRatings (
    rating_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    user_id INT NOT NULL,
    rating INT NOT NULL CHECK (
        rating >= 1
        AND rating <= 5
    ), -- Assuming a 1-5 star rating
    review_text TEXT NULL,
    rating_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES Products (product_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (user_id) REFERENCES Users (user_id) ON DELETE CASCADE ON UPDATE CASCADE,
    UNIQUE KEY user_product_rating (user_id, product_id) -- Allow only one rating per user per product
);

CREATE TABLE `cart` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL,
    `product_id` INT UNSIGNED NOT NULL,
    `quantity` INT UNSIGNED NOT NULL DEFAULT 1,
    `added_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `unique_user_product` (`user_id`, `product_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE favorites (
    favorite_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products (product_id) ON DELETE CASCADE
);
-- Re-enable foreign key checks
SET FOREIGN_KEY_CHECKS = 1;