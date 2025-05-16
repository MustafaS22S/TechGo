<?php
$conn = new mysqli("localhost", "root", "", "techgo");
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

$sql = "SELECT * FROM products 
        WHERE (name LIKE '%$search%' 
            OR category LIKE '%$search%' 
            OR description LIKE '%$search%')
        AND is_active = 1";

$result = $conn->query($sql);

if ($result->num_rows > 0):
    while ($row = $result->fetch_assoc()):
?>
<div class="product">
  <img src="<?= htmlspecialchars($row['image_url_thumbnail'] ?? 'default.png') ?>" alt="<?= htmlspecialchars($row['name']) ?>">
  <div>
    <h2><?= htmlspecialchars($row['name']) ?></h2>
    <p>السعر:
      <?php if ($row['discounted_price']): ?>
        <del><?= $row['price'] ?> ج</del> 
        <strong><?= $row['discounted_price'] ?> ج</strong>
      <?php else: ?>
        <strong><?= $row['price'] ?> ج</strong>
      <?php endif; ?>
    </p>
    <p>التقييم: <?= $row['average_rating'] ?> ⭐ (<?= $row['rating_count'] ?> تقييم)</p>
    <p>الوصف: <?= mb_substr($row['description'], 0, 100) ?>...</p>
  </div>
</div>
<?php
    endwhile;
else:
    echo "<p>لا توجد نتائج تطابق بحثك.</p>";
endif;

$conn->close();
?>
