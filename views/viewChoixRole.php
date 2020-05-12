<?php

?>

<html>
<head>
    <meta charset="utf-8" />
   <?php //<META HTTP-EQUIV="Refresh" CONTENT="5; URL=choixRole"> ?>

    <title></title>
    <script type="text/javascript" src="js/ChoixRole.js?t=<? echo time(); ?>media="all"></script>
    <link rel="stylesheet" href="css/ChoixRole.css?t=<? echo time(); ?>media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        setInterval(function(){
            $('#php').load('views/role.php')
        },100);
        setInterval(function(){
            $('#lancement').load('AffectationRole')
        },120);
    </script>
</head>
<body>
    <div id="contenu">


        <div id="divChoix">
            <h1>Choisissez un rôle </h1>
            <div id="role1" onclick="validRole1()"> <img src="images/maitre.png" alt="MDJ"> </div>
            <div id="role2" onclick="validRole2()"> <img src="images/pompier.jpg" alt="COS"> </div>
            <div id="role3" onclick="validRole3()"> <img src="images/CRRA.jpg" alt="CRRA"> </div>
            <div id="role4" onclick="validRole4()"> <img src="images/medecin.jpg" alt="DSM"> </div>
            </br></br>
            <div id="role5" onclick="validRole5()"> <img src="images/evac.png" alt="EVAC"> </div>
            <div id="role6" onclick="validRole6()"> <img src="images/COPG.jpg" alt="COPG"> </div>
            <div id="role7" onclick="validRole7()"> <img src="images/triage.svg" alt="TRIAGE"> </div>

            <div id="validation">

            </div>
        </div>


        <div id="lancement">
        </div>
            <p id="idc"> </p>

        <div id="php">

        </div>
    </div>

</body>
</html>

