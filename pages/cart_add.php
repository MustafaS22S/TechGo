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
$quantity   = $_POST['quantity'] ?? 1;  // كمية المنتج، افتراضي 1

if (!$product_id) {
    echo "❌ رقم المنتج غير موجود.";
    exit;
}

// —————— تتبع اسم قاعدة البيانات ——————
$dbName = $conn->query("SELECT DATABASE()")->fetch_row()[0];
echo "🔍 Connected to DB: {$dbName} <br>";

// —————— استعلام لإضافة أو تحديث الكمية في عربة التسوق ——————

/* هنا نفترض عندك جدول اسمه cart يحتوي الأعمدة: user_id, product_id, quantity */

// أولاً، حاول تحديث الكمية إذا المنتج موجود بالفعل
$queryUpdate = "UPDATE cart SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?";
$stmtUpdate  = $conn->prepare($queryUpdate);
if (!$stmtUpdate) {
    die("❌ فشل في تحضير استعلام التحديث: " . $conn->error);
}
$stmtUpdate->bind_param("iii", $quantity, $user_id, $product_id);
$stmtUpdate->execute();

if ($stmtUpdate->affected_rows == 0) {
    // المنتج غير موجود بالعربة، نضيفه جديد
    $queryInsert = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
    $stmtInsert  = $conn->prepare($queryInsert);
    if (!$stmtInsert) {
        die("❌ فشل في تحضير استعلام الإضافة: " . $conn->error);
    }
    $stmtInsert->bind_param("iii", $user_id, $product_id, $quantity);
    if ($stmtInsert->execute()) {
        echo "✅ تمت الإضافة إلى عربة التسوق!";
    } else {
        echo "❌ خطأ في التنفيذ: " . $stmtInsert->error;
    }
} else {
    echo "✅ تم تحديث كمية المنتج في عربة التسوق!";
}

$stmtUpdate->close();
if (isset($stmtInsert)) {
    $stmtInsert->close();
}
?>
