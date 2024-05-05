<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'db_config.php';

$message = ''; // Initialize message variable

if (isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], 513); // Equivalent to FILTER_SANITIZE_STRING
    $password = filter_var($_POST['password'], 513); // Equivalent to FILTER_SANITIZE_STRING

    $select_user = $conn->prepare("SELECT * FROM `users` WHERE username = ? AND password = ?");
    $select_user->execute([$username, $password]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if ($select_user->rowCount() > 0) {
        $_SESSION['id'] = $row['id'];
        header('location: dashboard.php');
        exit; // Add exit after header redirect to prevent further execution
    } else {
        $message = 'Incorrect username or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Found System Login</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <div class="container">
        <h1>Mapua Makati Lost and Found System</h1>
        <?php
        if ($message) {
            echo '<p class="error">' . $message . '</p>';
        }
        ?>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>
</html>
