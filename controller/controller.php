<?php

require('model/model.php');

function listPosts()
{
    $posts = getPosts();

    require('view/listPostsView.php');
}

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('view/postView.php');
}

function addComment($postId, $author, $comment)
{
    $affectedLines = postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        //die('Impossible d\'ajouter le commentaire !');
        throw new Exception("Impossible d\'ajouter le commentaire !"); // on remplace le die par throw qui remontera une erreur, s'il y en a une, dans le catch du routeur
        
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}