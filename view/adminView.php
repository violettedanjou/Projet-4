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
        	<a href="index.php?action=post&amp;id=<?= $data['id'] ?>">
            	<?= htmlspecialchars($data['title']) ?>
            	<em>le <?= $data['creation_date_fr'] ?></em>
            </a>
        </h3>

        <?= nl2br($data['content']) ?> <br/>
            
	    <em><a id="link-edit" href="index.php?action=validEdition&amp;id=<?= $data['id'] ?>">Modifier</a></em>
		<em><a id="link-delete" href="index.php?action=validDelete&amp;id=<?= $data['id'] ?>">Supprimer</a></em>
    </div>
<?php 
} 
$posts->closeCursor(); 
?>

<h1>Commentaires signalés</h1>

<?php
while ($data = $admin->fetch())
{
?>
	<div class="news">
		<h4>
            <em>Le <?= $data['creation_date_fr'] ?></em>
			<?= $data['id'] ?> <br/>
        </h4>

		<p>
			<?= nl2br(htmlspecialchars($data['comment'])) ?> <br/>
			<em><a id="link-report-remove" href="index.php?action=deleteReport&amp;id=<?= $data['id'] ?>">Retirer le signalement</a></em>
			<em><a id="link-delete-comment" href="index.php?action=deleteComment&amp;id=<?= $data['id'] ?>">Supprimer le commentaire</a></em>
		</p>

	</div>
<?php
}
$admin->closeCursor();

$content = ob_get_clean(); 
require('template.php');
?>










