<?php
require_once 'views/View.php';



class ControllerChatAffiche
{
    private $_ChatAffichageManager;
    private $_view;

    public function __construct()
    {
        if (isset($url) && count($url) <1)
        {
            throw new Exception("Page introuvable",1);
        }
        else{

            $this->affichage();
        }
    }

    //recherche les messages dans la BD
    //et les affiches
    public function affichage()
    {
        session_start();

        if(!empty($_SESSION['receveur']))
        {
            $receveur = $_SESSION['receveur'];
            $pseudo = $_SESSION['pseudo']
            ?>
            <script language="JavaScript">

            </script>
            <?php

            //requete dans la BD chat
            //pour récupérer tt les messages
            //dans une variable et les affcihés ensuite
            $this->_ChatAffichageManager = new ChatManager();
            $allmsg = $this->_ChatAffichageManager->AfficheChat('chat',$pseudo,$receveur);
            while($msg= $allmsg->fetch())
            {
                if($msg['pseudo']==$pseudo)
                {
                    echo "<div id='div_envoyeur'>
                      <p id='psd_envoyeur'>" .$msg['pseudo']. "</p>
                      <p id='msg_envoyeur'>" .$msg['message']. "</p>
                      </div>" ;
                }

                else if ($msg['pseudo']==$receveur)
                {
                    echo "<div id='div_receveur'>
                      <p id='psd_receveur'>" .$msg['pseudo']. "</p>
                      <p id='msg_receveur'>" .$msg['message']. "</p>
                      </div>";
                }

            }
        }
    }



}