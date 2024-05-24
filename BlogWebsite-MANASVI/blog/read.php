<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id=$id";
$result = $conn->query($sql);
$post = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title']; ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1><?php echo $post['title']; ?></h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="create.php">Create Post</a>
            <a href="update.php?id=<?php echo $post['id']; ?>">Edit Post</a>
            <a href="delete.php?id=<?php echo $post['id']; ?>">Delete Post</a>
        </nav>
    </header>
    <div class="container">
        <p><?php echo $post['content']; ?></p>
    </div>
</body>
</html>
