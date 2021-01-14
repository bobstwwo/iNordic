<?php

$board_id = file_get_contents('data/board-id.txt');

require_once('connect.php');
$sql = "SELECT columns FROM boards WHERE id='$board_id'";
$rez = mysqli_query($conn, $sql);
$result = mysqli_fetch_row($rez);

$boards = $result[0];
$pieces = explode(",", $boards);
$id = end($pieces);

$sql = "SELECT * FROM columns WHERE id='$id'";
$rez = mysqli_query($conn, $sql);
$t = mysqli_fetch_row($rez);
echo json_encode($t);
