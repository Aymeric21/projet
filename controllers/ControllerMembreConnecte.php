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
        }
        else{
            if(isset($_GET['fonction']) and $_GET['fonction']=='listeDestinataires'){
                $this->listeDestinataires();
            }
            else {
                $this->MembreConnecte();
            }
        }

    }

    public function listeDestinataires(){
        $this->_MembreConnecteManager = new ChatManager();
        $connect = $this->_MembreConnecteManager->getAllMessages('connecte');
        $fetch = $connect->fetchAll();
        echo  json_encode($fetch);
    }

    public function MembreConnecte()
    {
            session_start();
            $peudo = $_SESSION['pseudo'];

            //va chercher tous les membre connecte
            //dans la BD connecte dans l'odre de connection
            $this->_MembreConnecteManager = new ChatManager();
            $connect = $this->_MembreConnecteManager->getAllMessages('connecte');

            //recupere le nombre de personne connecté
            $nbconnecte = $connect->rowCount();

            echo " <b><u>Connecté(s):</u></br> 
                     (" . $nbconnecte . "/7)</b></br>";


            $list = 0;
            //on parcours la table et on affcihes les pseudos des utilisateurs connecté
            //si le pseudo est le même que ce celui de la variable de session on spécifie avec "vous"
            while ($co = $connect->fetch())
            {

                if($co['pseudo'] == $peudo)
                {
                    ?>
                        </br><b class="connecte_gris"><?php echo '(Vous)' . $co['pseudo'] ?> </b></br>
                    <?php
                }
                else{
                    ?>
                    </br><b class="connecte_gris"><?php echo $co['pseudo'] ?> </b></br>
                    <?php
                }
            }
    }

}