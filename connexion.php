<?php
session_start();
include('bdd.php');
if(isset($_SESSION['login'])){
    header("Location: profil.php");
    die();
}
include('bdd.php');

if (isset($_POST['submit2'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = sha1($_POST['password']);
    if (!empty($login) && !empty($password)) {
        $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? && password= ? ");
        $requser->execute(array($login, $password));
        $userexist = $requser->rowCount();
        if ($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['login'] = $userinfo['login'];
            header("Location: profil.php?id=" . $_SESSION['id']);
        }
        else {
            $erreur = "* Login inexistant ou password incorrect ";
        }
    } else {
        $erreur = "* Tous les champs doivent être complétés";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>page de connexion</title>
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
<body class="background-connexion">
    <form class="form-connexion-inscription" method="POST">
        <div id="container">
            <img class="logo-formulaire" src="https://zupimages.net/up/21/47/b5rb.png">
            <h1 class="color-label">Connexion</h1>

            <label class="color-label"><b>Login</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="login">

            <label class="color-label"><b>Password</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password">

            <input type="submit" name='submit2' value='LOGIN'>
            </form>
            <?php
            if (isset($erreur)) {
                echo '<font color="red" font size="5px"><b>'. $erreur .'</b></font>';
            }
            ?>
        </div>
    </form>

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