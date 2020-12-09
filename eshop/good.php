<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link href="css/catalogue/style.css" rel="stylesheet">
    <link href="css/main/style.css" rel="stylesheet">
    <link href="css/good/style.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <header>
            <?php
            include($_SERVER['DOCUMENT_ROOT'] . "/iNordic/eshop/components/header/header.php");
            include($_SERVER['DOCUMENT_ROOT'] . "/iNordic/eshop/system/classes/Connection.php");
            $category = $_GET['category'];
            $obj = new Connection();
            $request = 'select * from all_men where id='.$_GET['id'];
            $result = $obj->getTable($request);
            $line = mysqli_fetch_assoc($result);
            ?>
        </header>
        <main>
            <div class="good">
                <div class="head-links">
                    <a href="#">Главная</a> /
                    <a href="#">Мужчинам</a> /
                    <a href="#"><?php echo "$category"; ?></a> /
                    <a href="#">Кеды с полоской</a>
                </div>
                <div class="img">
                    <img src="<?=$line['photo']?>" alt="">
                </div>
                <div class="title">
                    <span><?=$line['name']?></span>
                </div>
                <div class="artikul">
                    Артикул: 385904
                </div>
                <div class="price">
                    <span><?=$line['price']?> руб.</span>
                </div>
                <div class="text">
                    <?=$line['description']?>
                </div>
                <div class="size">Размер</div>
                <div class="next">
                    <div class="box">
                        38
                    </div>
                    <div class="box">
                        39
                    </div>
                </div>
                <div class="btn">
                    <div class="btn-inner">
                    Добавить в карзину
                    </div>
                </div>
            </div>
        </main>
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . "/iNordic/eshop/components/footer/footer.php");
        ?>
    </div>
</body>

</html>