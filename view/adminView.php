<?php $title = "Administration";

ob_start(); ?>

<h1>Administration</h1>
<em><a href="index.php?action=afficheEdition">Ajouter</a></em>


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
            <em><a href="">Modifier</a></em> /
			<em><a href="index.php?action=delete&amp;id=<?= $post['id'] ?>">Supprimer</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();


$content = ob_get_clean(); 
require('template.php');
?>