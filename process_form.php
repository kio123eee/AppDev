<?php
// Include the database connection file
include 'db_config.php'; // Adjust the path as per your file structure

// Check if the form was submitted
if(isset($_POST['full_name'], $_POST['student_number'], $_POST['contact_number'], $_POST['date'])){
   // Sanitize and validate input data
   $full_name = filter_var($_POST['full_name'], FILTER_SANITIZE_STRING);
   $student_number = filter_var($_POST['student_number'], FILTER_SANITIZE_NUMBER_INT);
   $contact_number = filter_var($_POST['contact_number'], FILTER_SANITIZE_NUMBER_INT);
   $date = $_POST['date']; // No need to sanitize date input

   // Prepare and execute the SQL query to insert data into the database
   $insert_query = $conn->prepare("INSERT INTO lost_found_list (full_name, student_number, contact_number, date_added) VALUES (?, ?, ?, ?)");
   $insert_query->execute([$full_name, $student_number, $contact_number, $date]);

   // Use JavaScript to redirect to home.php after successful insertion
   echo '<script>window.location.href = "home.php";</script>';
   exit; // Stop further script execution
}else{
   // Use JavaScript to redirect to home.php if form data is incomplete
   echo '<script>window.location.href = "home.php";</script>';
   exit; // Stop further script execution
}
?>
