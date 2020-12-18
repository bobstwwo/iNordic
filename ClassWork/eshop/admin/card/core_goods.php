<?php

if (isset($_GET['id'])) {
    require_once($_SERVER['DOCUMENT_ROOT'].'/iNordic/ClassWork/eshop/system/classes/autoload.php');

    $good = new Good(); 
    
    $fileName = 'update.php';
} else {
    $fileName = 'create.php'; 
}

?>
<form action="http://localhost/iNordic/ClassWork/eshop/system/controllers/<?=$fileName?>" method="POST">   
    <div>
        <input type="hidden" name="class_name" value="Good">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
    </div>   
    <div class="form-group"> 
        <label for="exampleInputEmail1">Название</label>
        <input name="title" type="text" value="<?= isset($_GET['id']) ? $good->getField('title') : ''   ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Цена</label>
        <input name="price" type="number" value="<?= isset($_GET['id']) ? $good->getField('price') : '' ?>" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Описание</label>      
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= isset($_GET['id']) ? $good->getField('description') : '' ?></textarea> 
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>