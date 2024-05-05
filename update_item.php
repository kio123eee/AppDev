<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $student_name = $_POST['student_name'];
    $student_number = $_POST['student_number'];
    $contact_number = $_POST['contact_number'];
    $item_description = $_POST['item_description'];

    $sql = "UPDATE lost_items SET 
            student_name = '$student_name',
            student_number = '$student_number',
            contact_number = '$contact_number',
            item_description = '$item_description'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
