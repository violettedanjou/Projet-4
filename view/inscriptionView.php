<?php $title = "Inscription";

ob_start(); ?>

<h1>INSCRIPTION</h1>
<div id="form-inscription">
	<form action="index.php?action=validInscription" method="post">
		<label for="pseudo">Pseudo :</label><input type="text" name="pseudo" class="input-inscription" /><br/>
		<label for="pass">Mot de passe :</label><input type="password" name="pass" class="input-inscription"/><br/>
		<label for="pass_confirm">Confirmation du mot de passe :</label><input type="password" name="pass_confirm" class="input-inscription"/><br/>
		<label for="email">Adresse email :</label><input type="email" name="email"  class="input-inscription"/><br/>
		<input type="submit" name="inscription" value="S'inscrire" id="button_signup">
	</form>
</div>
<?php $content = ob_get_clean(); 
require('template.php'); // grace à cette instruction on va pouvoir avoir notre menu sur toutes les pages de notre site
?>