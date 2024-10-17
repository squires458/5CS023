<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animals List</title>
</head>
<body>

<h1>Animals List</h1>

<?php
// Connect to the database
$mysqli = new mysqli("localhost", "2342003", "Oscar12@", "db2342003");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Query to get all data from the animals table
$result = $mysqli->query("SELECT dog, cat, bear FROM animals"); // Adjusted to your actual column names

// Check if there are results and display them in a table
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Dog</th><th>Cat</th><th>Bear</th></tr>"; // Table headers
    
    // Fetch each row and display data
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['dog']) . "</td>";
        echo "<td>" . htmlspecialchars($row['cat']) . "</td>";
        echo "<td>" . htmlspecialchars($row['bear']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No animals found.";
}

// Close the connection
$mysqli->close();
?>

</body>
</html>
