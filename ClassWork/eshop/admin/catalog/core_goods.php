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

    include_once($_SERVER['DOCUMENT_ROOT'] . '/iNordic/ClassWork/eshop/system/classes/autoload.php');

    //получили все записи из БД с помощью методы
    $results = Good::getAllLines();

    ?>
    <?php while ($line = mysqli_fetch_assoc($results)) { ?>
        <tr>
            <td>
                <a href="?template=card&table=<?=$_GET['table']?>&class_name=Good&id=<?= $line['id'] ?>">
                    <?= $line['id'] ?>
                </a>
            </td>
            <td>
                <?= $line['title'] ?>
            </td>
            <td>
                <?= $line['id'] ?>
            </td>
            <td>
                <?= $line['price'] ?>
            </td>
            <td>
                <a href="http://localhost/iNordic/ClassWork/eshop/system/controllers/delete.php?class_name=Good&id=<?= $line['id'] ?>">x</a>
            </td>
        </tr>
    <?php } ?>

</tbody>