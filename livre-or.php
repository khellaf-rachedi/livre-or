<?php
session_start();
include('bdd.php');
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css.css">
    <title>Livre d'or</title>
</head>

<body>
    <header>
    <section>
        <article>
            <img class="logo-ariane" src="https://zupimages.net/up/21/47/b5rb.png" alt="logo accueil" />
        </article>
        <ul class="navbar">
            <li>
                <a href="index.php"><button>Accueil</button></a>
            </li>
            <?php
            if (isset($_SESSION['id'])) {
            ?>
                <li>
                    <a href="editionprofil.php"><button>Modifier mon profil</button></a>
                </li>
                <li>
                    <a href="commentaire.php"><button>Laisser un commentaire</button></a>
                </li>
                <li>
                    <a href="livre-or.php"><button>Livre d'or</button></a>
                </li>
                <li>
                    <a href="deconnexion.php"><button class="bouton-deconnexion">Me déconnecter</button></a>
                </li>
            <?php
            }
            ?>
            <li>
                <a href="https://github.com/khellaf-rachedi/livre-or"><button>Github</button></a>
            </li>
        </ul>
    </section>

</header>
    <main class="centrer-historique">
    <h1 class="titre-livre">HISTORIQUE DES COMMENTAIRES</h1> </br>;

            <?php
            $requete = $bdd->prepare ("SELECT *, DATE_FORMAT(date,'%d/%m/%Y')  FROM `commentaires` INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY date DESC");
            $requete->execute();;
            $commentaires = $requete->fetchAll();
            foreach ($commentaires as $commentaire) {
               
                echo "<table>
                <div class='tab'>
                <table>
                <tr>
                  <th>Date</th>
                  <th>Pseudo</th> 
                  <th>Commentaires</th>
                </tr>
                <tr>
                  <td>".$commentaire['date']."</td>
                  <td>".$commentaire['login']."</td>
                  <td>".$commentaire['commentaire']."</td>
                </tr>
              
               
              </table>
               
            </table>
            <div>";
            
            }

       ?>
    <button class= "comm"><a  href="commentaire.php">Ajouter un commentaire</a></button> 
    </main>
    <footer>
    </footer>


</body>

</html>