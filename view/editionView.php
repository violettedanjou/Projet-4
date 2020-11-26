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
        <?= htmlspecialchars($_POST['title']);
        var_dump($_POST['title']);
        ?>
        <em>le <?= $_POST['edit_post'];
        var_dump($_POST['edit_post']); ?></em>
    </h3>
	    
	<p>
	    <?= nl2br(htmlspecialchars($_POST['content'])) ?>
	</p>
</div>

<div id="form-edition">
	<form method="POST" >
      <input id="title-edition" type="text" name="title" value="<?= $_POST['title']?>"/><br/>
      <textarea id="content-edition" name="content" value="<?= $_POST['content']?>"></textarea><br/>
      <input type="submit" value="Enregistrer" id="button-edit-post" />
    </form>
</div>

<?php $content = ob_get_clean(); 
require('template.php');
?>