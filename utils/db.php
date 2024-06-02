<?php
function getDbConnection()
{
    // Include the database configuration from env
    $env = include(__DIR__ . '/../env.php');

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

function updateOrCreate($table, $conditions, $data)
{
    // Get the database connection
    $conn = getDbConnection();

    // Escape inputs for security
    foreach ($conditions as $key => $value) {
        $conditions[$key] = $conn->real_escape_string($value);
    }
    foreach ($data as $key => $value) {
        $data[$key] = $conn->real_escape_string($value);
    }

    // Check if record exists using prepared statements
    $whereClause = "";
    foreach ($conditions as $key => $value) {
        $whereClause .= "$key = '$value' AND ";
    }
    // Remove the trailing "AND "
    $whereClause = rtrim($whereClause, "AND ");

    $selectQuery = "SELECT * FROM $table WHERE $whereClause";
    $result = $conn->query($selectQuery);

    $reccord = null;

    if ($result->num_rows > 0) {
        // Record exists, update its data
        $updateQuery = "UPDATE $table SET ";
        foreach ($data as $key => $value) {
            $updateQuery .= "$key = '$value', ";
        }
        // Remove the trailing comma and space
        $updateQuery = rtrim($updateQuery, ", ");
        $updateQuery .= " WHERE $whereClause";

        if ($conn->query($updateQuery)) {
            // Return the updated record
            $reccord = $conn->query($selectQuery)->fetch_assoc();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // Record does not exist, create a new record
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $insertQuery = "INSERT INTO $table ($columns) VALUES ($values)";

        if ($conn->query($insertQuery)) {
            // Return the newly inserted record
            $reccord = $conn->query($selectQuery)->fetch_assoc();
        } else {
            echo "Error creating record: " . $conn->error;
        }
    }

    // Close the connection
    $conn->close();

    // Return the id
    return $reccord;
}
