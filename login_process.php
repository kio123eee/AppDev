<?php
session_start();
include 'db_config.php'; // Include the database configuration file

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute a SELECT query to fetch user data
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Login successful, set session variables and redirect
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: dashboard.php'); // Redirect to dashboard or any other page
        exit();
    } else {
        // Invalid username or password
        header('Location: login.php?error=invalid'); // Redirect with error message
        exit();
    }
} else {
    // Handle case where username or password is not set
    header('Location: login.php'); // Redirect back to the login page
    exit();
}
?>
