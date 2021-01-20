<?php
require_once('connect.php');

$id = '';
session_start();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $_SESSION['card_id'] = $id;
} else {
    $id = $_SESSION['card_id'];
}

$sql = "SELECT * FROM cards WHERE id = '$id'";
$rez = mysqli_query($conn, $sql);
$result = mysqli_fetch_row($rez);

echo json_encode($result);
