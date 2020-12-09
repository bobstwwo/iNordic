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
            ?>
        </header>
        <main>
            <div class="good">
                <div class="head-links">
                    <a href="#">Главная</a> /
                    <a href="#">Мужчинам</a> /
                    <a href="#">Обувь</a> /
                    <a href="#">Кеды с полоской</a>
                </div>
                <div class="img">
                    <img src="img/catalogue/9.jpg" alt="">
                </div>
                <div class="title">
                    <span>Кеды с полоской</span>
                </div>
                <div class="artikul">
                    Артикул: 385904
                </div>
                <div class="price">
                    <span>4500 руб.</span>
                </div>
                <div class="text">
                    Отличные кеды из водонепроницаемого материала. Отлично подходят для любой погоды <br>
                    Приятно сидят на ноге, стильные и комфортные
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