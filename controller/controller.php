<?php

// Chargement des classes
require_once('model/PostManager.php'); // require_once permet de ne pas charger deux fois la classe
require_once('model/CommentManager.php');

function insert()
{
	$MbManager = new MemberManager();
	$pseudoExist = $MbManager->verifyPseudo($_POST['pseudo']);
	$nbrResult = $pseudoExist->rowCount();
	if ($nbrResult == 0) {
		echo "Le pseudo n'est pas encore utilisé.";
	    $MbManager = new MemberManager();
	    $newMember = $MbManager->insertMember($_POST['pseudo'], $_POST['pass'], $_POST['email']);		
	}
	else {
		echo "Le pseudo est déjà utilisé. Essayez autre chose.";
	}

	require('inscriptionView.php');
}

function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction, getPosts(), dans cet objet

    require('view/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}