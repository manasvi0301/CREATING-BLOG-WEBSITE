<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

echo "<h1>Categories</h1>";
while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
    echo "</div>";
}

include 'includes/footer.php';
?>
