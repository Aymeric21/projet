<?php
session_start();
/*
 * Chronometre d'une heure l'insertion dans la bd doit
 * se faire avant d'arriver sur les vues
 */
$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


$reqmeaaff = $bdd->query('SELECT heure FROM jeu' );
while($meaaff = $reqmeaaff->fetch()) {

    $h_start = strtotime($meaaff['heure']);
    $h_end = $h_start - 3600 ;// car 3600 seconde est une heure
    $restant = $h_end - time();

    $_SESSION['time'] = $restant;

    echo "Temps restant : " . date("H", $restant) . "h" . date("i", $restant) . "mn" . date("s", $restant) . "s";
    /*echo $h_start." et le temps réel".time() , "\n";
    echo strtotime("now"), "\n";

    // prints the current time in date format
    echo date("Y-m-d", strtotime("now"))."\n";

    echo date('d-m-y H:i:s'),"\n";*/
}

?>


