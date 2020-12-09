<form action="create.php" method="POST">
    <div>
        <input type="hidden" name="table" value="<?=$table?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Название</label>
        <input name="title" type="text" class="form-control" id="exampleInputEmail1"
               aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
            else.</small>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Описание</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                  rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>