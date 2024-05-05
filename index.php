<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>
</head>
<body>
    <h1>Student Information System</h1>
    
    <!-- Form for adding new student -->
    <h2>Add Student</h2>
    <form action="functions.php?action=add" method="POST">
        <input type="text" name="fullname" placeholder="Full Name" required>
        <input type="text" name="studentnumber" placeholder="Student Number" required>
        <input type="text" name="cellphone" placeholder="Cellphone Number" required>
        <button type="submit">Add Student</button>
    </form>

    <!-- Form for editing student -->
    <h2>Edit Student</h2>
    <form action="functions.php?action=edit" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
        <input type="text" name="fullname" placeholder="Full Name" required>
        <input type="text" name="studentnumber" placeholder="Student Number" required>
        <input type="text" name="cellphone" placeholder="Cellphone Number" required>
        <button type="submit">Edit Student</button>
    </form>

    <!-- List of students -->
    <h2>Students List</h2>
    <?php include 'functions.php'; ?>
</body>
</html>
