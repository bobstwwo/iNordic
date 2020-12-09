<thead>
<tr>
    <th>#id</th>
    <th>title</th>
    <th>articul</th>
    <th>price</th>
    <th>category</th>
</tr>
</thead>
<tbody>
<?php
include('../system/classes/Unit.php');
include('../system/classes/Good.php');

//получили все записи из БД с помощью методы
$results = Good::getAllLines();

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
            <?= $line['id']?>
        </td>
        <td>
            <?= $line['price']?>
        </td>
        <td>
            <?= $line['id']?>
        </td>
    </tr>
<?php } ?>

</tbody>