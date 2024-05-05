<?php
session_start();
// Include your database connection file (e.g., db_config.php)
include 'db_config.php';

if(isset($_SESSION['id'])){
   $id = $_SESSION['id'];
} else {
   $id = '';
}

if(isset($_POST['submit'])){
   $username = $_POST['username'];
   $username = filter_var($username, FILTER_SANITIZE_STRING);
   $password = $_POST['password'];
   $password = filter_var($password, FILTER_SANITIZE_STRING);

   // Hash the password (if needed) before comparing
   // $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Uncomment if storing hashed passwords in the database

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE username = ? AND passwords = ?");
   $select_user->execute([$username, $password]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $_SESSION['id'] = $row['id'];
      header('location:dashboard.php');
      exit; // Add exit after header redirect to prevent further execution
   } else {
      $message[] = 'Incorrect username or password!';
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        input[type="text"], input[type="password"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mapua Makati Lost and Found System</h1>
        <form method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
