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

$qwert = array();
while ($t = mysqli_fetch_row($rez)) {
    for ($i = 0; $i < count($pieces); $i++) {
        if ($t[0] == $pieces[$i]) {
            $qwert[$i] = $t;
        }
    }
}

echo json_encode($qwert);
