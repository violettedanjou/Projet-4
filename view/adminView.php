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
        
        <p id="links-edit-delete">
            <?= nl2br(htmlspecialchars($data['content'])) ?> <br/>
            
	        <em><a href="index.php?action=afficheEdition&amp;id=<?= $data['id'] ?>">Modifier</a></em>
			<em><a href="index.php?action=validDelete&amp;id=<?= $data['id'] ?>">Supprimer</a></em>
        </p>
    </div>
<?php 
} 
$posts->closeCursor(); 
?>

<h1>Commentaires signalés</h1>

<?php
while ($data_report = $admin->fetch())
{
?>

	<div id="list_reports">
		<h4>
			<em>le <?= $data_report['creation_date_fr'] ?></em>
			<?= nl2br(htmlspecialchars($data_report['comment_report'])) ?>
		</h4>
	</div>

<?php
}
$admin->closeCursor();

$content = ob_get_clean(); 
require('template.php');
?>










