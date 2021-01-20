<?php

session_start();
$id_card = $_SESSION['card_id'];
$ticked_marks = explode(",", $_SESSION['ticked-marks']);
require_once('connect.php');

$sql = "SELECT marks FROM cards WHERE id='$id_card'";
$rez = mysqli_query($conn, $sql);
$result = mysqli_fetch_row($rez);
$all_marks = $result[0];
$pieces = explode(",", $all_marks);

$final_result = array();
$sql = 'SELECT * FROM `marks` WHERE `id` IN (' . implode(',', array_map('intval', $pieces)) . ')';
$rez = mysqli_query($conn, $sql);
while ($t = mysqli_fetch_row($rez)) {
    $final_result[] = $t;
}
$final_result[] = $ticked_marks;

echo json_encode($final_result);
