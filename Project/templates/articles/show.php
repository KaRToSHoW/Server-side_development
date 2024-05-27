<?php require(__DIR__ . '/../header.php'); ?>

<div class="card mt-3" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= $article->getName(); ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $user->getNickname(); ?></h6>
        <p class="card-text"><?= $article->getText(); ?></p>
        <a href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/article/edit/<?= $article->getId(); ?>" class="card-link">Edit Article</a>
        <a href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/article/delete/<?= $article->getId(); ?>" class="card-link">Delete Article</a>
    </div>
</div>
<div class="comments mt-4">
    <h4>Комментарии</h4>
    <?php if (!empty($comments)) : ?>
        <?php foreach ($comments as $comment) : ?>
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-text"><?= htmlspecialchars($comment->getContent()); ?></p>
                    <small class="text-muted">Автор: <?= htmlspecialchars($comment->getUserId()); ?>, Дата: <?= $comment->getCreatedAt(); ?></small>
                    <div class="mt-2">
                        <a href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/comment/edit/<?= $comment->getId(); ?>" class="btn btn-sm btn-outline-primary">Редактировать</a>
                        <a href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/comment/delete/<?= $comment->getId(); ?>" class="btn btn-sm btn-outline-danger">Удалить</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Комментариев пока нет.</p>
    <?php endif; ?>

    <div class="mt-4">
        <h5>Добавить комментарий</h5>
        <form action="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/comment/create" method="post">
            <input type="hidden" name="article_id" value="<?= $article->getId(); ?>">
            <input type="hidden" name="user_id" value="<?= $user->getId(); ?>">
            <div class="form-group">
                <label for="content">Комментарий</label>
                <textarea name="content" class="form-control" id="content" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Добавить комментарий</button>
        </form>
    </div>
</div>


<?php require(__DIR__ . '/../footer.php'); ?>