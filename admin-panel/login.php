<?php
require(__DIR__ . '/../utils/functions.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
</head>

<body>
    <h2>Admin Login</h2>
    <form action="/admin-panel/authenticate.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>

</html>