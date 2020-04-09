

<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" type="text/css"  href="css/ChoixRole.css?t=<? echo time(); ?>" media="all">
    <script type="text/javascript" src="js/ChoixRole.js" ></script>
</head>
<body>
    <div id="divChoix">
        <h1>Choisissez un rôle </h1>
        <div id="role1" onclick="validRole1()"> <img src="images/pompier.jpg" alt="COS"> </div>
        <a> <div id="role2" onclick="validRole2()"> <img src="images/CRRA.jpg" alt="CRRA"> </div></a>
        <div id="role3" onclick="validRole3()"> <img src="images/medecin.jpg" alt="DSM"> </div>
        </br></br>
        <div id="role4" onclick="validRole4()"> <img src="images/evac.png" alt="EVAC"> </div>
        <div id="role5" onclick="validRole5()"> <img src="images/COPG.jpg" alt="COPG"> </div>
        <div id="role6" onclick="validRole6()"> <img src="images/triage.svg" alt="TRIAGE"> </div>
    </div>
    <div id="validation">
        <a id="href" href="&id="> <button id="js" onclick="validation()">Valider</button> </a>
    </div>

    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    if(isset($_GET['id']))//faire aussi si on a cliquer sur le bouton valider
    {
        $id = $_GET['id'];

        $insert = $bdd->prepare('INSERT INTO role(id,role) VALUES(?,?)');
        $insert->execute(array($id,'rrr'));
    }
    $allmsg = $bdd->query('SELECT * FROM role ORDER BY id ASC ');
    while($msg= $allmsg->fetch())
    {
        $id = $msg['id'];
        echo '<script language="Javascript">
            var elmt =  document.getElementById("role"+'.$id.');
            elmt.style.opacity = 0.2;
           </script>';

    }

    ?>


</body>
</html>

