<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "purrfection_cafe";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PURRFECTION CAFE - Products</title>
    <link rel="stylesheet" href="cart.css">
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

<section id="products">
    <div class="container">
        <h2>Our Meow-nu</h2>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-4'>";
                    echo "<div class='product-item'>";
                    echo "<h3>" . $row["product_name"] . "</h3>";
                    echo "<img src='" . $row["image_path"] . "' alt='Product Image'>";
                    echo "<p>" . $row["description"] . "</p>";
                    echo "<span class='price'>PHP " . $row["price"] . "</span>";
                    echo "<form action='addToCart.php' method='POST'>";
                    echo "<input type='hidden' name='product_name' value='" . $row["product_name"] . "'>";
                    echo "<input type='hidden' name='price' value='" . $row["price"] . "'>";
                    echo "<input type='number' name='quantity' value='1' min='1' max='10'>";
                    echo "<button type='submit' class='add-to-cart-button'>Add to Cart</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
</section>

<footer>
    <p>&copy; 2024 Purrfection Cafe. All rights reserved.</p>
</footer>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
