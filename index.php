<?php
session_start();
include('bdd.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title> Accueil module de connexion </title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
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
                <?php if(!(isset($_SESSION['login']))){  #si la session utilisateur n'existe pas on affiche seulement les boutons pour les pages inscription et connexion# 
                echo"
                <li>
                    <a href=\"inscription.php\"><button>Inscription</button></a>
                </li>
                <li>
                    <a href=\"connexion.php\"><button>Connexion</button></a>
                </li>";

                }
                else{ #sinon si la session utilisateur existe, que l'utilisateur est connecté, on affiche les boutons profil et modifier profil, et il pourra se déconnecter#
                    echo"<li>
                    <a href=\"profil.php?id=".$_SESSION['id']."\"><button>Profil</button></a>
                </li>
                <li>
                <a href=\"editionprofil.php?\"><button>Modifier mon profil</button></a>
                </li>
                <li>
                <a href=\"livre-or.php?\"><button> Livre d'or</button></a>
                </li>
                <li>
                <a href=\"commentaire.php?\"><button> Laisser un commentaire</button></a>
                </li>
                <li>
                    <a href=\"deconnexion.php\"><button class=\"bouton-deconnexion\">Deconnexion</button></a>
                </li>";
                ;
                }
                ?>
                
                <li>
                    <a href="#"><button>Github</button></a>
                </li>
            </ul>
        </section>
    </header>
        <h1 class="titre-accueil">Bienvenue sur le Ariane Club</h1>
        </br>
        <div>
        <video width="1500" height="440" autoplay loop muted controls>
            <source src="https://www.ariane.group/wp-content/themes/ariane-parent/library/video/newsletter/push_newsletter_ribbon.mp4" type="video/mp4">
            </div>
        </br>
            <div class="flex-images">
                <img src="https://zupimages.net/up/21/48/txkn.jpg" width="600" height="400" alt="fusée 1">
                <img src="https://zupimages.net/up/21/47/4ow6.jpg" width="600" height="400" alt="fusée 2">
                <img src="https://zupimages.net/up/22/06/vt9z.jpg" width="600" height="400" alt="fusée 3">
                <img src="https://zupimages.net/up/22/06/3hg1.jpg" width="600" height="400" alt="fusée 4">
            </div>
            <h1 class="titre-accueil">Fusées Ariane Kourou/Espace</h1>
    <footer>
        <div class="row">
            <div>
                <h3><a href="index.php">ACCUEIL</a></h3>
            </div>
            <div>
                <h3> <a href="https://github.com/khellaf-rachedi/livre-or">GITHUB</a></h3>
            </div>
        </div>
    </footer>
</body>

</html>