<?php include 'db_config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost Items</title>
</head>
<body>
    <h1>Lost Items</h1>

    <!-- Form to add new item -->
    <form method="POST" action="add_item.php">
        <input type="text" name="student_name" placeholder="Student Name" required><br>
        <input type="text" name="student_number" placeholder="Student Number" required><br>
        <input type="text" name="contact_number" placeholder="Contact Number" required><br>
        <textarea name="item_description" placeholder="Item Description" required></textarea><br>
        <input type="submit" value="Add Item">
    </form>

    <!-- Display existing items -->
    <?php
    $sql = "SELECT * FROM lost_items";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Existing Items</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<p>Student Name: " . $row['student_name'] . "</p>";
            echo "<p>Student Number: " . $row['student_number'] . "</p>";
            echo "<p>Contact Number: " . $row['contact_number'] . "</p>";
            echo "<p>Item Description: " . $row['item_description'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No records found";
    }
    ?>

</body>
</html>
