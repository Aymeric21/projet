<?php
require_once 'views/View.php';


class ControllerConnexion
{

    private $_ConnexionManager;
    private $_view;

    public function __construct()
    {
        if (isset($url) && count($url) <1)
        {
            throw new Exception("Page introuvable",1);
        }
        else{
            $this->connexion();
        }
    }



    private function connexion()
    {
        session_start();
        //démarre une nouvelle session ou reprend une session existante
        if(isset($_POST['validation']))
        {
            $pseudo = trim($_POST['pseudo']);
            $password = trim($_POST['password']);
            $password = md5($password);//afin de décrypter le mot de passe d'une certaine façon

            //verifier que le mdp et pseudo correspondent
            //et inscrit dans la BD
            $this->_ConnexionManager = new ConnexionManager();
            $valide = $this->_ConnexionManager->getConnection($pseudo, $password);

            //pour savoir si la personne est déja connecter
            $deja_connecte = $this->_ConnexionManager->DejaConnecte($pseudo);
            echo $valide;
            echo $deja_connecte;
            //si la personne est bien inscrit
            if($valide ==1)
            {
                //récupère le pseudo de la personne
                // connecté pour l'afficher dans d'autres pages
                $_SESSION['pseudo'] = $pseudo;

                //on vérifie que le personne est déja
                // connecté pour eviter qu'une personne se connecte 2 fois
                if ($deja_connecte == 0) {
                    //on enregistre le pseudo dans
                    // la base de donné des membre connectés
                    $this->_ConnexionManager->setConnecte($pseudo);

                }

                //le gider a la bonne page
                header('Location:choixRole');


            } else{
                echo '<script language="Javascript">
                      alert ("Pseudo ou mot de passe incorrect !" )
                      </script>';
                }


        }
        $this->view = new View('Connexion');
        //ce qui est contenu dans la variable pseudo va pouvoir être
        //utiliser dans la vue mais avec la valeur de variable
        //pseudo ici car  'pseudo'
        $this->view->generate(array());
    }
}