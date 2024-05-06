<?php
// Include the database connection file
include 'db_config.php';

// Fetch the list of lost and found items from the database
$select_query = $conn->query("SELECT * FROM lost_found_list");
$items = $select_query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Lost and Found Lists</title>
   <!-- Add your CSS stylesheets or CDN links here -->
</head>
<body>
   <!-- Your HTML content for the lists page -->
   <h1>Lost and Found Lists</h1>
   <a href="home.php" style="margin-bottom: 20px; display: inline-block;">Go Back to Home</a> <!-- Button to go back to home.php -->
   <table>
      <thead>
         <tr>
            <th>Full Name</th>
            <th>Student Number</th>
            <th>Contact Number</th>
            <th>Date Added</th>
            <th>Action</th> <!-- Added column for edit button -->
         </tr>
      </thead>
      <tbody>
         <?php foreach($items as $item): ?>
         <tr>
            <td><?php echo $item['full_name']; ?></td>
            <td><?php echo $item['student_number']; ?></td>
            <td><?php echo $item['contact_number']; ?></td>
            <td><?php echo $item['date_added']; ?></td>
            <td><a href="edit_item.php?id=<?php echo $item['id']; ?>">Edit</a></td> <!-- Edit button linked to edit_item.php -->
         </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</body>
</html>
