<?php
       require ('components/header/index.php');



  if (isset($_GET['category']) && $_GET['category']==1) {
            echo "WOMEN";
  } elseif (isset($_GET['category']) && $_GET['category']==2) {
             echo "MEN";
  } elseif (isset($_GET['category']) && $_GET['category']==3) {
             echo "CHILDREN";
  } else {
             echo "ALL";
  }
  
    include('system/classes/Unit.php');      
    include('system/classes/Good.php');

    $goods = new Good();

    //получили все записи из БД с помощью методы 
    $results = $goods->getAllLines();

   ?>

  
<div class="flex-box"> 
    <?php while ($line = mysqli_fetch_assoc($results)) { ?>
                <div class="good" style=" background-color:aquamarine;">
                      <div class="good-photo">
                        <a href="card.php?id=<?=$line['id']?>">  
                            <img src="<?=$line['photo']?>" >
                        </a>
                      </div>
                      <div class="good-title"> 
                          <?= $line['title'] ?>
                      </div> 
                      <div class="good-price">
                            <?=$line['price'] ?>
                      </div>
                 </div>
    <?php }  ?>
</div>    

<?php require ('components/footer/index.php'); ?>
   