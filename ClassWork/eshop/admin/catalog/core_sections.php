<thead>
<tr>
    <th>ID</th>
    <th>TITLE</th>
    <th>DESCRIPTION</th>
</tr>
</thead>
<tbody>
<?php

include($_SERVER['DOCUMENT_ROOT'].'/iNordic/ClassWork/eshop/system/classes/Unit.php');
include($_SERVER['DOCUMENT_ROOT'].'/iNordic/ClassWork/eshop/system/classes/Section.php');


//получили все записи из БД с помощью методы
$results = Section::getAllLines();

?>
<?php while ($line = mysqli_fetch_assoc($results)) { ?>
    <tr>
        <td>
            <?= $line['id']?>
        </td>
        <td>
            <?= $line['title']?>
        </td>
        <td>
            <?= $line['description']?>
        </td>
    </tr>
<?php } ?>

</tbody>