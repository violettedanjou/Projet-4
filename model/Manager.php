<!-- Classe parente pour la classe PostManager et CommentManager (héritage)-->
<?php
//namespace Applications\MAMP\htdocs\Test_TP\TP_commentaires\Model;

class Manager
{
    private function dbConnect() // si on utilise "private", les fonctions filles dans PostManager et CommentManager n'auraient pas pu l'appeler. Le type protected est identique à private, mais il autorise quand même les classes filles à appeler la fonction. 
    {
        $db = new PDO('mysql:host=localhost;dbname=TP_commentaires;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}