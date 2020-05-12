<?php
require_once 'views/View.php';

class ControllerCreationPartie
{
    private $_CreationPartieManager;
    private $_view;

    //comme c'est le constructeur quand on tape l'url ca va directement appeler cette fonction
    public function __construct()
    {
        if (isset($url) && count($url) < 1)
        {
            throw new Exception("Page introuvable",1);
        }
        else {
                $this->creation();
            }
    }

    private function creation()
    {
        session_start();

        if(!isset($_SESSION['pseudo']))
        {
            header('Location:connexion');
        }
        else{
            $createur = $_SESSION['pseudo'];
            if (isset($_POST['creer']) && !empty($_POST['nom']))
            {
                $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $insertmsg = $bdd->prepare('INSERT INTO partie(nom, Createur) VALUES(?,?)');
                $insertmsg->execute(array($_POST['nom'], $createur));
            }

            $this->view = new View('CreationPartie');
            $this->view->generate(array());
        }

    }
}