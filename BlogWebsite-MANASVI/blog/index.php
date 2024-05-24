<?php
include 'db.php';

$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
		<div class="logo">
			<img src="images/logo.png" alt="Blog Logo">
		</div>
        <h1>Blogger's Area !!!</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="create.php">Create Post</a>
        </nav>
    </header>
    <div class="container">
        <?php while($row = $result->fetch_assoc()): ?>
            <div>
                <h2><a href="read.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h2>
                <p><?php echo substr($row['content'], 0, 200); ?>...</p>
                <p><a href="read.php?id=<?php echo $row['id']; ?>">Read more</a></p>
            </div>
        <?php endwhile; ?>
    </div>
	<footer>
		<div class="bg">
			<img src="images/bg.jpg" alt="Background Image">
			<img src="images/bg2.jpg" alt="BackGround Image">
			<img src="images/bg1.jpg" alt="Background Image">
			<img src="images/bg3.png" alt="BackGround Image">
		</div>
	</footer>
</body>
</html>
