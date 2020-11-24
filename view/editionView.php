<?php $title = "Modification de billet"; 

ob_start(); ?>

<h1>Modification</h1>
	<form action="index.php?action=validEdition" method="POST" >
      <input type="text" name="postTitle" placeholder="Titre du billet"/> <br />
      <textarea name="article_contenu" placeholder="Contenu du billet..."></textarea> <br />
      <input type="submit" value="Enregistrer le billet" />
    </form>

<?php $content = ob_get_clean(); 
require('template.php');
?>