<?php

require_once('connect.php');

$user = json_decode(file_get_contents('data/data.txt'), true);
$id = $user['id'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$rez = mysqli_query($conn, $sql);
$result = mysqli_fetch_row($rez);

$boards = $result[5];
$pieces = explode(",", $boards);

$final_result = array();
$sql = 'SELECT * FROM `boards` WHERE `id` IN (' . implode(',', array_map('intval', $pieces)) . ')';
$rez = mysqli_query($conn, $sql);
while ($t = mysqli_fetch_row($rez)) {
    $final_result[] = $t;
}
echo json_encode($final_result);
