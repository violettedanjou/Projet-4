<!DOCTYPE html>
<html>
<head>
    <title>Super blog</title>
</head>
<body>
    <h1>Mon super blog !</h1>

    <p>
        Derniers billets du blog : <br/>
        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=TP_commentaires;charset=utf8', 'root', 'root', 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }

        $billets = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr  FROM billets ORDER BY date_creation DESC LIMIT 0,5');

        while ($donnees = $billets->fetch())
        {
        ?>
            <div class="news">
                <h3>
                    <?php echo htmlspecialchars($donnees['titre']); ?>
                    <em>le <?php echo $donnees['date_creation_fr']; ?></em>
                </h3>
                
                <p>
                <?php
                // On affiche le contenu du billet
                echo nl2br(htmlspecialchars($donnees['contenu']));
                ?>
                <br />
                <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
                </p>
            </div>
        <?php
        }
            $billets->closeCursor();
        ?>
    </p>
</body>
</html>