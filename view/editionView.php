<?php $title = "Édition"; 

ob_start(); ?>

<h1>Édition</h1>
	<a href="index.php?action=afficheAdmin">
		<p>Retour</p>
	</a>

	<form action="index.php?action=validEdition" method="POST" >
      <input type="text" name="title" placeholder="Titre du billet"/><br/><br/>
      <textarea name="content" placeholder="Contenu du billet..."></textarea><br/>
      <input type="submit" value="Enregistrer le billet" />
    </form>

<?php $content = ob_get_clean(); 
require('template.php');
?>