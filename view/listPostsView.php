<!-- Affiche la liste des derniers billets -->
<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1 id="h1-accueil">Billet simple pour l'Alaska</h1>
<p id="p-listPosts">Les derniers chapitres : <br/>
</p>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">
                <?= htmlspecialchars($data['title']) ?>
            </a>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em id="link-comments"><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); // On récupère le code HTML, avec ob_start() et ob_get_clean(), et on le met dans la variable $content qui s'affichera dans le template.php

require('view/template.php'); ?>