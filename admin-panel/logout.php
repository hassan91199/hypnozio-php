<?php
require(__DIR__ . '/../utils/functions.php');

session_start();
session_unset();
session_destroy();
header("Location: " . env('BASE_URL') . "/admin-panel/login.php");
exit();
