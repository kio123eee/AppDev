<?php
include 'db_config.php';

$sql = "SELECT * FROM lost_items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>Student Name:</strong> " . $row['student_name'] . "</p>";
        echo "<p><strong>Student Number:</strong> " . $row['student_number'] . "</p>";
        echo "<p><strong>Contact Number:</strong> " . $row['contact_number'] . "</p>";
        echo "<p><strong>Item Description:</strong> " . $row['item_description'] . "</p>";
        echo "<form method='POST' action='delete_item.php'>";
        echo "<input type='hidden' name='delete_id' value='" . $row['id'] . "'>";
        echo "<input type='submit' value='Delete'>";
        echo "</form>";
        echo "<hr>";
    }
} else {
    echo "No records found";
}
?>
