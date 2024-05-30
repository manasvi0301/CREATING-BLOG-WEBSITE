<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlogWeb</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Welcome to BlogWeb</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Create New Post</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <form action="index.php" method="GET">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Search by title..." name="search">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="date" placeholder="Select date" name="date">
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            $sql = "SELECT * FROM posts WHERE 1=1";
            if(isset($_GET['search']) && !empty($_GET['search'])){
                $search = $_GET['search'];
                $sql .= " AND title LIKE '%$search%'";
            }
            if(isset($_GET['date']) && !empty($_GET['date'])){
                $date = $_GET['date'];
                $sql .= " AND DATE(created_at) = '$date'";
            }
            $sql .= " ORDER BY created_at DESC";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow">
                        <?php if ($row['image']) { ?>
                            <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="...">
                        <?php } ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title']; ?></h5>
                            <p class="card-text"><?php echo substr($row['content'], 0, 100); ?></p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>About My Blog</h5>
                    <p>Explore insightful content on sustainable living, emerging technologies, natural wonders, mindfulness, and the future of work.</p>
                </div>
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                <h5>Contact Us</h5>
                    <p>Email: vruttiptl2015@gmail.com</p>
                    <p>Phone: 9537262643</p>
                </div>
            </div>
            <div class="text-center mt-3">
                <span class="text-muted">My Blog &copy; <?php echo date("Y"); ?></span>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $(function () {
            $('#date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        });
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
