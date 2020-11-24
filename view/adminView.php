<?php $title = "Administration";

ob_start(); ?>

<h1>Administration</h1>
<a href="index.php?action=addition&amp;id=<?= $post['id'] ?>">Ajouter</a> /


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
            <a href="index.php?edit<?= $post['id'] ?>">Modifier</a> /
			<a href="index.php?action=delete&amp;id=<?= $post['id'] ?>">Supprimer</a>
        </p>
    </div>
<?php
}
$posts->closeCursor();


$content = ob_get_clean(); 
require('template.php');
?>