<?php
// Start session to access user data
session_start();

// Check if user is logged in, if not, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Retrieve user data from session
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>Welcome to your Dashboard, <?php echo $email; ?>!</h1>
    <p>This is where you can manage your profile and access various features.</p>
    <!-- Add more content or features specific to the dashboard -->
</body>

</html>
