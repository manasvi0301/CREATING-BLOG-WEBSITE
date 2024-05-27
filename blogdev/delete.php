<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Post</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Create New Post</h1>
            <nav>
                <a href="index.php">Home</a>
            </nav>
        </div>
    </header>
    <main class="container">
        <form action="store.php" method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="10" required></textarea>
            
            <button type="submit" class="btn">Submit</button>
        </form>
    </main>
</body>
</html>

<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM posts WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
