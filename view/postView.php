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



	<?php $content = ob_get_clean(); ?>
</div>
<?php require('view/template.php'); ?>