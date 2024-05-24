<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: read.php?id=$id");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $sql = "SELECT * FROM posts WHERE id=$id";
    $result = $conn->query($sql);
    $post = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Edit Post</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="create.php">Create Post</a>
        </nav>
    </header>
    <div class="container">
        <form action="update.php?id=<?php echo $id; ?>" method="post">
            <input type="text" name="title" value="<?php echo $post['title']; ?>" required>
            <textarea name="content" required><?php echo $post['content']; ?></textarea>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
