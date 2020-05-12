<?php
require_once 'views/View.php';



class ControllerTriage
{
    private $_triageManager;
    private $_view;

    //comme c'est le constructeur quand on tape l'url ca va directement appeler cette fonction
    public function __construct()
    {
        if (isset($url) && count($url) < 1)
        {
            throw new Exception("Page introuvable",1);
        }
        else{
            if(isset($_GET['fonction']) and $_GET['fonction']=='triageBDD')
            {
                $this->triageBDD();
            }
            else{
                $this->triage();
            }
        }

    }


    private function triage()
    {

        /*if(isset($_POST['envoi_blessé']))
        {
            // on récupère toute les infos et on les stocks dans la BD
            $sinus = $_POST['num_sinus'];
            $pma = $_POST['PMA'];
            $sexe = $_POST['Sexe'];
            $age = $_POST['age'];

            $insert =$bdd->prepare("INSERT INTO blesse(SINUS,Categorie,Sexe,Age) VALUES(?,?,?,?)");
            $insert->execute(array($sinus,$pma,$sexe,$age));

            //et on passe a la victime suivante


        }*/

        $this->view = new View('Triage');
        $this->view->generate(array());

    }
    private function triageBDD(){
        $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        if(isset($_POST['envoi_blessé']))
        {

            $sinus = $_POST['num_sinus'];
            $pma = $_POST['PMA'];
            $sexe = $_POST['Sexe'];
            $age = $_POST['age'];

            $insert =$bdd->prepare("INSERT INTO blesse(SINUS,Categorie,Sexe,Age) VALUES(?,?,?,?)");
            $insert->execute(array($sinus,$pma,$sexe,$age));

            //et on passe a la victime suivante
            //en enlever le patient de la liste des patients
            $reqpatiens = $bdd->query("SELECT newpatiens FROM patient  ");
            $newpatiens = $reqpatiens->fetch()[0];

            $supp =$bdd->exec("DELETE from patient WHERE newpatiens='$newpatiens' ");


        }
    }

}