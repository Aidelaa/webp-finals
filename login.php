<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "purrfection_cafe";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitizeInput($_POST['login-email']);
    $password = sanitizeInput($_POST['login-password']);

    $check_email_query = "SELECT * FROM profile WHERE email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0) {
        $row = mysqli_fetch_assoc($check_email_result);
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {

            session_start();
            $_SESSION['email'] = $email;

            header("Location: loggedin.php#products");
            exit();
        } else {
            echo "Error: Incorrect password.";
        }
    } else {
        echo "Error: Email not found.";
    }

    mysqli_close($conn);
}
?>
