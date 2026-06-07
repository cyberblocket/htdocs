<?php
require 'config.php';

$sql = "SELECT NOW() as current_time";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My PHP MySQL Test</title>
</head>
<body>
    <h1>PHP + MySQL works</h1>
    <p>Database time: <?php echo $row['current_time']; ?></p>
</body>
</html>