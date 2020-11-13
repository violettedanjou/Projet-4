<?php $title = "Connexion"; 

ob_start(); ?>

<h1>Page de connexion</h1>

<form action="index.php?action=pageConnection" method="post">
    <label for="pseudo">Pseudo :</label><input type="text" name="pseudo" required /><br/>
    <label for="pass">Mot de passe :</label><input type="password" name="pass" required /><br/>
    <label for="login_auto">Connexion automatique :</label><input type="checkbox" name="login_auto"><br/>
    <input type="submit" name="connexion" value="Se connecter">
</form>

<?php $content = ob_get_clean(); 
require('template.php');
?>