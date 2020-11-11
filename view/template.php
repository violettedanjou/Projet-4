<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
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
					<li class="li" id="button_inscription"><a href="index.php?action=inscriptionForm">Créer un compte </a></li>
					<li class="li" id="button_connexion"><a href="#connexion">Connexion</a></li>
					<li class="li" id="button_deconnexion"><a href="#deconnexion">Déconnexion</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<?= $content ?>
    </body>
</html>