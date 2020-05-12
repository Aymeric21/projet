<?php
require_once 'views/View.php';


class ControllerCRRA
{
    private $_CRRAManager;
    private $_view;

    //comme c'est le constructeur quand on tape l'url ca va directement appeler cette fonction
    public function __construct()
    {
        if (isset($url) && count($url) < 1) {
            throw new Exception("Page introuvable", 1);
        }
        else{
            if(isset($_GET['fonction']) and $_GET['fonction']=='recapitulatif'){
                $this->recapitulatif();
            }
            else if(isset($_GET['fonction']) and $_GET['fonction']=='bilan'){
                $this->bilan();
            }
        else {
                $this->crra();
            }
        }

    }

    public function recapitulatif(){
        $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $allblesse = $bdd->query('SELECT * FROM blesse ORDER BY id ASC ');
        while($blesse= $allblesse->fetch())
        {
            ?>

            <tr>
                <td class="sinus"><?php echo $blesse['SINUS'] ?></td>
                <td class="<?php echo $blesse['Categorie'] ?>"><?php echo $blesse['Categorie'] ?></td>
                <td class="sexe"><?php echo $blesse['Sexe'] ?></td>
                <td class="age"><?php echo $blesse['Age'] ?></td>
                <td class="vecteur">-</td>
                <td class="destination">-</td>
            </tr>

            <?php
        }
    }

    public function bilan(){

        $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $allur = $bdd->query("SELECT Categorie FROM blesse WHERE Categorie='UR' ");
        $allur = $allur->rowCount();

        $allua = $bdd->query("SELECT Categorie FROM blesse WHERE Categorie='UA' ");
        $allua = $allua->rowCount();

        $alldcd = $bdd->query("SELECT Categorie FROM blesse WHERE Categorie='DCD' ");
        $alldcd = $alldcd->rowCount();

        $allcump = $bdd->query("SELECT Categorie FROM blesse WHERE Categorie='CUMP' ");
        $allcump = $allcump->rowCount();
        ?>
        <tr>
            <th class="UR"><?php echo $allur." UR" ?></th>
            <th class="UA"><?php echo $allua." UA" ?></th>
            <th class="DCD"><?php echo $alldcd." DCD" ?></th>
            <th class="CUMP"><?php echo $allcump." CUMP" ?></th>
        </tr>
        <?php

    }


    private function crra()
    {

            $this->view = new View('CRRA');
            $this->view->generate(array());

    }


}