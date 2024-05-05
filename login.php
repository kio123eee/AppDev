<?php
session_start(); // Start session for storing user information

include 'db_config.php'; // Include your database connection file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check if the credentials are valid
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Authentication successful, set session variables
        $_SESSION['username'] = $username;

        // Redirect to the dashboard page
        header("Location: dashboard.php");
        exit;
    } else {
        // Invalid credentials, display error or redirect back to login page
        $error_message = "Invalid username or password.";
        // You can display the error message on the login page or handle it as needed
    }
}
?>
