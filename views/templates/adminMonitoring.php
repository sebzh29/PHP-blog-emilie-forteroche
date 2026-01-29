<?php
    /**
     * Ce template affiche la page "monitoring".
     */
?>

<h1>Monitoring du blog</h1>

<table class="admin-table">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Vues</th>
            <th>Commentaires</th>
            <th>Date de publication</th>            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article) : ?>
            <tr>
                <td><?=  htmlspecialchars($article->getTitle()) ?></td>
                <td><?= $article->getViews() ?></td>
                <td><?= $commentCounts[$article->getId()] ?></td>
                <td><?= $article->getDateCreation()->format('d/m/Y') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
