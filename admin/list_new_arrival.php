<?php
session_start();
include ('../connection.php');

$timeframe = $_POST['timeframe'];


$sql = "SELECT * FROM tbl_collection WHERE created_at >= NOW() - INTERVAL $timeframe";


$result = $data->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Title: " . $row["title"]. " - Author: " . $row["author"]. "<br>";
     
    }
} else {
    echo "Walang bagong dating na aklat sa itinakdang oras, araw, o buwan.";
}


$data->close();
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search New Arrivals</title>
</head>
<body>
    <h2>Search New Arrivals</h2>
    <form action="../connection.php" method="post">
        <label>Select Timeframe:</label>
        <select name="timeframe">
            <option value="1">Last 1 Hour</option>
            <option value="24">Last 24 Hours</option>
            <option value="7">Last 7 Days</option>
           
        </select>
        <br>
        <input type="submit" value="Search">
    </form>
</body>
</html>