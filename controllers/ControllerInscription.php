<?php
require_once 'views/View.php';


class ControllerInscription
{
    private $_InscriptionManager;
    private $_view;

    public function __construct()
    {
        if (isset($url) && count($url) <1)
        {
            throw new Exception("Page introuvable",1);
        }
        else{
            $this->inscription();
        }
    }



    private function inscription()
    {
        $total_pseudo = 0;
        if(isset($_POST['validation']))
        {
            $pseudo = trim($_POST['pseudo']);
            $password = md5(trim($_POST['password']));//md5 permet de chiffrer le mot de passe
            $admail = trim($_POST['admail']);

            //on récupère le nombre de lignes qui ont déja
            //ce pseudo dans la table de la BD
            $this->_InscriptionManager = new InscriptionManager();
           $total_pseudo = $this->_InscriptionManager->NbrPseudo($pseudo);


            //pour savoir si ce pseudo a deja été utilisé
            if($total_pseudo == 0)
            {
                $this->_InscriptionManager->setInscription($pseudo, $password, $admail);

                /*echo '<script language="Javascript">
                      alert ("Votre Inscription a bien été prise en compte " )
                      </script>';*/


                //afin de rediriger vers une autre page pour eviter le renvoie du formualaire a la bd
                header('location:http://localhost/L3/projet/accueil');

            }
            //afficher une boite de dialogue
            //pour dire que le pseudo exite deja
            echo '<script language="Javascript">
              alert ("Ce pseudo existe déja veuillez recommencer" )
              </script>';


        }
        $this->view = new View('Inscription');
        //ce qui est contenu dans la variable pseudo va pouvoir être
        //utiliser dans la vue mais avec la valeur de variable
        //pseudo ici car  'pseudo'
        $this->view->generate(array());
    }
}