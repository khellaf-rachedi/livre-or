<?php

session_start();

include('bdd.php');

if (isset($_POST["submit1"])) {
    $login = htmlspecialchars($_POST['login']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);
    if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['password2'])) {
        $loginlengh = strlen($login);
        if ($loginlengh <= 255) {
            $reqlogin = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ?");
            $reqlogin->execute(array($login));
            $loginexist = $reqlogin->rowCount();
            if ($loginexist == 0) {
                if ($password == $password2) {
                    $insertutilisateurs = $bdd->prepare("INSERT INTO utilisateurs(login,password) VALUES(?, ?)");
                    $insertutilisateurs->execute(array($login,$password));
                    $erreur = "* Votre compte a bien été créé <a href=\"connexion.php\">Me connecter</a>";
                } else {
                    $erreur = "* Vos passwords ne correspondent pas";
                }
            } else {
                $erreur = "* Login déjà utilisé";
            }
        } else {
            $erreur = "* Votre login ne doit pas excéder 255 caractères !";
        }
    } else {
        $erreur = "* Tous les champs doivent être complétés";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>page d'inscription</title>
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
                <li>
                    <a href="inscription.php"><button>Inscription</button></a>
                </li>
                <li>
                    <a href="connexion.php"><button>Connexion</button></a>
                </li>
                <li>
                    <a href="https://github.com/khellaf-rachedi/livre-or/tree/main"><button>Github</button></a>
                </li>
            </ul>
        </section>
    </header>
<body class="background-inscription">
    <form class="form-connexion-inscription" method="POST">
        <div id="container">
            <img class="logo-formulaire" src="https://zupimages.net/up/21/47/b5rb.png">
            <h1 class="color-label">Inscription</h1>

            <label><b>Login</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="login" value=<?php if (isset($login)) {
            echo $login;
            } ?>>

            <label><b>Password</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password">

            <label><b>Password confirmation </b></label>
            <input type="password" placeholder="Confirmer le mot de passe" name="password2">

            <input type="submit" name="submit1" value="S'inscrire">
        </div>
    </form>
    <?php
    if (isset($erreur)) {
        echo '<b><font color="red" font size="5px">'. $erreur .'</font></b>';
    }
    ?>
        <footer>
        <div class="row">
            <div>
                <h3><a href="index.php">ACCUEIL</a></h3>
            </div>
            <div>
                <h3><a href="inscription.php">INSCRIPTION</a></h3>
            </div>
            <div>
                <h3> <a href="connexion.php">CONNEXION</a></h3>
            </div>
            <div>
                <h3> <a href="https://github.com/khellaf-rachedi/livre-or/tree/main">GITHUB</a></h3>
            </div>
        </div>
    </footer>
</body>

</html>