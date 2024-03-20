<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$database = "purrfection_cafe";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Check if there are any products
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Display product information
        echo "<div class='product-item'>";
        echo "<h3>" . $row["product_name"] . "</h3>";
        echo "<img src='" . $row["image_path"] . "' alt='Product Image'>";
        echo "<p>" . $row["description"] . "</p>";
        echo "<span class='price'>PHP " . $row["price"] . "</span>";
        echo "<button class='add-to-cart-button' onclick='addToCart(\"" . $row["product_name"] . "\", \"" . $row["description"] . "\"); return false;'>Add to Cart</button>";
        echo "</div>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
