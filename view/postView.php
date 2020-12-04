<!-- Affiche un billet et ses commentaires -->
<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>

<p id="btn_return_listPosts">
	<a href="index.php">
		<i class="fas fa-arrow-left"></i>Retour
	</a>
</p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<div id="div-comments">
	<h2>Commentaires</h2>

	<?php if (isset($_SESSION['id'])) { ?>
		<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
		    <div>
		        <label for="comment">Commentaire</label><br /><textarea id="comment" name="comment"></textarea>
		    </div>
		    <div>
		        <input type="submit" id="button_add_comment" />
		    </div>
		</form>	
	<?php 
	}
	 else {
	 	echo "Veuillez vous connecter pour ajouter un commentaire.";
	 }
	?>



	<?php
	while ($comment = $comments->fetch())
	{
	?>
	    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
	    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p><a href="index.php?action=validReport&amp;id=<?= $comment['id'] ?>">Signaler</a>

	<?php
	}
	?>

	<?php $content = ob_get_clean(); ?>
</div>
<?php require('view/template.php'); ?>