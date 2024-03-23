<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$database = "purrfection_cafe";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['signup-email']) && !empty($_POST['signup-password'])) {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['signup-email'];
        $password = $_POST['signup-password'];

        // Hash the password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind the insert statement
        $stmt = $conn->prepare("INSERT INTO profile (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fname, $lname, $email, $password_hash);

        if ($stmt->execute()) {
            // Start the session to store user information
            session_start();
            $_SESSION['user_email'] = $email;

            // Redirect user to products and services section after successful sign-up
            header("Location: yourpage.php#products"); // Replace 'yourpage.php' with the actual filename of your page
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "All fields are required";
    }
}

$conn->close();
?>
