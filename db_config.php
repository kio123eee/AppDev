<?php
// Database connection parameters
   $db_name = 'mysql:host=roundhouse.proxy.rlwy.net;port=42743;dbname=railway';
   $user_name = 'root'; // Replace 'your_mysql_username' with your actual MySQL username
   $user_password = 'MkGgJpvCUwuZuNPOvonZSmHDlBUKgcMS'; // Use your MySQL password here
try {
    // Create a PDO connection to MySQL
    $conn = new PDO($db_name, $user_name, $user_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection_status = "Database connection successful!";
} catch (PDOException $e) {
    $connection_status = "Connection failed: " . $e->getMessage();
}
?>
