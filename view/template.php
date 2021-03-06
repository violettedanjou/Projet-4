<!DOCTYPE html>
<html lang="fr-fr">
    <head>
        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">  <!-- Police -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"> <!-- Icones -->
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> 
  		
        <meta property="og:site_name" content="Blog pour un écrivain">
        <meta property="og:image" content="https://static.actu.fr/uploads/2020/12/festival-livre-jeunesse-rouen.jpeg"> 

		<link href="public/style.css" rel="stylesheet" /> 
        <title><?= $title ?></title>
        
    </head>
     
    <body>
    	<div class="wrap">
	        <header>
			    	<div id="forteroche">
			    		<a href="index.php">
							JEAN FORTEROCHE
						</a>
					</div>
					
					<nav>
						<ul>
							<?php if(isset($_SESSION['pseudo'])) { ?>	
								<li class="li" id="button_deconnexion"><a href="index.php?action=validDeconnexion">DECONNEXION</a></li>

								<?php if($_SESSION['admin'] != 0) { ?>
									<li class="li" id="button_admin"><a href="index.php?action=afficheAdmin">ADMINISTRATION</a></li>
								<?php }
							}
							
							else { 
							?> 
								<li class="li" id="button_inscription"><a href="index.php?action=afficheInscription">CREER UN COMPTE</a></li>
								<li class="li" id="button_connexion"><a href="index.php?action=afficheConnection">CONNEXION</a></li>
							<?php }?>
						</ul>
					</nav>
			</header>
			
	    	<?= $content ?>
    	</div>

	    <footer>
	    	<p> Copyright © Violette Danjou - 2021. Tous droits réservés</p>
	    </footer>

	    <script>tinymce.init({selector:'textarea'});</script>
    </body>
</html>