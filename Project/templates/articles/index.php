<?php require(__DIR__.'/../header.php');?>
<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Text</th>
      <th scope="col">Author</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($articles as $article):?>
    <tr>
      <th scope="row"><a href="<?=dirname($_SERVER['SCRIPT_NAME']).'/article/'.$article['id'];?>"><?=$article['name'];?></a></th>
      <td><?=$article['text'];?></td>
      <td><?=$article['author_id'];?></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
<?php require(__DIR__.'/../footer.php');?>
