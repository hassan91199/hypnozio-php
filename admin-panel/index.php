<?php
require(__DIR__ . '/../utils/functions.php');
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: " . env('BASE_URL') . "/admin-panel/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
</head>

<body>
    <h1>Welcome to the Admin Panel</h1>
    <p><a href="/admin-panel/logout.php">Logout</a></p>
    <!-- Admin management functionalities go here -->
</body>

</html>