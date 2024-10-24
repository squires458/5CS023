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

// Query to get the plant data from the plants2 table
$result = $mysqli->query("SELECT plantID, name, price FROM plants2");

// Display plants in a table
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>plantID</th><th>name</th><th>price</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['plantID'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
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
