<?php
session_start();
require_once '../login/classes.php';
require_once './db.php';

if (!isset($_SESSION['user'])) {
    exit;
}

$user = unserialize($_SESSION['user']);
$user_id = $user->user_id;
$product_id = $_POST['product_id'] ?? null;

if ($product_id) {
    $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
