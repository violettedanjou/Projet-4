<?php $title = "Modification de billet"; 

ob_start(); ?>

<h1>Modification</h1>
	<a href="index.php?action=afficheAdmin">
		<p>Retour</p>
	</a>

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

	<form method="POST" >
      <input type="text" name="title" placeholder="Titre du billet" value="<?= $_POST['title']?>" /><br/><br/>
      <textarea name="content" placeholder="Contenu du billet..."></textarea><br/>
      <input type="submit" value="Enregistrer" />
    </form>

<?php $content = ob_get_clean(); 
require('template.php');
?>