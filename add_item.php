<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $student_number = $_POST['student_number'];
    $contact_number = $_POST['contact_number'];
    $item_description = $_POST['item_description'];

    $sql = "INSERT INTO lost_items (student_name, student_number, contact_number, item_description)
            VALUES ('$student_name', '$student_number', '$contact_number', '$item_description')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
