<?php
session_start();

//afin de vérifier à chaque fois
//qu'un utilisteur s'est bien connecté
if(!isset($_SESSION['pseudo']))
{
    header('Location:connexion');
}

$pseudo = $_SESSION['pseudo'];

//variable qui va nous servir
//pour que l'utilisateur puisse valider qu'une seul fois
//on se connecte a la BD
$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//si l'utilisateur appuie sous le bouton valider
//et si un id a été envoyer dans lurl
if(isset($_GET['id']) && isset($_GET['role']) && isset($_POST['clique']))//faire aussi si on a cliquer sur le bouton valider
{

        //on récupère l'id et le role
        $id = $_GET['id'];
        $role = $_GET['role'];

        //on insere une table dans la BD role
        //avec l'id correspondant
        $insert = $bdd->prepare('INSERT INTO role(id,role,pseudo) VALUES(?,?,?)');
        $insert->execute(array($id,$role,$pseudo));


}
//pour regarder si le joueur a deja choisis un role on prend sa variable de session
//on la met dans la BD puisu au moment ou il clique on fait un if on regarde si la variable de session pseudo
//est deja inscrite dans la bd, si tel est le cas on envoie un message que il a deja choisis un role.

//si tous le monde a choisis son rôle
//on lance le compte à rebours et on redirige les joueurs sur la vue
//en fonction du role qu'ils ont choisis

$allrole = $bdd->query('SELECT * FROM role ORDER BY ordre ASC ');
$JoueursRestant = 7 - $allrole->rowCount();

if(isset($_GET['lance']))
{
    //on prend la variable de session et on regarde le role correspondant dans la BD
    $role = $bdd->query("SELECT role FROM role WHERE pseudo='$pseudo'");

    header("Location:".$role->fetch()[0]);
}

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
            <p id="idc"> rgr</p>
        <?php
        //quand tous les joueurs ont choisis leur role
        //on lance le Compte a rebours
        //et envoie une variale url en get que l'on pourra reprendre en php
        //pour envoyer chaque joueur a sa vue ensuite
        echo "<script type='text/javascript'>
                    var n=10;
                    function car(){
                            document.getElementById('idc').innerHTML=n--;
                            if (0<=n) setTimeout(car,1000);
                            else {n=0;document.getElementById('idc').innerHTML=0;}
                            if (n==0)
                                {
                                      document.location.href=\"Choixrole&lance=1\"; 

                                }
                    }
                    car();
                  </script>";
        ?>


        <div id="php">

        </div>
    </div>

</body>
</html>

