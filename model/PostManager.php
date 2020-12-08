<?php
require_once("model/Manager.php");

class PostManager extends Manager 
{
    // PAGE LISTE DES BILLETS 
    public function getPosts() // récupération des billets
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM billets ORDER BY creation_date DESC LIMIT 0, 10');

        return $req;
    }
    // PAGE D'UN BILLET AVEC SES COMMENTAIRES
    public function getPost($postId) // récupération d'un billet grace à son id
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM billets WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
    // PAGE ADMINISTRATEUR
    public function addNewPost($title, $content) // ajout d'un nouveau billet
    {
       $db = $this->dbConnect();
       $newPost = $db->prepare('INSERT INTO billets(title, content, creation_date) VALUES (:title, :content, NOW())');
       $addNewPost = $newPost->execute(array(
            'title' => $title,
            'content' => $content));

       return $addNewPost;
    }
    public function editPost($postId) // récupération d'un billet pour le modifier 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS edit_post FROM billets WHERE id = ?');
        $req->execute(array($postId));
        $editPost = $req->fetch();

        return $editPost;
    }
    public function modifPost($id, $title, $content) // modification d'un  billet
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE billets SET title = ?, content = ?, creation_date = NOW() WHERE id = ?');
        $req->execute(array($title, $content, $id));

        return $req;
    }
    public function deletePost($postId) // supprimer un billet
    {
        $db = $this->dbConnect();
        $delete = $db->prepare('DELETE FROM billets WHERE id = ?');
        $delete->execute(array($postId));

        return $delete;
    }
}	