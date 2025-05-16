<?php
session_start();
require_once '../login/classes.php';
require_once './classes.php';
require_once './db.php';

if (!isset($_SESSION['user'])) {
    echo "❌ يرجى تسجيل الدخول أولاً.";
    exit;
}

$user = unserialize($_SESSION['user']);
$user_id    = $user->user_id;
$product_id = $_POST['product_id'] ?? null;

if (!$product_id) {
    echo "❌ رقم المنتج غير موجود.";
    exit;
}

// —————— تتبع اسم قاعدة البيانات ——————
$dbName = $conn->query("SELECT DATABASE()")->fetch_row()[0];
echo "🔍 Connected to DB: {$dbName} <br>";

// —————— تحضير الاستعلام ——————
$query = "INSERT IGNORE INTO favorites (user_id, product_id) VALUES (?, ?)";
$stmt  = $conn->prepare($query);
if (!$stmt) {
    die("❌ فشل في تحضير الاستعلام: " . $conn->error);
}

$stmt->bind_param("ii", $user_id, $product_id);

if ($stmt->execute()) {
    echo "✅ تمت الإضافة إلى المفضلة!";
   
} else {
    echo "❌ خطأ في التنفيذ: " . $stmt->error . "<br>";
}
