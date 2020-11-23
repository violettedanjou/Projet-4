<?php $title = "Administration";

ob_start(); ?>

<h1>Administration</h1>

<?php $content = ob_get_clean(); 
require('template.php');
require('listPostsView.php');
?>