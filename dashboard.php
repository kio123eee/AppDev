<?php
session_start(); // Start session for accessing session variables

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirect to login page
    exit; // Prevent further execution
}

// Access session variables
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include CSS stylesheets, JavaScript files, etc. -->
</head>
<body>
    <!-- Dashboard content goes here -->
    <h1>Welcome, <?php echo $username; ?>!</h1>
    <!-- Admin functionalities, data tables, forms, etc. -->
</body>
</html>
