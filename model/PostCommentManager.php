<?php
require_once("model/Manager.php");

class PostCommentManager extends Manager 
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM billets ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM billets WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaires WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO commentaires(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    } 
    
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
}