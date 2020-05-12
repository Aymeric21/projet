<?php
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Index</title>
    <link rel="stylesheet" href="css/template.css?t=<? echo time(); ?>media="all"">
</head>

<body>

<div id="menu">
    <ul id="ul_temp">
        <li id="li_accueil" ><a class="a_temp" href="accueil">Accueil</a></li>
        <li id="li_creer"><a class="a_temp" href="CreationPartie">Création de Parties</a></li>
        <li id="li_rejoindre"><a class="a_temp" href="Partie">Rejoindre une Partie</a></li>
        <li id="partieEnCours"><?php if(isset($_SESSION['partie'])){echo "Partie en cours: ". $_SESSION['partie'];} ?></li>
        <a class="a_temp" href="inscription"><li  class="buttons" >Inscription</li></a>
        <a class="a_temp" href="connexion"><li  class="buttons" >Connexion</li></a>
    </ul>

</div>


        <?= //c'est ca qui affiche sur la page
            $content
        ?>


</body>
</html>
