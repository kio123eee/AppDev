<?php
include 'db.php';

// Function to add a new student
function addStudent($fullname, $studentnumber, $cellphone) {
    global $conn;
    $sql = "INSERT INTO students (fullname, studentnumber, cellphone) VALUES ('$fullname', '$studentnumber', '$cellphone')";
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
            echo "<li>" . $row["fullname"] . " - " . $row["studentnumber"] . " - " . $row["cellphone"] . " - " . $row["created_at"] . " - <a href='functions.php?action=edit&id=" . $row["id"] . "'>Edit</a> | <a href='functions.php?action=delete&id=" . $row["id"] . "'>Delete</a></li>";
        }
        echo "</ul>";
    } else {
        echo "No students found.";
    }
}

// Function to edit a student
function editStudent($id, $fullname, $studentnumber, $cellphone) {
    global $conn;
    $sql = "UPDATE students SET fullname='$fullname', studentnumber='$studentnumber', cellphone='$cellphone' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Student updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to delete a student
function deleteStudent($id) {
    global $conn;
    $sql = "DELETE FROM students WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Student deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Check if form is submitted for adding or editing a student
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'add') {
            $fullname = $_POST['fullname'];
            $studentnumber = $_POST['studentnumber'];
            $cellphone = $_POST['cellphone'];
            addStudent($fullname, $studentnumber, $cellphone);
        } elseif ($_GET['action'] == 'edit') {
            $id = $_GET['id'];
            $fullname = $_POST['fullname'];
            $studentnumber = $_POST['studentnumber'];
            $cellphone = $_POST['cellphone'];
            editStudent($id, $fullname, $studentnumber, $cellphone);
        }
    }
}

// Check if action is delete and ID is provided
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteStudent($id);
}

// Display students list
displayStudents();

$conn->close();
?>
