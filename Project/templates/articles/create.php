<?php require(__DIR__.'/../header.php');?>
<form action="<?=dirname($_SERVER['SCRIPT_NAME']);?>/article/store" method="POST">
  <div class="form-group">
    <label for="name">Name article</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="text">Text</label>
    <textarea name="text" id="text" class="form-control"></textarea>
  </div>
  <input type="hidden" name="authorId" value="1">
  <button type="submit" class="btn btn-primary">Save</button>
</form>
<?php require(__DIR__.'/../footer.php');?>
