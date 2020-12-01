<?php
require_once("model/Manager.php");

class PostCommentManager extends Manager 
{
    // PAGE INSCRIPTION
    public function insertMember($pseudo, $pass, $email) // inscription
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
        $req->execute(array(
            'pseudo' => $pseudo,
            'pass' => password_hash($pass, PASSWORD_DEFAULT),
            'email' => $email));
    }
    public function verifyPseudo($pseudo) // Vérification du pseudo existant
    {
        $db = $this->dbConnect();
        $req = $db->query("SELECT pseudo FROM membres WHERE pseudo = '" . $pseudo . "'"); 
        $req->execute();

        return $req;
    }

    //PAGE CONNEXION
    public function connectMember($pseudo) //  Récupération de l'utilisateur déjà inscrit 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo, pass, id FROM membres WHERE pseudo = :pseudo');
        $req->execute(array(
            'pseudo' => $pseudo));

        return $req;

    }

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
    public function getComments($postId) // récupération des commentaires d'un billet
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaires WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }
    public function postComment($postId, $comment) // ajout d'un commentaire pour un billet 
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO commentaires(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
    public function reportComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO commentaires(report) VALUES(?)');
        $req->execute(array($id));

        return $req;
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
