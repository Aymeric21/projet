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
            $this->triage();
        }
    }


    private function triage()
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        if(isset($_POST['envoi_blessé']))
        {
            $sinus = $_POST['num_sinus'];
            $pma = $_POST['PMA'];

            $insert =$bdd->prepare("INSERT INTO blesse(SINUS,PMA) VALUES(?,?)");
            $insert->execute(array($sinus,$pma));


        }

        $this->view = new View('Triage');
        $this->view->generate(array());

    }

}