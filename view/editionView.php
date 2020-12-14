<?php $title = "Modification de billet";

ob_start(); ?>

<h1>Modification</h1>

<p id="btn_return_admin_page">
	<a href="index.php?action=afficheAdmin">
		<i class="fas fa-arrow-left"></i>Retour
	</a>
</p>

<div class="news">
    <h3>
        <?= htmlspecialchars($edit['title']);
        ?>
        <em>le <?= $edit['edit_post'];
        ?></em>
    </h3>
	    
	<p>
	    <?= nl2br(htmlspecialchars($edit['content'])) ?>
	</p>
</div>

<div id="form-edition">
	<form action="index.php?action=validEdition" method="POST">
		<input type="hidden" name="id" value="<?= $edit['id']?>">
      	<input id="title-edition" type="text" name="title" value="<?= $edit['title']?>"/><br/>
     	<textarea id="content-edition" name="content"><?= $edit['content']?></textarea><br/>
      	<input type="submit" value="Enregistrer" id="button-edit-post" />
    </form>
</div>

<?php $content = ob_get_clean(); 
require('template.php');
?>