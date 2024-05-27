<?php require(__DIR__.'/../header.php');?>
<form action="<?=dirname($_SERVER['SCRIPT_NAME']);?>/article/update/<?=$article->getId();?>" method="POST">
  <div class="form-group">
    <label for="name">Name article</label>
    <input type="text" class="form-control" id="name" name="name" value="<?=$article->getName();?>">
  </div>
  <div class="form-group">
    <label for="text">Text</label>
    <textarea name="text" id="text" class="form-control"><?=$article->getText();?></textarea>
  </div>
  <input type="hidden" name="authorId" value="<?=$article->getAuthorId();?>">
  <button type="submit" class="btn btn-primary">Update</button>
</form>
<?php require(__DIR__.'/../footer.php');?>
