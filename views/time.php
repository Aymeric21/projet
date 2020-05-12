<?php
session_start();

/*
 * Chronometre d'une heure l'insertion dans la bd doit
 * se faire avant d'arriver sur les vues
 */
$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


$reqmeaaff = $bdd->query('SELECT * FROM jeu' );
while($meaaff = $reqmeaaff->fetch()) {
    $calcul = strtotime($meaaff['heure_reprise']) - strtotime($meaaff['heure_pause']);

    if($meaaff['debut']=='false')
    {
        $_SESSION['time']=3600;
        echo "Temps restant : " . date("H", $_SESSION['time']) . "h" . date("i", $_SESSION['time']) . "mn" . date("s", $_SESSION['time']) . "s";
        //avant que la partie débute pour empecher a l'utilisateur
        // de jouer avant que la partie commance
            ?>
        <script language="JavaScript">
            $(document).ready(function(){
                $("#fond").show(50);$("#box2").show(500);
            });
        </script>
        <?php
    }
    else{
        if($meaaff['pause']=='true')
        {
            echo "Temps restant : " . date("H", $meaaff['seconde']) . "h" . date("i", $meaaff['seconde']) . "mn" . date("s", $meaaff['seconde']) . "s";

            //affiche sur l'écran de l'utilisateur que le jeu est en pause
            //le temps est arreter et il ne peut alors rien faire
            ?>
            <script language="JavaScript">
                $(document).ready(function(){
                    $("#fond").show(50);$("#box").show(500);
                });
            </script>
            <?php
        }else{
            $h_start = $meaaff['heure'];
            $h_end = ($h_start ) + 3600  ;// car 3600 seconde est une heure
            $restant = $h_end - time()  ;

            $_SESSION['time'] = $restant ;


            echo "Temps restant : " . date("H", $restant) . "h" . date("i", $restant) . "mn" . date("s", $restant) . "s";

            //enleve a l'ecran de l'utilisateur que le jeu est en pause
            ?>
            <script language="JavaScript">
                $("#fond").hide(500);$("#box").hide(500);$("#box2").hide(500);
            </script>
            <?php



        }


        /*echo $h_start." et le temps réel".time() , "\n";
        echo strtotime("now"), "\n";

        // prints the current time in date format
        echo date("Y-m-d", strtotime("now"))."\n";

        echo date('d-m-y H:i:s'),"\n";*/
    }
    }


?>


