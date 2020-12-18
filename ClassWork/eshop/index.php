<?php
require('components/header/index.php');

include_once($_SERVER['DOCUMENT_ROOT'] . '/iNordic/ClassWork/eshop/system/classes/autoload.php');

$results = Section::getAllLines();
?>


<div class="flex-box">
    <?php while ($line = mysqli_fetch_assoc($results)) { ?>
        <div class="good" style=" background-color:aquamarine;">
            <div class="good-photo">
                <a href="card.php?id=<?= $line['id'] ?>">
                    <img src="<?= $line['cover_photo'] ?>">
                </a>
            </div>
            <div class="good-title">
                <?= $line['title'] ?>
            </div>
            <div class="good-price">
                <?= $line['description'] ?>
            </div>
        </div>
    <?php }  ?>
</div>

<?php require('components/footer/index.php'); ?>