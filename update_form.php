<?php
include 'db_config.php';

// Check if ID parameter is passed via GET request
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the item details from the database based on the ID
    $sql = "SELECT * FROM lost_items WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $student_name = $row['student_name'];
        $student_number = $row['student_number'];
        $contact_number = $row['contact_number'];
        $item_description = $row['item_description'];
    } else {
        echo "Item not found";
        exit;
    }
} else {
    echo "Invalid request";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>

    <!-- Form for updating item -->
    <form method="POST" action="update_item.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" name="student_name" value="<?php echo $student_name; ?>" required><br>
        <input type="text" name="student_number" value="<?php echo $student_number; ?>" required><br>
        <input type="text" name="contact_number" value="<?php echo $contact_number; ?>" required><br>
        <textarea name="item_description" required><?php echo $item_description; ?></textarea><br>
        <input type="submit" value="Update Item">
    </form>
</body>
</html>
