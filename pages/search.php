<?php
$conn = new mysqli("localhost", "root", "", "techgo");
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = $conn->real_escape_string(trim($_GET['search']));

    $sql = "SELECT product_id FROM products 
            WHERE name LIKE '%$search%' 
              AND is_active = 1 
            LIMIT 1";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_id = $row['product_id'];

        // طباعة جافاسكريبت لتحويل المستخدم باستخدام المتغير الصحيح
        echo "<script>
                window.location.href = 'product page.php?product_id={$product_id}';
              </script>";
        exit;
    } else {
        echo "<p style='color:red;'>المنتج غير موجود.</p>";
    }
} else {
    echo "<p style='color:red;'>من فضلك أدخل اسم المنتج.</p>";
}
?>
