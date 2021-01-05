<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  		<script>tinymce.init({selector:'textarea'});</script>

        <title><?= $title ?></title>
        <link href="public/commentaires.css" rel="stylesheet" /> 
    </head>
     
    <body>
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
    </body>
</html>