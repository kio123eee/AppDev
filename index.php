<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Database Connection</title>
</head>
<body>
<?php
// Database connection parameters
   $db_name = 'mysql:host=viaduct.proxy.rlwy.net;port=15223;dbname=railway';
   $user_name = 'root'; // Replace 'your_mysql_username' with your actual MySQL username
   $user_password = 'TSyEAqhggHUXqkiRPjuDYvHEhNeRyDUu'; // Use your MySQL password here
try {
    // Create a PDO connection to MySQL
    $conn = new PDO($db_name, $user_name, $user_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection_status = "Database connection successful!";
} catch (PDOException $e) {
    $connection_status = "Connection failed: " . $e->getMessage();
}
?>
</body>
</html>
