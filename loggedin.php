<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "purrfection_cafe";

// Function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Database connection
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Login form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login-submit'])) {
    $email = sanitizeInput($_POST['login-email']);
    $password = sanitizeInput($_POST['login-password']);

    $check_email_query = "SELECT * FROM profile WHERE email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0) {
        $row = mysqli_fetch_assoc($check_email_result);
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            // Login successful, redirect to products and services section
            header("Location: #services");
            exit;
        } else {
            $login_error = "Error: Incorrect password.";
        }
    } else {
        $login_error = "Error: Email not found.";
    }
}

// Registration form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup-submit'])) {
    $fname = sanitizeInput($_POST['fname']);
    $lname = sanitizeInput($_POST['lname']);
    $email = sanitizeInput($_POST['signup-email']);
    $password = sanitizeInput($_POST['signup-password']);

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO profile (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fname, $lname, $email, $password_hash);

    if ($stmt->execute()) {
        // Registration successful, redirect to login section
        header("Location: #login");
        exit;
    } else {
        $register_error = "Error: " . $stmt->error;
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PURRFECTION CAFE</title>
    
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
                            <a class="nav-link" href="#top">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">PRODUCTS & SERVICES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about-us">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#cart">CART</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#login">LOGIN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#signup">REGISTER</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#help">SUPPORT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>    
    </section>

    <section id="contact">
        <div class="row">
            <div class="col-md-3">
                <ul>
                    <li><a href="https://twitter.com/Alilyfad" target="_blank" id = "twitter"></id><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.facebook.com/Alilyfad/" target="_blank" id = "facebook"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/alilyfad/" target="_blank" id = "instagram"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
                    
            <div class="col-md-6">
                <section id="services" class="hidden">
                    <h2>OUR MEOW-NU</h2>
                    <div class="product-item">
                        <img src="images/menu.png" alt="MENU">
                    </div>
                </section>

                <section id="products" class="hidden">
                    <h2>BEVERAGES</h2>
                    <div class="product-item">
                        <h3>Meowtcha Tea</h3>
                        <img src="images/meowtcha.jpg" alt="Product 1 Image">
                        <p>Indulge in a creamy concoction blending the earthy allure of matcha with a hint of sweetness, whisking you away on a feline-inspired journey with every velvety sip.</p>
                        <span class="price">PHP 200</span>
                    <form action="addToCart.php" method="POST">
        <input type="hidden" name="product_name" value="Meowtcha Tea">
        <input type="hidden" name="price" value="200">
        <input type="number" name="quantity" value="1" min="1" max="10">
        <button type="submit" class="add-to-cart-button">Add to Cart</button>
    </form>
</div>

                <div class="product-item">
                <h3>Pawspresso</h3>
                    <img src="images/pawspresso.jpg" alt="Product 2 Image">
                    <p>Treat yourself to a cup of Pawspresso, a paw-sitively delightful brew crafted with precision and passion. This aromatic espresso blend boasts bold flavors and a smooth finish, sure to whisk you away on a journey of caffeinated delight. Served with a dash of frothy milk, each sip is a moment of pure indulgence.</p>
                    <span class="price">PHP 175</span>
                <form action="addToCart.php" method="POST">
        <input type="hidden" name="product_name" value="Pawspresso">
        <input type="hidden" name="price" value="175">
        <input type="number" name="quantity" value="1" min="1" max="10">
        <button type="submit" class="add-to-cart-button">Add to Cart</button>
    </form>
</div>

<div class="product-item">
    <h3>Catnip Infusion Tea</h3>
    <img src="images/CIT.jpg" alt="Product 3 Image">
    <p>Unwind with a cup of Catnip Infusion Tea, a soothing blend designed to whisk you away to a state of ultimate relaxation. Infused with the essence of catnip, this herbal tea offers a gentle, calming sensation, perfect for those moments when you need to unwind and recharge. Sip slowly and let the stresses of the day melt away as you embrace the tranquility of this feline-inspired infusion.</p>
    <span class="price">PHP 150</span>
    <form action="addToCart.php" method="POST">
        <input type="hidden" name="product_name" value="Catnip Infusion Tea">
        <input type="hidden" name="price" value="150">
        <input type="number" name="quantity" value="1" min="1" max="10">
        <button type="submit" class="add-to-cart-button">Add to Cart</button>
    </form>
</div>

<div class="product-item">
    <h3>Purrfection Pastries</h3>
    <img src="images/pastry.jpg" alt="Product 4 Image">
    <p>Indulge in the whimsical charm of Purrfection Pastries, artisanal treats meticulously crafted to satisfy your sweet cravings. Each pastry is a delightful fusion of flaky layers, rich fillings, and a hint of whimsy, promising a moment of sheer delight with every bite.</p>
    <span class="price">PHP 100</span>
    <form action="addToCart.php" method="POST">
        <input type="hidden" name="product_name" value="Purrfection Pastries">
        <input type="hidden" name="price" value="100">
        <input type="number" name="quantity" value="1" min="1" max="10">
        <button type="submit" class="add-to-cart-button">Add to Cart</button>
    </form>
</div>

<div class="product-item">
    <h3>Feline Frittatas</h3>
    <img src="images/frittata.jpg" alt="Product 5 Image">
    <p>Embark on a culinary adventure with Feline Frittatas, savory delights inspired by the flavors of the Mediterranean. These miniature frittatas boast a harmonious blend of herbs, cheeses, and wholesome ingredients, offering a tantalizing taste experience that's perfect for any occasion.</p>
    <span class="price">PHP 200</span>
    <form action="addToCart.php" method="POST">
        <input type="hidden" name="product_name" value="Feline Frittatas">
        <input type="hidden" name="price" value="200">
        <input type="number" name="quantity" value="1" min="1" max="10">
        <button type="submit" class="add-to-cart-button">Add to Cart</button>
    </form>
</div>

<div class="product-item">
    <h3>Kitty Krunch Mix</h3>
    <img src="images/snacks.jpg" alt="Product 6 Image">
    <p>Savor the satisfying crunch of Kitty Krunch Mix, a delightful assortment of snacks designed to please every palate. From zesty to savory, this mix features an array of flavors and textures that will tantalize your taste buds and leave you craving more.</p>
    <span class="price">PHP 150</span>
    <form action="addToCart.php" method="POST">
        <input type="hidden" name="product_name" value="Kitty Krunch Mix">
        <input type="hidden" name="price" value="150">
        <input type="number" name="quantity" value="1" min="1" max="10">
        <button type="submit" class="add-to-cart-button">Add to Cart</button>
    </form>
</div>

        <div class="product-item">
            <h3>Tuna Tartare Treats</h3>
            <img src="images/tuna.jpg" alt="Product 7 Image">
            <p>Elevate your snacking experience with Tuna Tartare Treats, gourmet bites that redefine indulgence. Made from the finest cuts of sushi-grade tuna, each treat is expertly seasoned and paired with complementary ingredients, delivering a burst of fresh flavors and exquisite taste in every bite.</p>
            <span class="price">PHP 250</span>
            <form action="addToCart.php" method="POST">
            <input type="hidden" name="product_name" value="Tuna Tartare Treats">
            <input type="hidden" name="price" value="250">
            <input type="number"name="quantity" value="1" min="1" max="10">
            <button type="submit" class="add-to-cart-button">Add to Cart</button>
            </form>
        </div>

</section>
            </div>

            <div class="col-md-3">
                <form action="register.php" method="post" id="register">
                    <link rel="stylesheet" href="#login">
                    <h3>Want to be a member?</h3>
                    <button type="submit" class="register-button"><a href= "#signup">Register</a></button>
                </form>
            </div>
            </div>
    </section>

    <div class="col-md-12">
    <section id="about-us">
        <div class="container">
            <div class="row">
                    <h2>About Us</h2>
                    <p>Welcome to Purrfection Cafe, where the love for cats meets the joy of delightful treats. Our mission is to create a haven for cat enthusiasts, providing a cozy and welcoming space where you can indulge in delicious cat-themed goodies and spend quality time with our furry friends.
    
                        At Purrfection Cafe, we believe in the power of the purr, and our menu reflects that passion. Whether you're sipping on a Meowcha Mocha, munching on a Feline Frittata, or browsing our Kitty Comfort Zone, every moment at Purrfection Cafe is a celebration of the feline spirit.
                        
                        We're not just a cafe; we're a destination for cat lovers to connect, relax, and enjoy the company of our resident feline friends. Our Cat Therapy Sessions provide a unique opportunity for those considering adoption to spend quality time with cats in a comfortable and stress-free environment.
                        
                        Come join us at Purrfection Cafe, where every sip, bite, and moment spent with our cats is a step closer to achieving purrfection!
                        </p>
                        <img src="images/catt.png" alt="MENU">
                </div>
            </div>
        </div>
    </div>
    </section>

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

    <script src="validate.js"></script>
</body>
</html>
