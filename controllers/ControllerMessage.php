<?php
require_once 'views/View.php';


class ControllerMessage
{
    public function __construct()
    {
        if (isset($url) && count($url) <1)
        {
            throw new Exception("Page introuvable",1);
        }
        else{
            $this->chat();
        }
    }

    //fonction qui va creer la vue du chat
    public function chat()
    {
        session_start();


        $this->view = new View('chat');
        //ce qui est contenu dans la variable pseudo va pouvoir être
        //utiliser dans la vue mais avec la valeur de variable
        //pseudo ici car  'pseudo'
        $this->view->generate(array());

        if(!isset($_SESSION['pseudo']))
        {
            header('Location:connexion');
        }









    }


}
