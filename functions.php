<?php
include 'db.php';

// Function to add a new student
function addStudent($fullname, $studentnumber, $cellphone, $date) {
    global $conn;
    $sql = "INSERT INTO students (fullname, studentnumber, cellphone, created_at) VALUES ('$fullname', '$studentnumber', '$cellphone', '$date')";
    if ($conn->query($sql) === TRUE) {
        echo "New student added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to display students list
function displayStudents() {
    global $conn;
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["fullname"] . " - " . $row["studentnumber"] . " - " . $row["cellphone"] . " - " . $row["created_at"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No students found.";
    }
}

// Check if form is submitted for adding a student
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] == 'add') {
    $fullname = $_POST['fullname'];
    $studentnumber = $_POST['studentnumber'];
    $cellphone = $_POST['cellphone'];
    $date = $_POST['date'];
    addStudent($fullname, $studentnumber, $cellphone, $date);
}

// Display students list
displayStudents();

$conn->close();
?>
