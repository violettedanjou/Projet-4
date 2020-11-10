<?php $title = "Inscription";

ob_start(); ?>

<h1>Inscription</h1>

<form action="index.php?action=inscriptionForm" method="post">
	<label for="pseudo">Pseudo :</label><input type="text" name="pseudo" required /><br/>
	<label for="pass">Mot de passe :</label><input type="password" name="pass" required /><br/>
	<label for="pass_confirm">Confirmation du mot de passe :</label><input type="password" name="pass_confirm" required /><br/>
	<label for="email">Adresse email :</label><input type="email" name="email" required /><br/>
	<input type="submit" name="inscription" value="S'inscrire">
</form>

<?php $content = ob_get_clean(); 
require('template.php'); //grace à cette instruction on va pouvoir avoir notre menu sur toutes les pages de notre site
?>