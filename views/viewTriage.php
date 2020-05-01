<?php
/*
 * erreur dans la console a cause de SetIterval qui recupère trop de ressource la machine n'as plus assez de place
 * donc cela peut faire buger le javascript
 *
 * EGALEMENT au niveau des blessé on peut changer automatiquement en fonction du temps les blessé
 * avec ajax et le fichier blessé.pho mais on peut aussi changer de blessé au clique du bouton valider
 */

?>
    <head>
        <meta charset="utf-8">
        <title>Triage</title>
        <link rel="stylesheet" href="css/Triage.css">
        <script type="text/javascript" src="js/Triage.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
            setInterval(function(){
                $('#time').load('views/time.php');
            },1000);

            setInterval(function(){
                $('#brancardGauche').load('views/blessé.php');
            },1000);

        </script>
    </head>

    <body onload="liste()">
            <div id="time">

            </div>
            <div id="triage">
                <h1 id="titre">Triage</h1>

                <div id="divBrancards">

                        <button  id="SINUS" onclick="fiche_SINUS()">Bracelet SINUS</button>

                        <button id="PMA"  onclick="fiche_PMA()">Fiche Medical</button>

                    <div id="brancardGauche">

                    </div>
                    <div id="bracelet_sinus">

                    </div>
                    <div id="fiche_medical">

                    </div>
                    <div id="brancardDroit">

                    </div>
                    <form name="form_blessé" id="form_blessé" action="" method="POST" onsubmit="return verif_blessé()">
                        <div id="div_SINUS">

                        </div>
                        <div id="div_PMA">

                        </div>
                    </form>



                        <div id="divSymptomes">
                        <?php
                            session_start();

                            $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

                            if(isset($_GET['zone'])) {

                                $zone = $_GET['zone'];
                                $num_patient = $_GET['num_patient'];

                                echo $zone .' du patient numéro '. $num_patient ;

                               $reqlesion = $bdd->prepare("SELECT * FROM lesion WHERE partie_du_corps=? AND num_patient=?  ");
                                $reqlesion->execute(array($zone,$num_patient));

                                while ($lesion = $reqlesion->fetch()) {

                                    echo '<table id="tableSymptomes">
                                        <thead>
                                        <tr>
                                            <th>M.A.R.C.H.</th>
                                            <th>Lésions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Hémorragie</td>
                                            <td>'. $lesion['hemorragie'].'</td>
                                        </tr>
                                        <tr>
                                            <td>Voies aériennes</td>
                                            <td>'. $lesion['voies_aeriennes'].'</td>
                                        </tr>
                                        <tr>
                                            <td>Respiration</td>
                                            <td>'. $lesion['respiration'].'</td>
                                        </tr>
                                        <tr>
                                            <td>Circulation</td>
                                            <td>'. $lesion['circulation'].'</td>
                                        </tr>
                                        <tr>
                                            <td>Neuro</td>
                                            <td>'. $lesion['neuro'].'</td>
                                        </tr>
                                        </tbody>
                                    </table>';

                                }
                            }
                            else{
                                echo '<table id="tableSymptomes">
                                        <thead>
                                        <tr>
                                            <th>M.A.R.C.H.</th>
                                            <th>Lésions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Hémorragie</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Voies aériennes</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Respiration</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Circulation</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Neuro</td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>';

                            }
                        ?>


                    </div>

                </div>

            </div>
    </body>
</html>
