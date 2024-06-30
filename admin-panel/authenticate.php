<?php
require(__DIR__ . '/../utils/functions.php');
session_start();

// Replace with your actual admin credentials
$admin_username = 'admin';
$admin_password = 'password';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['loggedin'] = true;
        header("Location: " . env('BASE_URL') . "admin-panel");
        exit();
    } else {
        echo 'Invalid username or password';
    }
}
