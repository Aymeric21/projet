<?php
if(isset($_POST['elmt']))
{
    echo "<br><br><br><br><br>";
}

?>

<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <script type="text/javascript" src="js/MaitreDuJeu.js?t=<? echo time(); ?>media="all"" ></script>
    <link rel="stylesheet" href="css/MaitreDuJeu.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        setInterval(function(){
            $('#time').load('views/time.php');
        },1000);

        // Pour éviter le chargement de la page
        //Quand on clique sur les bouton pause et reprendre
        $(document).ready(function () {
            $("#form_pause").submit(function(event) {
                event.preventDefault();  // Empêcher le rechargement de la page.

                var elmt = $('#bouton_pause')
                $.ajax({
                    type: "POST",
                    url: "MaitreDuJeu",
                    data: elmt,
                });
            });
            $("#form_reprendre").submit(function(event) {
                event.preventDefault();  // Empêcher le rechargement de la page.

                var elmt = $('#bouton_reprendre');
                $.ajax({
                    type: "POST",
                    url: "MaitreDuJeu",
                    data: elmt,
                });
            });

            $("#form_lancer").submit(function(event) {
                event.preventDefault();  // Empêcher le rechargement de la page.

                var elmt = $('#lancer');
                $.ajax({
                    type: "POST",
                    url: "MaitreDuJeu",
                    data: elmt,
                });
                $("#div_lancer").remove();

            });

        });
    </script>
</head>

<body>
    <div id="div_maitre">
        <h1 id="titre">Maitre Du Jeu</h1>
    </div>
    <div id="div_lancer">
        <form  method="POST" id="form_lancer">
            <input type="submit" name="lancer" id="lancer" value="Lancer la partie !">
        </form>
    </div>
    <div id="div_info">
        <h2 class="titre_info">Informations générales sur la partie </h2>
        <div id="div_temps">
            <h3 class="h3_info">Durée restant de la simulation</h3>
            <p id="time"></p>
        </div>
        <div id="div_pause">
            <h3 class="h3_info">Mettre le jeu en pause </h3>
            <form   method="POST" id="form_pause" >
                <input type="submit" name="bouton_pause"  value="Pause" id="bouton_pause" onclick=" return p()" >
            </form>
            <form  method="POST"  id="form_reprendre" >
                <input type="submit" name="bouton_reprendre"  value="Reprendre" id="bouton_reprendre" onclick=" return r()">
            </form>

        </div>
    </div>

    <div id="div_action">
        <h2 class="titre_info">Débloquer une action pour la partie</h2>
        <div id="div_police">
            <h3>Ajouter un vehicule pour les </br> policiers</h3>
            <p id="time"></p>
        </div>
        <div id="div_pompier">
            <h3>Ajouter un véhicule pour les</br> pompiers</h3>


        </div>
    </div>



</body>
</html>

