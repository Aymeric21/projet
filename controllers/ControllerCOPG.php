<?php
require_once 'views/View.php';



class ControllerCOPG
{
    //comme c'est le constructeur quand on tape l'url ca va directement appeler cette fonction
    public function __construct()
    {
        if (isset($url) && count($url) < 1)
        {
            throw new Exception("Page introuvable",1);
        }
        else{
            if(isset($_GET['fonction']) and $_GET['fonction']=='ressources'){
                $this->ressources();
            }
            else if (isset($_GET['fonction']) and $_GET['fonction']=='copgBDD'){
                $this->copgBDD();
            }
            else{
                $this->copg();
            }
        }
    }

    private function copg()
    {
        $this->view = new View('COPG');
        $this->view->generate(array());
    }

    private function ressources(){
        $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        if(isset($_GET['police']) and $_GET['police']==0)
        {
            $allpolice = $bdd->query("SELECT * FROM ressources WHERE nom='police' ");
            ($police= $allpolice->fetch());
            if($police['quantite'])
            {
                ?>
                <img  src='images/img_police.png' alt='police' id='ress_policer' ><br/>
                <b><?php echo $police['nom'] ?> : </b>
                <?php echo $police['quantite'] ?><br/>
                <?php
            }
            else{
                //supprimer la ressources quand il y en a plus
                ?>
                <script>
                    $('#img_police').remove();
                </script>
                <?php

            }

            $allpolice->closeCursor();

        }

       if(isset($_GET['police']) and $_GET['police']==1)
        {
            $allpolicier = $bdd->query("SELECT * FROM ressources WHERE nom='policier' ");
            ($policier= $allpolicier->fetch());
            if($policier['quantite'])
            {
                ?>
                <img  src='images/img_policier.png' alt='police' id='ress_police' ><br/>
                <b><?php echo $policier['nom'] ?> : </b>
                <?php echo $policier['quantite'] ?><br/>
                <?php
            }
            else{
                //supprimer la ressources quand il y en a plus
                ?>
                <script>
                    $('#img_policier').remove();
                </script>
                <?php

            }

            $allpolicier->closeCursor();

        }


    }

    private function copgBDD()
    {

        if(isset($_POST['localisation']) && isset($_POST['ress'])){
            $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $insert = $bdd->prepare("INSERT INTO map(ressource, coordonnee) VALUES(?,?) ");
            $insert->execute(array($_POST['ress'], $_POST['localisation']));

            $ress = $_POST['ress'];
            //et on oublie pas de delete parmis les ressources
            if($_POST['ress']=='img_police')
            {
                $delete = $bdd->exec("UPDATE ressources SET quantite= quantite - 1 WHERE nom='police' ");

            }
            if($_POST['ress']=='img_policier')
            {
                $delete = $bdd->exec("UPDATE ressources SET quantite= quantite - 1 WHERE nom='policier' ");

            }

        }

    }


}