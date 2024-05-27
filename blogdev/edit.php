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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Edit Post</h1>
            <nav>
                <a href="index.php">Home</a>
            </nav>
        </div>
    </header>
    <main class="container">
        <?php
        include 'db.php';
        $id = $_GET['id'];
        $sql = "SELECT * FROM posts WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            echo "<form action='update.php' method='POST'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<label for='title'>Title:</label>";
            echo "<input type='text' id='title' name='title' value='" . $row['title'] . "' required>";
            echo "<label for='content'>Content:</label>";
            echo "<textarea id='content' name='content' rows='10' required>" . $row['content'] . "</textarea>";
            echo "<button type='submit' class='btn'>Update</button>";
            echo "</form>";
        } else {
            echo "<p>Post not found.</p>";
        }

        $conn->close();
        ?>
    </main>
</body>
</html>
