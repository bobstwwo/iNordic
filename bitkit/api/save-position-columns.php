<?php
$data = $_POST['data'];

$data = implode(',', $data);
$id = file_get_contents('data/board-id.txt');
require_once('connect.php');


$sql = "UPDATE boards SET columns='$data' WHERE id='$id'";
mysqli_query($conn, $sql);
mysqli_close($conn);

// echo json_encode($data);
