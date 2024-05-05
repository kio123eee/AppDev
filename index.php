<?php
session_start();

include 'db_config.php';

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
   <!-- Your CSS styles and other head content -->
</head>
<body>
   
<section class="form-container">
   <form action="" method="post">
      <h3>Login to Lost and Found</h3>
      <?php if(!empty($message)) echo '<p class="error">' . $message . '</p>'; ?>
      <input type="text" name="username" required placeholder="Enter your username" class="box" maxlength="50">
      <input type="password" name="password" required placeholder="Enter your password" class="box" maxlength="50">
      <input type="submit" value="Login" name="submit" class="btn">
   </form>
</section>

</body>
</html>
