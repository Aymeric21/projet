<?php
require_once 'views/View.php';



class ControllerDeconnexion
{
    private $_DeconnexionManager;
    private $_view;

    public function __construct()
    {
        if (isset($url) && count($url) <1)
        {
            throw new Exception("Page introuvable",1);
        }
        else{
            $this->deconnexion();
        }
    }

    public function deconnexion()
    {
        session_start();
        //récupération de la variable de session
        $pseudo = $_SESSION['pseudo'];
        //connection BD
        $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        session_destroy();
        // on supprime la ligne correspondante a la variable de session dans la BD
        $delete = $bdd->exec("DELETE FROM connecte WHERE pseudo='$pseudo'");

        $this->view = new View('accueil');

        $this->view->generate(array());

    }

}