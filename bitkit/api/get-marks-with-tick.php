<?php

session_start();
require_once('connect.php');

$marks = $_POST['marks'];
$id = $_SESSION['card_id'];
$sql = "UPDATE cards SET `ticked-marks`='$marks' WHERE id='$id'";
mysqli_query($conn, $sql);

$_SESSION['ticked-marks'] = $marks;

$pieces = explode(",", $marks);

$final_result = array();
$sql = 'SELECT * FROM `marks` WHERE `id` IN (' . implode(',', array_map('intval', $pieces)) . ')';
$rez = mysqli_query($conn, $sql);
while ($t = mysqli_fetch_row($rez)) {
    $final_result[] = $t;
}
echo json_encode($final_result);
