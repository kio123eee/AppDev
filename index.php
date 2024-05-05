<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Database Connection</title>
</head>
<body>
    <h1>Test Database Connection</h1>
    <?php include 'db_config.php'; ?>
    <p><?php echo $connection_status; ?></p>
</body>
</html>
