<thead>
    <tr>
        <th>ID</th>
        <th>TITLE</th>
        <th>DESCRIPTION</th>
    </tr>
</thead>
<tbody>
    <?php

    include($_SERVER['DOCUMENT_ROOT'] . '/iNordic/ClassWork/eshop/system/classes/Unit.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/iNordic/ClassWork/eshop/system/classes/Section.php');


    //получили все записи из БД с помощью методы
    $results = Section::getAllLines();

    ?>
    <?php while ($line = mysqli_fetch_assoc($results)) { ?>
        <tr>
            <td>
            <a href="?template=card&table=<?=$_GET['table']?>&class_name=Section&id=<?= $line['id'] ?>">
                    <?= $line['id'] ?>
                </a>
            </td>
            <td>
                <?= $line['title'] ?>
            </td>
            <td>
                <?= $line['description'] ?>
            </td>
            <td>
                <a href="http://localhost/iNordic/ClassWork/eshop/system/controllers/delete.php?class_name=Section&id=<?= $line['id'] ?>">x</a>
            </td>
        </tr>
    <?php } ?>

</tbody>