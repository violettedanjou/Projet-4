<?php $title = "Administration";

ob_start(); ?>

<h1>Administration</h1>

<em>
	<a href="index.php?action=afficheNewPost">
		<i class="fas fa-plus"></i>
	</a>
</em>


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
            <?= nl2br(htmlspecialchars($data['content'])) ?> <br/>
            <em><a href="index.php?action=validEdition&amp;id=<?= $data['id'] ?>">Modifier</a></em> /
			<em><a href="index.php?action=validDelete>">Supprimer</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();

$content = ob_get_clean(); 
require('template.php');
?>