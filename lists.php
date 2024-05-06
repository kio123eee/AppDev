<?php
// Include the database connection file
include 'db_config.php';

// Fetch the list of lost and found items from the database
$select_query = $conn->query("SELECT * FROM lost_found_list");
$items = $select_query->fetchAll(PDO::FETCH_ASSOC);

// Update status if form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $id = $_POST['item_id'];
    $status = $_POST['status'];

    $update_query = $conn->prepare("UPDATE lost_found_list SET status = ? WHERE id = ?");
    $update_query->execute([$status, $id]);
    // Redirect back to the lists page after updating status
    header("Location: lists.php");
    exit;
}
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
            <th>Status</th> <!-- Added column for status -->
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
            <td>
               <form action="" method="post">
                  <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                  <select name="status" onchange="this.form.submit()">
                     <option value="Lost" <?php if($item['status'] == 'Lost') echo 'selected'; ?>>Lost</option>
                     <option value="Found" <?php if($item['status'] == 'Found') echo 'selected'; ?>>Found</option>
                  </select>
                  <input type="hidden" name="update_status"> <!-- Hidden field to indicate status update -->
               </form>
            </td>
            <td><a href="edit_item.php?id=<?php echo $item['id']; ?>">Edit</a></td> <!-- Edit button linked to edit_item.php -->
         </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</body>
</html>
