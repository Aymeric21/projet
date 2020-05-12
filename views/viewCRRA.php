<?php
?>

<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <script type="text/javascript" src="CRRA.js" ></script>
    <link rel="stylesheet" href="css/CRRA.css?t=<? echo time(); ?>media="all"">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        setInterval(function(){
            $('#time').load('views/time.php');
        },1000);
        setInterval(function(){
            $('#tab_body').load('CRRA&fonction=recapitulatif');
        },3000);
        setInterval(function(){
            $('#bilan').load('CRRA&fonction=bilan');
        },3000);
    </script>
</head>
<body>
    <div id="time">

    </div>
    <div id="crra">
        <h1 id="titre">CRRA</h1>

        <table id="bilan">

        </table>
        <table id="tableSymptomes">
            <thead>
            <tr>
                <th>SINUS</th>
                <th>Catégorie</th>
                <th>Sexe</th>
                <th>Age</th>
                <th>Vecteur</th>
                <th>Destination</th>
            </tr>
            </thead>
            <tbody id="tab_body">

            </tbody>
        </table>

    </div>
</body>
</html>

