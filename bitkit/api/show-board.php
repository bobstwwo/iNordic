<?php
require_once('connect.php');

$user = json_decode(file_get_contents('data/data.txt'), true);

$id = $user['id'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$rez = mysqli_query($conn, $sql);
$result = mysqli_fetch_row($rez);


$name = $result[3];
$surname = $result[4];
$boards = $result[5];

$pieces = explode(",", $boards);

$board_id;
$numb = file_get_contents('data/numb.txt');
if ($numb == "last" || $numb == " ") {
    $board_id = end($pieces);
} else {
    $board_id = $numb;
}

$sql = "SELECT * FROM boards WHERE id = '$board_id'";
$rez = mysqli_query($conn, $sql);
$result = mysqli_fetch_row($rez);

$title = $result[1];
$bg = $result[2];

$arr = array();

$arr[] = $name;
$arr[] = $surname;
$arr[] = $title;
$arr[] = $bg;

file_put_contents('data/board-id.txt', $board_id);
echo json_encode($arr);
