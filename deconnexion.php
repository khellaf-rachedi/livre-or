<?php
include('bdd.php');
session_start();
$_SESSION = array();
session_destroy();
header("Location: connexion.php");
?>