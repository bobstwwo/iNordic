<?php
       require ('components/header/index.php');

       require_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');


  if (isset($_GET['category']) && $_GET['category']==1) {
            echo "WOMEN";
  } elseif (isset($_GET['category']) && $_GET['category']==2) {
             echo "MEN";
  } elseif (isset($_GET['category']) && $_GET['category']==3) {
             echo "CHILDREN";
  } else {
             echo "ALL";
  }
  
    $good = new Good();

   ?>

  
<div class="flex-box"> 
    
                <div class="good" style=" background-color:aquamarine;">
                      <div class="good-photo">
                        <a href="card.php?id=<?=$good->id()?>">  
                            <img src="<?=$good->photo()?>" > 
                        </a>
                      </div>
                      <div class="good-title"> 
                          <?= $good->getField('title') ?>
                      </div> 
                      <div class="good-price">
                            <?=$good->price() ?>
                      </div>
                 </div>
    <?php  ?>
</div>    

<?php require ('components/footer/index.php'); ?>
   