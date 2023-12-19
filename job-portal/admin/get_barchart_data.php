<?php

$now = date('Y-m-d');

$to_date = date('Y-m-d', strtotime($now . ' + 1 days'));
$from_date = date('Y-m-d', strtotime($now . ' - 7 days'));

$conn = mysqli_connect("localhost", "root", "", "avanti_job");

$query = "SELECT * FROM post_job WHERE timedate BETWEEN '" . $from_date . "' AND  '" . $to_date . "'
    ORDER by id DESC";
$query_run = mysqli_query($conn, $query);
$result_array = [];

if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $row) {
        array_push($result_array, $row);
    }
    header('Content-type: application/json');
    echo json_encode($result_array);
} else {
    echo $return = "<h4>No Record Found</h4>";
}

?>