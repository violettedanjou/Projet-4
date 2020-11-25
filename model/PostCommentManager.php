<?php
require_once("model/Manager.php");

class PostCommentManager extends Manager 
{
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
        $requete = "SELECT pseudo FROM membres WHERE pseudo = '" . $pseudo . "'";
        $req = $db->query($requete); 
        $req->execute();
        return $req;
    }
    public function connectMember($pseudo) //  Récupération de l'utilisateur déjà inscrit 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo, pass, id FROM membres WHERE pseudo = :pseudo');
        $req->execute(array(
            'pseudo' => $pseudo));
        return $req;

    } 
    public function getPosts() // récupération des billets
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM billets ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

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

    public function postComment($postId, $author, $comment) // ajout d'un comment pour un billet 
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO commentaires(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    } 
    
    public function addNewPost($title, $content)
    {
       $db = $this->dbConnect();
       $newPost = $db->prepare('INSERT INTO billets(title, content, creation_date) VALUES (:title, :content, CURDATE())');
       $addNewPost = $newPost->execute(array(
            'title' => $title,
            'content' => $content));

       return $addNewPost;
    }











}