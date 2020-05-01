<?php
//on se connecte a la BD
$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//on récupère toute les lignes de la table role
$allmsg = $bdd->query('SELECT * FROM role ORDER BY id ASC ');

//on parcours les lignes et on met en transparant
//tous les roles qui sont inscrit dans la BD
while($msg= $allmsg->fetch())
{
    $id = $msg['id'];
    echo '<script language="Javascript">
            var elmt =  document.getElementById("role"+'.$id.');
            elmt.style.opacity = 0.2;
           </script>';

}

?>