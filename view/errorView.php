<?php $title = "Erreur";

ob_start(); ?>

<div id="div-error">
	<?php 
	echo "" . $e->getMessage();
	?> 
	<br/>
	<a href="index.php" id="btn_return_connection_page">
		<i class="fas fa-arrow-left"></i>Retour
	</a>
</div>

<?php 
$content = ob_get_clean(); 
require('template.php');
?>