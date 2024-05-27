<?php
include 'db.php';

$title = $_POST['title'];
$content = $_POST['content'];

$sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
