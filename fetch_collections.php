<?php
include('connection.php');

if (isset($_GET['signage'])) {
    $selectedSignage = $_GET['signage'];
    $query = "SELECT * FROM tbl_collection WHERE signage = '$selectedSignage'";
    $query_run = mysqli_query($data, $query);

    $collections = array();
    while ($row = mysqli_fetch_assoc($query_run)) {
        $collections[] = $row;
    }

    echo json_encode($collections);
    exit;
}
?>
