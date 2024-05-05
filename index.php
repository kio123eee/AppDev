<?php
session_start();
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome to the Lost and Found System</h1>
    <p>This is the main page of your system. You can add content here.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
