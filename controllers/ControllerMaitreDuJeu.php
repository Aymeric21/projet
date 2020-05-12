<?php
require_once 'views/View.php';

class ControllerMaitreDuJeu
{
    private $_MaitreDuJeuManager;
    private $_view;

    //comme c'est le constructeur quand on tape l'url ca va directement appeler cette fonction
    public function __construct()
    {
        if (isset($url) && count($url) < 1)
        {
            throw new Exception("Page introuvable",1);
        }
        else{
            $this->maitre();
        }
    }


    private function maitre()
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        session_start();
        $heure = time() -(3600 -$_SESSION['time']) ;

        if(isset($_POST['lancer']))
        {
            $insert = $bdd->prepare("UPDATE jeu SET debut='true' , heure=? ");
            $insert->execute(array(time()));
        }
        if(isset($_POST['bouton_pause']))
        {
            $insert = $bdd->prepare("UPDATE jeu SET pause='true' , seconde=? ");
            $insert->execute(array($_SESSION['time']));
        }
        elseif(isset($_POST['bouton_reprendre'])){
            $insert = $bdd->prepare("UPDATE jeu SET pause='false' , heure=? ");
            $insert->execute(array($heure));
        }

        $this->view = new View('MaitreDuJeu');
        $this->view->generate(array());



        if(isset($_GET['pause']))
        {
            echo "<script language='JavaScript'>
                        var pause= document.getElementById('bouton_pause');
                        pause.innerHTML
                    </script>";
        }

       /* var pause= document.getElementById('bouton_pause');
        var reprendre= document.getElementById('bouton_reprendre');

        var x = 0;
        var y = 0;


            pause.style.opacity = 0.2;
            reprendre.style.opacity = 1;
            if(x=1)
            {
                return false
    }else {
                x=1;
                y=0;
            }

        }

        function r() {
            reprendre.style.opacity = 0.2;
            pause.style.opacity = 1;
            if(y=1)
            {
                return false
    }else {
                y=1;
                x=0;
            }
        }*/

    }


}