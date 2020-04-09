<?php
require_once 'views/View.php';


class ControllerChoixRole
{
    private $_choixroleManager;
    private $_view;

    //comme c'est le constructeur quand on tape l'url ca va directement appeler cette fonction
    public function __construct()
    {
        if (isset($url) && count($url) < 1)
        {
            throw new Exception("Page introuvable",1);
        }
        else{
            $this->role();
        }
    }

    private function role()
    {
        $this->view = new View('ChoixRole');
        $this->view->generate(array());



    }
}

?>
