<?php
// Include the database connection file
include 'db_config.php';

// Fetch the list of lost and found items from the database
$select_query = $conn->query("SELECT * FROM lost_found_list");
$items = $select_query->fetchAll(PDO::FETCH_ASSOC);

// Update status if form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_status'])) {
        $id = $_POST['item_id'];
        $status = $_POST['status'];

        $update_query = $conn->prepare("UPDATE lost_found_list SET status = ? WHERE id = ?");
        $update_query->execute([$status, $id]);
        // Redirect back to the lists page after updating status
        header("Location: lists.php");
        exit;
    } elseif (isset($_POST['delete_item'])) {
        $id = $_POST['item_id'];

        $delete_query = $conn->prepare("DELETE FROM lost_found_list WHERE id = ?");
        $delete_query->execute([$id]);
        // Redirect back to the lists page after deleting item
        header("Location: lists.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Lost and Found Lists</title>
   <style>
      /* Your CSS styles here */
   </style>
</head>
<body>
   <h1>Lost and Found Lists</h1>
   <a href="home.php" style="margin-bottom: 20px; display: inline-block;">Go Back to Home</a>
   <table>
      <thead>
         <tr>
            <th>Full Name</th>
            <th>Student Number</th>
            <th>Contact Number</th>
            <th>Date Added</th>
            <th>Status</th>
            <th>Action</th>
            <th>Action</th> <!-- Added column for delete button -->
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
                  <input type="hidden" name="update_status">
               </form>
            </td>
            <td><a href="edit_item.php?id=<?php echo $item['id']; ?>">Edit</a></td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                  <button type="submit" name="delete_item">Delete</button>
               </form>
            </td>
         </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</body>
</html>
