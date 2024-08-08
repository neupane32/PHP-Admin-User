<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: /views/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['admin']['username']; ?></h2>
    <a href="/controllers/AdminController.php?logout=true">Logout</a>
</body>
</html>
