<?php

$board_id = file_get_contents('data/board-id.txt');

require_once('connect.php');
$sql = "SELECT columns FROM boards WHERE id='$board_id'";
$rez = mysqli_query($conn, $sql);
$result = mysqli_fetch_row($rez);

$boards = $result[0];
$pieces = explode(",", $boards);

$final_result = array();
$sql = 'SELECT * FROM `columns` WHERE `id` IN (' . implode(',', array_map('intval', $pieces)) . ')';
$rez = mysqli_query($conn, $sql);
while ($t = mysqli_fetch_row($rez)) {
    $final_result[] = $t;
}
echo json_encode($final_result);
