<?php

require_once('connect.php');


$pieces = explode(",", $_POST['cards']);


$final_result = array();
$sql = 'SELECT * FROM `cards` WHERE `id` IN (' . implode(',', array_map('intval', $pieces)) . ')';
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
