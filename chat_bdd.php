<?php
session_start();
if($_SESSION['pseudo'])//POUR VERIFIER SI UN UTILISATEUR S'EST BIEN CONNECTER
{
    $pseudo = $_SESSION['pseudo'];
    $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    //vérifier qu'on a bien écrit un message et qu'on a cliquer sur le bouton envoyer
    if( isset($_POST['message']) AND !empty($_POST['message']))
    {
        $message = htmlspecialchars($_POST['message']);//fonction pour sécurité
        $insertmsg = $bdd->prepare('INSERT INTO chat(pseudo, message) VALUES(?,?)');
        $insertmsg->execute(array($pseudo, $message));
        echo json_encode('okay');
    }
}else header("Location:formulaire_connexion.php")

?>