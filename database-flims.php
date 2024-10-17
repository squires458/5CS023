<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film List</title>
</head>
<body>

<h1>Film List</h1>

<?php
// Function to connect to the database
function connectToDatabase() {
    // Database connection details
    $servername = "localhost";      // Database server
    $username = "2342003";          // Your database username
    $password = "Oscar12@";         // Your database password
    $dbname = "db2342003";          // Your database name
    
    // Create a new MySQLi connection
    $mysqli = new mysqli($servername, $username, $password, $dbname);

    // Check if connection was successful
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    return $mysqli;  // Return the connection object
}

// Function to retrieve and display films
function displayFilms() {
    // Call the function to connect to the database
    $mysqli = connectToDatabase();

    // Query to get the film names
    $sql = "SELECT name FROM films";
    $result = $mysqli->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        // Display films in an unordered list
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row['name']) . "</li>";
        }
        echo "</ul>";
    } else {
        // If no films are found, display a message
        echo "No films found.";
    }

    // Close the database connection
    $mysqli->close();
}

// Call the function to display the films
displayFilms();
?>

</body>
</html>
