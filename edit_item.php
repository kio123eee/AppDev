<?php
// Include the database connection file
include 'db_config.php';

// Check if the 'id' parameter is provided in the URL
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Fetch the item details from the database based on the provided ID
    $select_query = $conn->prepare("SELECT * FROM lost_found_list WHERE id = ?");
    $select_query->execute([$id]);
    $item = $select_query->fetch(PDO::FETCH_ASSOC);

    // Check if the item exists
    if(!$item){
        // Redirect to lists.php if the item does not exist
        header("Location: lists.php");
        exit; // Stop further script execution
    }

    // If the form is submitted to update the item
    if(isset($_POST['update'])){
        // Sanitize and validate input data
        $full_name = filter_var($_POST['full_name'], FILTER_SANITIZE_STRING);
        $student_number = filter_var($_POST['student_number'], FILTER_SANITIZE_NUMBER_INT);
        $contact_number = filter_var($_POST['contact_number'], FILTER_SANITIZE_NUMBER_INT);
        $date = $_POST['date']; // No need to sanitize date input

        // Update the item in the database
        $update_query = $conn->prepare("UPDATE lost_found_list SET full_name = ?, student_number = ?, contact_number = ?, date_added = ? WHERE id = ?");
        $update_query->execute([$full_name, $student_number, $contact_number, $date, $id]);

        // Redirect to lists.php after successful update
        header("Location: lists.php");
        exit; // Stop further script execution
    }
} else {
    // Redirect to lists.php if 'id' parameter is not provided
    header("Location: lists.php");
    exit; // Stop further script execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit Lost and Found Item</title>
   <!-- Add your CSS stylesheets or CDN links here -->
</head>
<body>
   <h1>Edit Lost and Found Item</h1>
   <form action="" method="post">
      <input type="text" name="full_name" value="<?php echo $item['full_name']; ?>" required placeholder="Full Name (characters only)" class="box" maxlength="100" pattern="[A-Za-z\s]+" title="Only characters are allowed">
      <input type="text" name="student_number" value="<?php echo $item['student_number']; ?>" required placeholder="Student Number (numbers only)" class="box" maxlength="10" pattern="[0-9]+" title="Only numbers are allowed">
      <input type="text" name="contact_number" value="<?php echo $item['contact_number']; ?>" required placeholder="Contact Number (numbers only)" class="box" maxlength="15" pattern="[0-9]+" title="Only numbers are allowed">
      <input type="date" name="date" value="<?php echo $item['date_added']; ?>" required placeholder="Date" class="box">
      <input type="submit" value="Update" name="update" class="btn">
   </form>
</body>
</html>
