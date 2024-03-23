<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - PURRFECTION CAFE</title>
    
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    
    <link rel="icon" href="images/logo.png" type="ICON">
</head>
<body>

    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="images/logo.png" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav m-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="loggedin.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="loggedin.php">PRODUCTS & SERVICES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="loggedin.php">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">CART</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="loggedin.php">SUPPORT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">PROFILE</a>
                        </li>
                        <form class="d-flex">
                            <input class="form-control" id="searchbar" type="text" placeholder="Search..">
                        </form>
                    </ul>
                </div>
            </div>
        </nav>    
    </section>

    <section id="contact">
        <div class="row">
            <div class="col-md-3">
                <ul>
                    <li><a href="https://twitter.com/Alilyfad" target="_blank" id="twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.facebook.com/Alilyfad/" target="_blank" id="facebook"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/alilyfad/" target="_blank" id="instagram"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="col-md-6">
            <section id="profile">
        <div class="container">
            <h2>User Profile</h2>
            <?php
            session_start();
            if(isset($_SESSION['user_email'])) {
                echo "<p>Welcome, ".$_SESSION['user_email']."</p>";
                echo "<a href='logout.php'>Logout</a>";
            } else {
                echo "<p>Please login to view your profile.</p>";
                echo "<a href='login.php'>Login</a>";
            }
            ?>
        </div>

        <div class="col-md-12">
        <section id="help">
            <div class="container">
                <div class="row">
                    <h2>Contact Support</h2>
                    <p>If you have any questions or concerns, please fill out the form below:</p>
                    <form action="contact.php" method="POST" id="help-form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="concern" class="form-label">Concern</label>
                            <textarea class="form-control" id="concern" name="concern" rows="4" placeholder="Enter your concern" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </section>

<footer>
        <p>&copy; 2024 Purrfection Cafe. All rights reserved.</p>
    </footer>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
