<?php
    /**
     * Ce template affiche la page "monitoring".
     * @var array $articles Liste des articles.
     * @var array $commentCounts Nombre de commentaires par article.
     * 
     */

function sortLink(string $label, string $column, string $currentSort, string $currentOrder): string {
    $newOrder = ($currentSort === $column && $currentOrder === 'asc') ? 'desc' : 'asc';
    $arrow = '';

    if ($currentSort === $column) {
        $arrow = $currentOrder === 'asc' ? ' ▲' : ' ▼';
    }

    return '<a href="index.php?action=adminMonitoring&sort='
        . $column . '&order=' . $newOrder . '">'
        . $label . $arrow . '</a>';
}

?>

<h2>Monitoring du blog</h2>

<table class="admin-table">
    <thead>
        <tr>
            <th><?= sortLink("Titre", "title", $sort, $order) ?></th>
            <th><?= sortLink("Vues", "views", $sort, $order) ?></th>
            <th><?= sortLink("Commentaires", "comments", $sort, $order) ?></th>
            <th><?= sortLink("Date de publication", "date", $sort, $order) ?></th>
            <th>Actions</th>            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article) : ?>
            <tr>
                <td><?=  htmlspecialchars($article->getTitle()) ?></td>
                <td><?= $article->getViews() ?></td>
                <td><?= $commentCounts[$article->getId()] ?></td>
                <td><?= $article->getDateCreation()->format('d/m/Y') ?></td>
                <td>
                    <a href="index.php?action=adminArticle&id=<?= $article->getId() ?>">
                        Gérer commentaires
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
