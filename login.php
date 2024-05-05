<?php
session_start();
// Include your database connection file (e.g., db_config.php)
include 'db_config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $entered_password = $_POST['password'];

    // Query the database to get the hashed password based on the entered username
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($entered_password, $user['password'])) {
        // Passwords match, set session variables and redirect to dashboard
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        // Passwords do not match, display error message or redirect back to login page
        $error_message = "Invalid username or password.";
    }
}
?>
