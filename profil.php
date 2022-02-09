<?php
session_start();
include('bdd.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>page de profil</title>
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
            if (isset($_SESSION['id']) && $userinfo['id'] == $_SESSION['id']) {
            ?>
                <li>
                <a href="editionprofil.php"><button>Modifier mon profil</button></a>
                </li>
                <li>
                <a href="deconnexion.php"><button class="bouton-deconnexion">Me déconnecter</button></a>
                </li>
                <?php
            }
            ?>
                <li>
                    <a href="#"><button>Github</button></a>
                </li>
            </ul>
        </section>
    </header>

    <body class="background-profil">
        <div id="container">
            <h1>Profil de <?php echo $userinfo['login']; ?></h1>
            Login : <?php echo $userinfo['login']; ?>
            <br />

            <?php
            if (isset($_SESSION['id']) && $userinfo['id'] == $_SESSION['id']) {
            ?>
                </br>

                <a class="lien-profil" href="editionprofil.php">Modifier mon profil</a>
                </br>
                <a class="lien-profil" href="deconnexion.php">Me déconnecter</a>
            <?php
            }
            ?>
        </div>
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
}
?>