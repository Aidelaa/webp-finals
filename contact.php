<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$database = "purrfection_cafe";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO contact_info (name, email, concern) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $concern);


$name = $_POST['name'];
$email = $_POST['email'];
$concern = $_POST['concern'];
$stmt->execute();

echo "Form submitted successfully";

$stmt->close();
$conn->close();
?>
