<?php

require_once('connect.php');

$marks = $_POST['marks'];

$pieces = explode(",", $marks);

$final_result = array();
$sql = 'SELECT * FROM `marks` WHERE `id` IN (' . implode(',', array_map('intval', $pieces)) . ')';
$rez = mysqli_query($conn, $sql);
while ($t = mysqli_fetch_row($rez)) {
    $final_result[] = $t;
}
echo json_encode($final_result);
