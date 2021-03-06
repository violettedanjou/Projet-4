<?php
require_once("model/Manager.php");

class MemberManager extends Manager 
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
        $req = $db->prepare('SELECT pseudo, pass, id, admin FROM membres WHERE pseudo = :pseudo');
        $req->execute(array(
            'pseudo' => $pseudo));

        return $req;

    }
}