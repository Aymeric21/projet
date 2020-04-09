<?php
require_once 'views/View.php';



class ControllerChatBDD
{
    private $_ChatBDDManager;
    private $_view;

    public function __construct()
    {
        if (isset($url) && count($url) <1)
        {
            throw new Exception("Page introuvable",1);
        }
        else{
            $this->requete();
        }
    }

    //insert les messages avec le pseudo
    //asscié dans la BD
    public function requete()
    {
        $this->_ChatBDDManager = new ChatManager();
        session_start();

        //POUR VERIFIER SI UN UTILISATEUR S'EST BIEN CONNECTER
        if($_SESSION['pseudo'])
        {
            //récupère la variable de session
            $pseudo = $_SESSION['pseudo'];

            //vérifier qu'on a bien écrit un message
            // et qu'on a cliquer sur le bouton envoyer
            if( isset($_POST['message']) AND !empty($_POST['message']))
            {
                //fonction pour sécurité
                //récupérer le message ecrit dans le
                //formulaire de chat
                $message = htmlspecialchars($_POST['message']);

                //on enregistre le message asscoié
                //$à l'utilisateur dans la BD
                $this->_ChatBDDManager->setMessage($pseudo, $message);

                echo json_encode('okay');
            }
        }else header("Location:Connexion");


    }

}