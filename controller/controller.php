<?php
// Chargement des classes
require_once('model/PostManager.php'); // require_once permet de ne pas charger deux fois la classe
require_once('model/CommentManager.php');
require_once('model/MemberManager.php');


// PAGE INSCRIPTION
function afficheInscription()
{
	require('view/inscriptionView.php');
}
function insert()
{
	$PCManager = new MemberManager();
	$pseudoExist = $PCManager->verifyPseudo($_POST['pseudo']);
    
	$nbrResult = $pseudoExist->rowCount();
	if ($nbrResult == 0) {
	    $PCManager = new MemberManager();
	    $newMember = $PCManager->insertMember($_POST['pseudo'], $_POST['pass'], $_POST['email']);
	    header('Location: index.php');	
	}
	else {
		throw new Exception("Le pseudo est déjà utilisé. Essayez autre chose.", 1);
	}
}



//PAGE CONNEXION
function afficheConnection()
{
	require('view/connectionView.php');
}
function connect()
{
    $PCManager = new MemberManager();
    $connect = $PCManager->connectMember($_POST['pseudo']);
    $nbrResult = $connect->rowCount();
    if ($nbrResult == 1) {
    	$user = $connect->fetch();
    	$pass_hache = $user['pass'];
    	if (password_verify($_POST['pass'], $pass_hache)) {
    		$_SESSION['id'] = $user['id'];
        	$_SESSION['pseudo'] = $_POST['pseudo'];
        	$_SESSION['admin'] = $user['admin'];
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
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction, getPosts(), dans cet objet

    require('view/listPostsView.php');
}



// 1 BILLET EN PARTICULIER 
function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->pseudoAuthor($_GET['id']);

    require('view/postView.php');
}



// AJOUT DE COMMENTAIRE(S)
function addComment($postId, $comment)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postComment($postId, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}



// SIGNALER UN COMMENTAIRE 
function report()
{
	$reportManager = new CommentManager();
	$report = $reportManager->reportComment($_GET['id']);

	header('Location: index.php?action=post&id='. $_GET['post_id']);
}



// PAGE ADMINISTRATEUR
function afficheAdmin() // Afficher la page d'administrateur
{
	$postManager = new PostManager(); 
    $posts = $postManager->getPosts();

    $adminManager = new CommentManager();
	$admin = $adminManager->reportAdmin();

    require('view/adminView.php');
}

function afficheEdition() // Afficher formulaire pour ajout de nouveau billet 
{
	require('view/additionView.php');
}

function addPost() // Ajouter un nouveau billet
{
	$newPostManager = new PostManager();
	$newPost = $newPostManager->addNewPost($_POST['title'], $_POST['content']);

	header('Location: index.php?action=afficheAdmin');
}

function editPosts() // récupération d'un billet pour le modifier
{
	
	$editManager = new PostManager();
    $edit = $editManager->editPost($_GET['id']);

    require('view/editionView.php');
}

function savePosts() // modification d'un  billet
{
	$saveManager = new PostManager();
	$save = $saveManager->modifPost($_POST['id'], $_POST['title'], $_POST['content']);

	header('Location: index.php?action=afficheAdmin');
}

function delete() // Supprimer un billet
{
	$deleteManager = new PostManager();
    $delete = $deleteManager->deletePost($_GET['id']);

	header('Location: index.php?action=afficheAdmin');
}

function deleteReport() // Retirer le signalement
{
	$removeManager = new CommentManager();
    $remove = $removeManager->removeReport($_GET['id']);

	header('Location: index.php?action=afficheAdmin');
}

function deleteComment() // Supprimer un commentaire signalé
{
	$deleteManager = new CommentManager();
    $delete = $deleteManager->deleteCommentReport($_GET['id']);

	header('Location: index.php?action=afficheAdmin');
}


















