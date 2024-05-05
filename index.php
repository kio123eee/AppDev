<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapua Makati Lost and Found Information System</title>
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

    <!-- Redirect link to view students list -->
    <a href="students_list.php">View Students List</a>

    <!-- Include any success/error messages here if needed -->
</body>
</html>
