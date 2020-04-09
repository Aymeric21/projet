<?php
session_start();

if($_SESSION['pseudo'])
{
    echo "Bienvenue " . $_SESSION['pseudo'] . " sur le Serious Game</br>
    <a href='deconnexion.php'>Se Deconnecter</a>";
}else header("Location:formulaire_connexion.php")
?>
