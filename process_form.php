<?php
// Include the database connection file
include 'db_config.php';

// Check if the form was submitted
if(isset($_POST['full_name']) && isset($_POST['student_number']) && isset($_POST['contact_number']) && isset($_POST['date'])){
   // Sanitize and validate input data
   $full_name = trim(filter_var($_POST['full_name'], FILTER_SANITIZE_STRING));
   $student_number = trim(filter_var($_POST['student_number'], FILTER_SANITIZE_NUMBER_INT));
   $contact_number = trim(filter_var($_POST['contact_number'], FILTER_SANITIZE_NUMBER_INT));
   $date = $_POST['date']; // No need to sanitize date input

   // Prepare and execute the SQL query to insert data into the database
   $insert_query = $conn->prepare("INSERT INTO lost_found_list (full_name, student_number, contact_number, date_added) VALUES (?, ?, ?, ?)");
   $insert_query->execute([$full_name, $student_number, $contact_number, $date]);

   // Redirect back to home.php after successful insertion
   header("location: home.php");
   exit; // Stop further script execution
}else{
   // Redirect back to home.php if form data is incomplete
   header("location: home.php");
   exit; // Stop further script execution
}
?>
