<?php

// Chargement des classes
require_once('model/PostCommentManager.php'); // require_once permet de ne pas charger deux fois la classe
//require_once('model/CommentManager.php');


// PAGE INSCRIPTION
function afficheInscription()
{
	require('view/inscriptionView.php');
}
function insert()
{
	$PCManager = new PostCommentManager();
	$pseudoExist = $PCManager->verifyPseudo($_POST['pseudo']);
	$nbrResult = $pseudoExist->rowCount();
	if ($nbrResult == 0) {
		//echo "Le pseudo n'est pas encore utilisé.";
	    $PCManager = new PostCommentManager();
	    $newMember = $PCManager->insertMember($_POST['pseudo'], $_POST['pass'], $_POST['email']);
	    header('Location: index.php');	
	}
	else {
		echo "Le pseudo est déjà utilisé. Essayez autre chose.";
	}
}

//PAGE CONNEXION
function afficheConnection()
{
	require('view/connectionView.php');
}
function connect()
{
    $PCManager = new PostCommentManager();
    $connect = $PCManager->connectMember($_POST['pseudo']);
    $nbrResult = $connect->rowCount();
    if ($nbrResult == 1) {
    	$user = $connect->fetch();
    	$pass_hache = $user['pass'];
    	if (password_verify($_POST['pass'], $pass_hache)) {
        	$_SESSION['pseudo'] = $_POST['pseudo'];
       		header('Location: index.php');
    	}
    	else {
    		throw new Exception("Mauvais mot de passe. Veuillez réessayer.", 1);
    	}
    }
    else {
    	throw new Exception("L'utilisateur n'existe pas.", 1);	
    }
    header('Location: index.php');
}

//PAGE DECONNEXION
function disconnection() // Suppression des variables de session et de la session
{
	$_SESSION = array(); 
	session_destroy();
	header('Location: index.php');
}

// LISTE DES BILLETS
function listPosts()
{
    $postManager = new PostCommentManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction, getPosts(), dans cet objet

    require('view/listPostsView.php');
}
// 1 BILLET EN PARTICULIER 
function post()
{
    $postManager = new PostCommentManager();
    $commentManager = new PostCommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/postView.php');
}

// AJOUT DE COMMENTAIRE(S)
function addComment($postId, $author, $comment)
{
    $commentManager = new PostCommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

// PAGE ADMINISTRATEUR
function afficheAdmin() // Afficher la page d'administrateur
{
	$postManager = new PostCommentManager(); 
    $posts = $postManager->getPosts();

    require('view/adminView.php');
}
function afficheEdition() // Afficher formulaire pour ajout de nouveau billet 
{
	require('view/editionView.php');
}
function addPost() // Ajouter un nouveau billet
{
	$newPostManager = new PostCommentManager();
	$newPost = $newPostManager->addNewPost();

	require('view/listPostsView.php');
}



















