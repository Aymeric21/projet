<?php
?>

<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <script type="text/javascript" src="js/COPG.js"></script>
    <link rel="stylesheet" href="css/COPG.css"">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>

        setInterval(function(){
            $('#affiche_map').load('COS&fonction=cosAffiche');
        },5000);

        setInterval(function(){
            $('#img_police').load('COPG&fonction=ressources&police=0');
        },1000);

        setInterval(function(){
            $('#img_policier').load('COPG&fonction=ressources&police=1');
        },1000);


        $(document).ready(function() {
            var localisation ='';
            var ressource ='';

            //on clique sur une ressource on récupère son id
            $('#ressources > div').on('click', function () {
                ressource = $(this).attr('id');
            });

            //on clique sur la zone dans la map on récupère son id
            $('td').on('click', function () {
                //on recupere l'id de la localisation
                localisation = $(this).attr('id');
                // si la ressource n'a pas été choisis
                // message d'erreur
                if (ressource == '')
                {
                    alert('Aucune ressource choisis')
                }
                    //sinon requete pour mettre dans la bd
                //la ressource aec la position
                else {
                    $.ajax({
                        type: "POST",
                        url: "COPG&fonction=copgBDD",
                        data: 'localisation=' + localisation + '&ress=' + ressource, // On fait passer nos variables, exactement comme en GET, au script more_com.php,
                    });
                    //on lui enleve le syle des bordure de selection
                    document.getElementById(ressource).style.border='';
                    //on remet la ressource a son état de base
                    ressource='';
                }
            });


        });



    </script>
</head>
<body onload="f()">
<div id="time">

</div>
<div id="copg">
    <h1 id="titre">COPG</h1>

    <div id="div_map">
        <div id="img_map">
            <img src="images/map.png" alt="map">
        </div>
        <div id="tab_map">
            <table id="map">
                <?php
                for($i=0;$i<30;$i++)
                {
                    ?>
                    <tr>
                        <?php
                        for($j=0;$j<60;$j++)
                        {
                        ?>
                        <td id="<?php echo $i.".".$j ?>">
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>

        </div>

    </div>
    <div id="ressources">
        <p id="p_ress"><b><?php echo "Ressources :" ?>  </b></p>
        <div id="img_police" onclick="select1()">

        </div>
        <div id="img_policier" onclick="select2()">

        </div>
    </div>
    <div id="affiche_map">

    </div>


</div>

</body>
</html>


