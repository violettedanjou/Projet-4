<?php
require('controller/controller.php');
session_start();
/*if (isset($_SESSION['pseudo'])) {
    echo "Bonjour " . $_SESSION['pseudo'];
}*/

try {
    if (isset($_GET['action'])) {

// PAGE INSCRIPTION
        if ($_GET['action'] == 'afficheInscription') { // on affiche le formulaire
            afficheInscription();        
        }
        elseif ($_GET['action'] == 'validInscription') { // on traite le formulaire 
            if ((isset($_POST['pseudo']) AND (strlen($_POST['pseudo']) != 0))) {

                if ((isset($_POST['pass']) == isset($_POST['pass_confirm']))) {

                    if ((isset($_POST['email']))) {
                        $_POST['email'] = htmlspecialchars($_POST['email']);
                
                        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) {
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

// PAGE CONNEXION
        if ($_GET['action'] == 'validConnection') {

            if (isset($_POST['pseudo']) AND isset($_POST['pass'])) {
                connect(); // mdp ok avec mdp de la bdd donc on appelle fonction connect()
            }
            else {
                throw new Exception("Veuillez entrer votre pseudo.", 1);
            }   
        }
        elseif ($_GET['action'] == 'afficheConnection') {
            afficheConnection();
        }
// PAGE DECONNEXION 
        // PAGE DECONNEXION 
        if ($_GET['action'] == 'validDeconnexion') {
            disconnection();    
        }

// BILLETS 
        elseif ($_GET['action'] == 'listPosts') {
            listPosts(); //affiche la listes des billets
        }
        elseif ($_GET['action'] == 'post') { // afficher un billet 
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                    post();             
            }
            else {
                throw new Exception("Aucun identifiant de billet envoyé", 1);   
            }
        }


        elseif ($_GET['action'] == 'addComment') { // ajouter un commentaire
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
                    if (!empty($_POST['comment'])) {
                        addComment($_GET['id'], $_POST['comment']);
                    }
                    else {
                        throw new Exception("Tous les champs ne sont pas remplis");
                    }
                }
                else {
                    throw new Exception("Veuillez vous connecter pour ajouter un commentaire.", 1);
                }
            }
            else {
                throw new Exception("Aucun identifiant de billet envoyé");
            }
        }

        elseif ($_GET['action'] == 'validReport') { // signaler un commentaire
                    report();
                    echo "Commentaire signalé";
        }

// ADMIN
        if ($_GET['action'] == 'afficheAdmin') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
                afficheAdmin();
            }
            else {
                throw new Exception("Cette partie est réservée à l'administrateur", 1);
            } 
        }
        // Ajouter un nouveau billet
        if ($_GET['action'] == 'validNewPost') {

            if (isset($_POST['title']) AND isset($_POST['content'])) {
                addPost();
            }
            else {
                throw new Exception("Veuillez ajouter un nouveau billet.", 1);
            } 
        }
        elseif ($_GET['action'] == 'afficheNewPost') {
            afficheEdition();
        }
        // Modfier un billet
        elseif($_GET['action'] == 'afficheEdition') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                editPosts();
            }
            else {
                throw new Exception("Aucun identifiant de billet envoyé.", 1);
            } 
        }
        elseif ($_GET['action'] == 'validEdition') {
            if (isset($_POST['id']) && (isset($_POST['title'])) && (isset($_POST['content']))) {
                savePosts();
            }
        }
        // Supprimer un billet
        elseif ($_GET['action'] == 'validDelete') {
            if (isset($_GET['id']) && $_GET['id'] > 0) { 
                delete();
            }    
        }
        // Retirer le signalement d'un commentaire
        elseif ($_GET['action'] == 'deleteReport') {
            if (isset($_GET['id']) && $_GET['id'] > 0) { 
                deleteReport();
            }
        }
        // Supprimer un commentaire signalé
        elseif ($_GET['action'] == 'deleteComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) { 
                deleteComment();
            } 
        }
    }
    else {
        listPosts();
    }
}
catch(Exception $e) {
    echo "Erreur : " . $e->getMessage();
}










