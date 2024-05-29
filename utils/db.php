<?php
function getDbConnection()
{
    // Include the database configuration from env
    $env = include('env.php');

    // Create connection
    $conn = new mysqli(
        $env['DB_HOST'],
        $env['DB_USERNAME'],
        $env['DB_PASSWORD'],
        $env['DB_DATABASE']
    );

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
