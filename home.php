<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mapua Makati Lost and Found System</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         background-color: #f0f0f0;
         padding: 20px;
      }
      .form-container {
         max-width: 600px;
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
      .error-msg {
         color: red;
         margin-top: 10px;
         text-align: center;
      }
   </style>
</head>
<body>
   <h1 style="text-align: center;">Mapua Makati Lost and Found System</h1>
   <section class="form-container">
      <h3>Add Student Information to Lost and Found List</h3>
      <?php
      if(isset($_GET['message'])){
         $message = $_GET['message'];
         if(strpos($message, 'successfully') !== false){
            echo '<p class="success-msg">' . $message . '</p>';
         }else{
            echo '<p class="error-msg">' . $message . '</p>';
         }
      }
      ?>
      <form action="process_form.php" method="post">
         <input type="text" name="full_name" required placeholder="Full Name (characters only)" class="box" maxlength="100" pattern="[A-Za-z\s]+" title="Only characters are allowed">
         <input type="text" name="student_number" required placeholder="Student Number (numbers only)" class="box" maxlength="10" pattern="[0-9]+" title="Only numbers are allowed">
         <input type="text" name="contact_number" required placeholder="Contact Number (numbers only)" class="box" maxlength="15" pattern="[0-9]+" title="Only numbers are allowed">
         <input type="date" name="date" required placeholder="Date" class="box">
         <input type="submit" value="Submit" class="btn">
      </form>
   </section>
</body>
</html>
