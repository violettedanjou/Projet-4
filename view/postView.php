<!-- Affiche un billet et ses commentaires -->
<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>

<p id="btn_return_listPosts">
	<?php if(isset($_SESSION['admin']) && ($_SESSION['admin'] != 0)) { ?>
		<a href="index.php?action=afficheAdmin">
			<i class="fas fa-arrow-left"></i>Retour
		</a>
	<?php }
	elseif(isset($_SESSION['pseudo'])) { ?>
		<a href="index.php">
			<i class="fas fa-arrow-left"></i>Retour
		</a>
	<?php } ?>
</p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <?= nl2br(($post['content'])) ?>
</div>

<div id="div-comments">
	<h2>Commentaires</h2>

	<?php 	if (isset($_SESSION['id'])) { ?>
				<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
				    <div>
				        <label for="comment"></label><br /><textarea id="comment" name="comment"></textarea>
				    </div>
				    <div>
				        <input type="submit" id="button_add_comment" />
				    </div>
				</form>	
	<?php 	}
	
			else {
				throw new Exception("Veuillez vous connecter pour ajouter un commentaire.", 1);
			} 

/* Commentaires affichés une fois connecté */
	while ($comment = $comments->fetch()) 
	{
	?>
		<div id="news">
		    <h4>
		    	<p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
		    </h4>

		    <p>
		    	<?= nl2br(($comment['comment'])) ?>
		    </p>
		

		<?php 	if (isset($_SESSION['id'])) { ?>
					<div id="button-report">
			    		<a  href="index.php?action=validReport&amp;id=<?= $comment['id'] ?>&amp;post_id=<?= $post['id']?>">Signaler</a>
			    	</div>
		<?php 	} 
				
				else {
					throw new Exception("Veuillez vous connecter pour signaler ce commentaire.", 1);
				}
				?>
		</div>
	<?php
	}
	?>
</div>

<?php $content = ob_get_clean();

require('view/template.php'); ?>


