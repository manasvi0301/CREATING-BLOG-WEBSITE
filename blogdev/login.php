<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Login</h1>
            <nav>
                <a href="index.php">Home</a>
                <a href="register.php">Register</a>
            </nav>
        </div>
    </header>
    <main class="container">
        <form action="login_store.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit" class="btn">Login</button>
        </form>
    </main>
</body>
</html>
