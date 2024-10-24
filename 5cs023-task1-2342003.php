<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Movie List</h1>

<?php
// Connect to the database
$mysqli = new mysqli("localhost", "2342003", "Oscar12@", "db2342003");


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


$result = $mysqli->query("SELECT Movie_name, Genre, Price, `Date of release` FROM movies");


if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Movie name</th><th>Genre</th><th>Price</th><th>Date of release</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Movie_name'] . "</td>";
        echo "<td>" . $row['Genre'] . "</td>";
        echo "<td>£" . number_format($row['Price'], 2) . "</td>";  
        echo "<td>" . $row['Date of release'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No movies found.";
}


$mysqli->close();
?>

</body>
</html>
