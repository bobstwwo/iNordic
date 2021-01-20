<?php
session_start();
$id_card = $_SESSION['card_id'];
$text = $_POST['text'];
$color = $_POST['color'];
require_once('connect.php');
$sql = "SELECT marks FROM cards WHERE id='$id_card'";
$rez = mysqli_query($conn, $sql);
$result = mysqli_fetch_row($rez);

$marks = $result[0];

$sql = "INSERT INTO marks (title,color) VALUES ('$text','$color')";
$rez = mysqli_query($conn, $sql);

$last_id = $conn->insert_id;

$rez_to_be_writtem = '';
if ($result[0] == '') {
    $rez_to_be_writtem = $last_id;
} else {
    $rez_to_be_writtem = $marks . "," . $last_id;
}

$sql = "UPDATE cards SET marks='$rez_to_be_writtem' WHERE id='$id_card'";
mysqli_query($conn, $sql);
mysqli_close($conn);
echo json_encode($id_card);
