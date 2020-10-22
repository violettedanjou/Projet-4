<?php
function getBillets()
{
	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=TP_commentaires;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

	$req = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM billets ORDER BY creation_date DESC LIMIT 0, 5');

	return $req;
}
?>