<?php
require('controller/controller.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'inscriptionForm') {
            require('view/inscriptionView.php');

            if ((isset($_POST['pseudo']) AND (strlen($_POST['pseudo']) != 0))) {
                echo "Pseudo présent. ";

                if ((isset($_POST['pass']) == isset($_POST['pass_confirm']))) {
                    echo "Mots de passes identiques. ";

                    if ((isset($_POST['email']))) {
                        $_POST['email'] = htmlspecialchars($_POST['email']);
                
                        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) {
                            echo 'L\'adresse ' . $_POST['email'] . ' est <strong>valide</strong> ! ';

                            insert();
                        }
                        else {
                            throw new Exception("L'adresse email n'est pas valide, recommencez. ", 1);
                        }   
                    }
                    else {
                        throw new Exception("Veuillez entrer une adresse email. ", 1);
                    }
                }
                else {
                    throw new Exception("Mots de passe différents. ", 1);
                }
            }
            else {
                throw new Exception("Veuillez saisir un pseudo. "); 
            }   
        }

        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception("Aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception("Tous les champs ne sont pas remplis");
                }
            }
            else {
                throw new Exception("Aucun identifiant de billet envoyé");
            }
        }
    }
    else {
        listPosts();
    }
}
catch(Exception $e){
    echo "Erreur : " . $e->getMessage();
}