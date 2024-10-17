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
// Connect to the database
$mysqli = new mysqli("localhost", "2342003", "Oscar12@", "db2342003");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Query to get the film names from the 'flimName' column (with typo "flim")
$result = $mysqli->query("SELECT flimName FROM flims");

// Display films in an unordered list
if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row['flimName'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No films found.";
}

// Close the connection
$mysqli->close();
?>

</body>
</html>
