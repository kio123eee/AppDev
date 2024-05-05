<?php
include 'db_config.php'; // Adjust the path as needed
session_start();

$message = '';

// Hardcoded username and password for testing
$hardcoded_username = 'admin';
$hardcoded_password = 'admin'; // Assuming this is the plaintext password

if(isset($_POST['submit'])){
   $username = $_POST['username'];
   $password = $_POST['password'];

   if($username === $hardcoded_username && $password === $hardcoded_password){
      // Successful login
      $_SESSION['username'] = $username;
      header('location: home.php'); // Redirect to home.php after successful login
      exit;
   }else{
      $message = 'Incorrect username or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login - Lost and Found</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         background-color: #f0f0f0;
         padding: 20px;
      }
      .form-container {
         max-width: 400px;
         margin: 50px auto;
         background-color: #fff;
         border-radius: 8px;
         padding: 20px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      .form-container h3 {
         text-align: center;
         margin-bottom: 20px;
      }
      .box {
         width: 100%;
         padding: 10px;
         margin-bottom: 15px;
         border: 1px solid #ccc;
         border-radius: 5px;
         box-sizing: border-box;
      }
      .btn {
         width: 100%;
         padding: 10px;
         background-color: #007bff;
         color: #fff;
         border: none;
         border-radius: 5px;
         cursor: pointer;
      }
      .btn:hover {
         background-color: #0056b3;
      }
      .error {
         color: red;
         margin-bottom: 10px;
         text-align: center;
      }
   </style>
</head>
<body>
   
<section class="form-container">
   <form action="home.php" method="post">
      <h3>Login to Lost and Found</h3>
      <?php if(!empty($message)) echo '<p class="error">' . $message . '</p>'; ?>
      <input type="text" name="username" required placeholder="Enter your username" class="box" maxlength="50">
      <input type="password" name="password" required placeholder="Enter your password" class="box" maxlength="50">
      <input type="submit" value="Login" name="submit" class="btn">
   </form>
</section>

</body>
</html>
