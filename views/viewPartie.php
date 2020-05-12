<?php
?>

<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <script type="text/javascript" src="js/Partie.js" ></script>
    <link rel="stylesheet" href="css/Partie.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('tbody').load('Partie&fonction=listePartie');
            });
    </script>
</head>
<body>
    <div id="partie">
        <h1>Liste des parties disponibles</h1>
        <br/><br/>
        <div class="ligne"></div>
        <span>Rejoindre une partie</span>
        <div class="ligne"></div>
        <table rules="col">
                <thead>
                <th>Nom</th>
                <th>Créateur</th>
                <th>Places</th>
                <th>Options</th>
                </thead>
                <tbody>

                </tbody>

        </table>
    </div>
    <div id="div_creer">
        <h2>Vous n'êtes pas Satistfait ?</h2>
        <a href="CreationPartie"><button id="but_creer">Créer Votre Partie</button></a>
    </div>
</body>
</html>
