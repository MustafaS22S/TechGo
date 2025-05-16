
<?php
$conn = new mysqli("localhost", "root", "", "techgo");
if ($conn->connect_error) {
    die(json_encode(['found' => false]));
}

$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

$sql = "SELECT id FROM products 
        WHERE name LIKE '%$search%' 
        AND is_active = 1 
        LIMIT 1";

$result = $conn->query($sql);

if ($result && $row = $result->fetch_assoc()) {
    echo json_encode(['found' => true, 'id' => $row['id']]);
} else {
    echo json_encode(['found' => false]);
}

$conn->close();
?>
