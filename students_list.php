<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master List of Students</title>
</head>
<body>
    <h1>Master List of Students</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Student Number</th>
            <th>Cellphone Number</th>
            <th>Status</th>
        </tr>
        <?php
        include 'functions.php';

        // Fetch and display students from the database
        $students = getAllStudents();
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>{$student['id']}</td>";
            echo "<td>{$student['fullname']}</td>";
            echo "<td>{$student['studentnumber']}</td>";
            echo "<td>{$student['cellphone']}</td>";
            echo "<td>{$student['status']}</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br>
    <a href="index.php">Go Back to Add Students</a>
</body>
</html>
