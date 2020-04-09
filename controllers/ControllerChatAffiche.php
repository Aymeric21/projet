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
        //requete dans la BD chat
        //pour récupérer tt les messages
        //dans une variable et les affcihés ensuite
        $this->_ChatAffichageManager = new ChatManager();
        $allmsg = $this->_ChatAffichageManager->getAllMessages('chat');
        while($msg= $allmsg->fetch())
        {
            ?>
            <b><?php echo $msg['pseudo'] ?> : </b>
            <?php echo $msg['message'] ?><br/>
            <?php
        }
    }



}