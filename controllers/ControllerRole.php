<?php
require_once 'views/View.php';



class ControllerRole
{
    private $_roleManager;
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

    // quand un joueur choisis un role
    //l'mage du role se met en transparant
    //et les autres joueurs n'ont pas accès au role
    private function role()
    {

        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
         echo '<script language="Javascript">
            var elmt =  document.getElementById("role"+'.$id.');;
            elmt.style.opacity = 0.2;
           </script>';


        }

    }

}
?>