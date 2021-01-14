<?php
$text = $_POST['text'];
$board_id = file_get_contents('data/board-id.txt');

require_once('connect.php');
$sql = "SELECT columns FROM boards WHERE id='$board_id'";
$rez = mysqli_query($conn, $sql);
$result = mysqli_fetch_row($rez);

$columns = $result[0];

$sql = "INSERT INTO columns (title) VALUES ('$text')";
$rez = mysqli_query($conn, $sql);

$last_id = $conn->insert_id;

$rez_to_be_writtem = '';
if ($result[0] == '') {
    $rez_to_be_writtem = $last_id;
} else {
    $rez_to_be_writtem = $columns . "," . $last_id;
}

$sql = "UPDATE boards SET columns='$rez_to_be_writtem' WHERE id='$board_id'";
mysqli_query($conn, $sql);
mysqli_close($conn);