<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <title><?= $title ?></title>
        <link href="public/commentaires.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <header>
		    	<div>
		    		<a href="index.php">
						<img id="logo" src="public/logoBlog.png" alt="Logo du blog"/>
					</a>
				</div>
				
				<nav>
					<ul>
						<?php 
						if(isset($_SESSION['pseudo'])) {
						?>	
						<li class="li" id="button_deconnexion"><a href="index.php?action=validDeconnexion">Déconnexion</a></li>
						<?php 
						 
						}
						else {
						?> 
							<li class="li" id="button_inscription"><a href="index.php?action=afficheInscription">Créer un compte</a></li>
							<li class="li" id="button_connexion"><a href="index.php?action=afficheConnection">Connexion</a></li>
							<li class="li" id="button_admin"><a href="index.php?action=afficheAdmin">Administrateur</a></li>

							<?php
						}?>
					</ul>
				</nav>
		</header>
		<?= $content ?>
    </body>
</html>