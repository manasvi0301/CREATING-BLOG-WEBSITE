<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Post</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Read Post</h1>
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
            echo "<div class='post'>";
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<p>" . $row['content'] . "</p>";
            echo "</div>";
        } else {
            echo "<p>Post not found.</p>";
        }

        $conn->close();
        ?>
    </main>
</body>
</html>
