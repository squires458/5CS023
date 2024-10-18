<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant List</title>
</head>
<body>

<h1>Plant List</h1>

<?php
// Connect to the database
$mysqli = new mysqli("localhost", "2342003", "Oscar12@", "db2342003");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Query to get all data from the plant table
$result = $mysqli->query("SELECT ID, type, stock FROM plant");

// Check if there are results and display them in a table
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Type</th><th>Stock</th></tr>"; // Table headers
    
    // Fetch each row and display data
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['ID']) . "</td>";
        echo "<td>" . htmlspecialchars($row['type']) . "</td>";
        echo "<td>" . htmlspecialchars($row['stock']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No plants found.";
}

// Close the connection
$mysqli->close();
?>

</body>
</html>
