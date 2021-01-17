<?php
$data = $_POST['data'];
$columnID = $_POST['columnID'];

$data = implode(',', $data);
require_once('connect.php');


$sql = "UPDATE columns SET cards='$data' WHERE id='$columnID'";
mysqli_query($conn, $sql);
mysqli_close($conn);

// echo json_encode($data);
