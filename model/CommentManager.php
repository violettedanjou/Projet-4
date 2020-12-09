<?php
require_once("model/Manager.php");

class CommentManager extends Manager 
{
    // PAGE D'UN BILLET AVEC SES COMMENTAIRES
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
        $affectedLines = $comments->execute(array($postId, $_SESSION['id'], $comment));

        return $affectedLines;
    }
    public function pseudoAuthor($author, $pseudo)
    {
    	$db = $this->dbConnect();
    	$pseudo = $db->prepare('SELECT c.author AS id_author, m.pseudo AS nom_author FROM membres m LEFT JOIN commentaires c ON c.author = m.pseudo');
    	$pseudo->execute(array($author, $pseudo));

    	return $pseudo;
    }
    public function reportComment($id)
    {
        $db = $this->dbConnect();
        $report = $db->prepare('UPDATE commentaires SET report = 1 WHERE id = ?');
        $report->execute(array($id));

        return $report;
    }
}