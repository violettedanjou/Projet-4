<?php $title = "Ajout de billet"; 

ob_start(); ?>

<h1>Nouveau billet</h1>

<p id="btn_return_admin_page">
	<a href="index.php?action=afficheAdmin">
		<i class="fas fa-arrow-left"></i>Retour
	</a>
</p>

<div id="form-add-new-post">
	<form action="index.php?action=validNewPost" method="POST">
      <input type="text" name="title" placeholder="Titre du billet" class="input-add-new-post" id="title-add-new-post" /><br/>
      <textarea name="content" placeholder="Contenu..." class="input-add-new-post" id="content-add-new-post"></textarea><br/>
      <input type="submit" value="Enregistrer le billet" id="button-send-post" />
    </form>
</div>

<?php $content = ob_get_clean(); 
require('template.php');
?>