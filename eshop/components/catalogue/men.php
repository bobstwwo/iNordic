<div class="men">
    <div class="head-links">
        <a href="#">Главная</a> /
        <a href="#">Мужчинам</a>
    </div>
    <div class="title">
        <span>Мужчинам</span>
    </div>
    <div class="desc">
        <span>Все товары</span>
    </div>
    <div class="filters">
        <span>
            Тут должны быть фильтры
        </span>
    </div>
    <div id="goods" class="goods">
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . '/iNordic/eshop/system/classes/Connection.php');
        $obj = new Connection();
        $request = 'select * from all_men';
        $result = $obj->getTable($request);
        while ($line = mysqli_fetch_assoc($result)) {
            echo '
            <div class="goods-item">
                <div class="goods-item-photo">
                    <a href="good.php?category='.$line['category'].'&id='.$line['id'].'">
                        <img src="' . $line['photo'] . '" alt="">
                    </a>
                </div>
                <div class="goods-item-title">
                    <a href="good.php?category='.$line['category'].'&id='.$line['id'].'">
                        ' . $line['name'] . '
                    </a>
                </div>
                <div class="goods-item-price">
                    ' . $line['price'] . ' руб.
                </div>
            </div>
                ';
        }
        ?>
    </div>
    <div class="next">
        <div class="box">
            1
        </div>
    </div>
</div>