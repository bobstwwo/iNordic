<?php

$title = $_POST['title'];
$id = $_POST['id'];

require_once('connect.php');
$sql = "SELECT cards FROM columns WHERE id='$id'";
$rez = mysqli_query($conn, $sql);
$result = mysqli_fetch_row($rez);

$cards = $result[0];

$sql = "INSERT INTO cards (title) VALUES ('$title')";
$rez = mysqli_query($conn, $sql);

$last_id = $conn->insert_id;

$rez_to_be_writtem = '';
if ($result[0] == '') {
    $rez_to_be_writtem = $last_id;
} else {
    $rez_to_be_writtem = $cards . "," . $last_id;
}

$sql = "UPDATE columns SET cards='$rez_to_be_writtem' WHERE id='$id'";
mysqli_query($conn, $sql);
mysqli_close($conn);

echo json_encode($last_id);