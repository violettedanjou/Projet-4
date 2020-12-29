<?php
require_once("model/Manager.php");

class CommentManager extends Manager 
{
    public function postComment($postId, $comment) // ajout d'un commentaire pour un billet 
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO commentaires(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $_SESSION['id'], $comment));

        return $affectedLines;
    }
    public function pseudoAuthor($postId)
    {
    	$db = $this->dbConnect();
    	$pseudoComment = $db->prepare('SELECT membres.pseudo, commentaires.id, commentaires.comment, DATE_FORMAT(commentaires.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaires INNER JOIN membres ON commentaires.author = membres.id WHERE commentaires.post_id = ?');
    	$pseudoComment->execute(array($postId));

    	return $pseudoComment;
    }
    public function reportComment($id)
    {
        $db = $this->dbConnect();
        $report = $db->prepare('UPDATE commentaires SET report = 1 WHERE id = ?');
        $report->execute(array($id));

        return $report;
    }
    public function reportAdmin()
    {
    	$db = $this->dbConnect();
    	$req = $db->query('SELECT id, comment, report AS comment_report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM commentaires WHERE report = 1 ORDER BY creation_date_fr ASC');

    	return $req;
    }
    public function deleteCommentReport($postId)
    {
    	$db = $this->dbConnect();
        $deleteComment = $db->prepare('DELETE FROM commentaires WHERE id = ?');
        $deleteComment->execute(array($postId));

        return $deleteComment;
    }
}
