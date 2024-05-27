<?php require(__DIR__ . '/../header.php'); ?>
<h1>Редактировать комментарий</h1>

<form action="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/comment/update/<?= $comment->getId(); ?>" method="post">
    <div class="form-group">
        <label for="content">Комментарий</label>
        <textarea name="content" class="form-control" id="content" rows="3" required><?= htmlspecialchars($comment->getContent()); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Сохранить</button>
</form>
<?php require(__DIR__ . '/../footer.php'); ?>