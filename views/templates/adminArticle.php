<h1><?= htmlspecialchars($article->getTitle()) ?></h1>

<h2>Commentaires</h2>

<?php if (empty($comments)): ?>
    <p>Aucun commentaire.</p>
<?php endif; ?>

<?php foreach ($comments as $comment): ?>
    <div class="admin-comment">
        <p>
            <strong><?= htmlspecialchars($comment->getPseudo()) ?></strong>
            <em>(<?= $comment->getDateCreation()->format('d/m/Y') ?>)</em>
        </p>

        <p><?= nl2br(htmlspecialchars($comment->getContent())) ?></p>

        <form method="post"
              action="index.php?action=deleteComment"
              onsubmit="return confirm('Supprimer ce commentaire ?');">
            <input type="hidden" name="comment_id" value="<?= $comment->getId() ?>">
            <button class="btn-delete">Supprimer</button>
        </form>
    </div>
<?php endforeach; ?>

