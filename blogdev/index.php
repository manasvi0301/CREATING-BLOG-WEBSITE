<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>My Blog</h1>
            <nav>
                <a href="index.php">Home</a>
                <?php if (isset($_SESSION['username'])): ?>
                    <a href="create.php">Create New Post</a>
                    <a href="logout.php">Logout</a>
                <?php else: ?>
                    <a href="login.php">Login</a>
                    <a href="register.php">Register</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <main class="container">
        <div class="posts">
            <?php
            include 'db.php';
            $sql = "SELECT * FROM posts ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='post'>";
                    echo "<h2>" . $row['title'] . "</h2>";
                    echo "<p>" . substr($row['content'], 0, 100) . "...</p>";
                    echo "<div class='post-buttons'>";
                    echo "<a href='read.php?id=" . $row['id'] . "' class='btn'>Read More</a>";
                    if (isset($_SESSION['username'])) {
                        echo "<a href='edit.php?id=" . $row['id'] . "' class='btn'>Edit</a>";
                        echo "<a href='delete.php?id=" . $row['id'] . "' class='btn delete' onclick='return confirm(\"Are you sure?\")'>Delete</a>";
                    }
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No posts available.</p>";
            }

            $conn->close();
            ?>
        </div>
    </main>
</body>
</html>
