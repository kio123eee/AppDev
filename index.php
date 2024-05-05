<?php
session_start();

include 'components/connect.php';

$message = '';

if(isset($_POST['submit'])){
   $username = $_POST['username'];
   $username = trim(filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
   $password = sha1($_POST['password']);
   $password = trim(filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS));

   // Debugging output
   echo "Entered Username: $username<br>";
   echo "Entered Password: $password<br>";

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE username = ? AND password = ?");
   $select_user->execute([$username, $password]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   // Debugging output
   echo "SQL Query: SELECT * FROM `users` WHERE username = '$username' AND password = '$password'<br>";
   echo "Rows Found: " . $select_user->rowCount() . "<br>";

   if($row){ // Check if a row is fetched, indicating successful login
      $_SESSION['id'] = $row['id']; // Assuming 'id' is the primary key of the 'users' table
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
