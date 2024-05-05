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
