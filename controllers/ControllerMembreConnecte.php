<?php
require_once 'views/View.php';


class ControllerMembreConnecte
{
    private $_MembreConnecteManager;
    private $_view;

    public function __construct()
    {
        if (isset($url) && count($url) < 1) {
            throw new Exception("Page introuvable", 1);
        } else {
            $this->MembreConnecte();
        }
    }

    public function MembreConnecte()
    {

            //va chercher tous les membre connecte
            //dans la BD connecte dans l'odre de connection
            $this->_MembreConnecteManager = new ChatManager();
            $connect = $this->_MembreConnecteManager->getAllMessages('connecte');

            //recupere le nombre de personne connecté
            $nbconnecte = $connect->rowCount();

            echo " <u>Utilisateurs connecté:</u></br> 
           <p>(" . $nbconnecte . "/19)</p>";

            while ($co = $connect->fetch())
            {
                ?>
                </br><b><?php echo $co['pseudo'] ?> </b></br>
                <?php
            }
    }

}