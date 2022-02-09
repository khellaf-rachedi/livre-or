<?php
session_start();
include('bdd.php');

//    //SI SESSION EN COURS 
   if (isset($_SESSION['login'])) {
    $ssLogin = $_SESSION['login'];
    $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = '".$ssLogin."'");
    $requser->execute();
    $infoUser = $requser->fetchAll();

// echo "1";
if (isset($_POST['submit'])) {
    // echo "2";
    if (isset($_POST['commentaires'])) {
        $coment = $_POST['commentaires'];
        $iduser = $infoUser[0]["id"];
        // var_dump($iduser);
        $request = $bdd->prepare("INSERT INTO commentaires (`commentaire`, `id_utilisateur`, `date`) VALUES ('$coment','$iduser', NOW() )");
        $request->execute();
        echo "votre commentaire a été posté";
    } 
}
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>page de création de commentaires</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">

</head>
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

<body class="background-profil">
    <main>
        <form class="form-commentaire" action="#" method="POST">
            <label class="subtitle" for="msg">Ecrire votre commentaire: <?php $request ?></label>
            <textarea name="commentaires"></textarea>
            <input type="submit" name="submit" value="valider">
        </form>

    </main>

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
<?php
?>