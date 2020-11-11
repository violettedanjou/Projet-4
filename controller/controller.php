<?php

// Chargement des classes
require_once('model/PostCommentManager.php'); // require_once permet de ne pas charger deux fois la classe
//require_once('model/CommentManager.php');

function insert()
{
	$PCManager = new PostCommentManager();
	$pseudoExist = $PCManager->verifyPseudo($_POST['pseudo']);
	$nbrResult = $pseudoExist->rowCount();
	if ($nbrResult == 0) {
		echo "Le pseudo n'est pas encore utilisé.";
	    $PCManager = new PostCommentManager();
	    $newMember = $PCManager->insertMember($_POST['pseudo'], $_POST['pass'], $_POST['email']);		
	}
	else {
		echo "Le pseudo est déjà utilisé. Essayez autre chose.";
	}
}

function listPosts()
{
    $postManager = new PostCommentManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction, getPosts(), dans cet objet

    require('view/listPostsView.php');
}

function post()
{
    $postManager = new PostCommentManager();
    $commentManager = new PostCommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/postView.php');
}

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