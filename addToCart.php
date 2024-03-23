<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve product details from the form
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Perform any necessary validation on the input data

    // Add the product to the cart session
    $cart_item = array(
        'product_name' => $product_name,
        'price' => $price,
        'quantity' => $quantity
    );

    // Add item to the cart session
    $_SESSION['cart'][] = $cart_item;

    // Redirect back to products page or any other desired page
    header("Location: products.php");
    exit();
} else {
    echo "Error: Form not submitted";
}
?>
