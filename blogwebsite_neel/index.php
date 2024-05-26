<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="style.css">
   <title>Responsive Blog Website | Home</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>
<body>
   <header>
      <div class="container container-nav">
         <div class="site-title">
            <h1>Living The Social Life</h1>
            <p class="subtitle">A blog exploring minimalism in life</p>
         </div>
         <nav>
            <ul>
               <li><a href="#" class="current-page">Home</a></li>
               <li><a href="about.html">About Me</a></li>
               <li><a href="recent.html">Recent Posts</a></li>
            </ul>
         </nav>
      </div>
   </header>

   <div class="container container-flex">
      <main role="main">
         <!-- Featured Article -->
         <article class="article-featured">
            <h2 class="article-title">Finding Simplicity in Life</h2>
            <img src="img/life.jpg" alt="Greenery pic" class="article-image">
            <p class="article-info">July 23, 2019 | 3 comments</p>
            <p class="article-body">Life can get complicated really quickly, but it doesn't have to be! There are many ways to simplify your life, a few of which we've explored in the past. This week we're taking a bit of a different approach in how you can find simplicity in the life you already have.</p>
            <a href="#" class="article-read-more">CONTINUE READING</a>
         </article>

         <!-- Dynamic Blog Posts from Database -->
         <?php
         $sql = "SELECT posts.id, posts.title, posts.content, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC";
         $result = $conn->query($sql);

         if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               echo "<article>";
               echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
               echo "<p>by " . htmlspecialchars($row['username']) . "</p>";
               echo "<div>" . htmlspecialchars($row['content']) . "</div>";
               echo "</article>";
            }
         } else {
            echo "<p>No posts available.</p>";
         }
         ?>
      </main>

      <aside class="sidebar">
         <!-- About Me Widget -->
         <div class="sidebar-widget">
            <h2 class="widget-title">ABOUT ME</h2>
            <img src="img/about-me.jpg" alt="About me" class="widget-image">
            <p class="widget-body">I find life better, and I'm happier, when things are nice and simple.</p>
         </div>

         <!-- Recent Posts Widget -->
         <div class="sidebar-widget">
            <h2 class="widget-title">RECENT POSTS</h2>
            <div class="widget-recent-post">
               <h3 class="widget-recent-post-title">Keeping Cooking Simple</h3>
               <img src="img/food.jpg" alt="Food" class="widget-image">
            </div>
            <div class="widget-recent-post">
               <h3 class="widget-recent-post-title">Simplicity and Work</h3>
               <img src="img/work.jpg" alt="Work" class="widget-image">
            </div>
            <div class="widget-recent-post">
               <h3 class="widget-recent-post-title">Simple Decoration</h3>
               <img src="img/deco.jpg" alt="Decoration" class="widget-image">
            </div>
         </div>
      </aside>
   </div>

   <footer>
      <p><strong>Living the simple life</strong></p>
      <p>&copy; 2022</p>
      <p>Made with <i class="fas fa-heart"></i> By Kru'Z&trade;</p>
   </footer>
</body>
</html>

<?php include 'includes/footer.php'; ?>
