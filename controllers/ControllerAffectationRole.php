<?php
require_once 'views/View.php';


class ControllerAffectationRole
{
    private $_AffectationRoleManager;
    private $_view;

    public function __construct()
    {
        if (isset($url) && count($url) <1)
        {
            throw new Exception("Page introuvable",1);
        }
        else{

            $this->affectation();
        }
    }

    //recherche les messages dans la BD
    //et les affiches
    public function affectation()
    {
        session_start();
        $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $allmsg = $bdd->query('SELECT * FROM role ORDER BY ordre ASC ');
        //on va devoir ajouter une colonne dans la BD ca sera le pseudo du joueur on va voir ca
        while($msg= $allmsg->fetch())
        {
            ?>
            <br> <b><?php echo  $msg['pseudo'].' a choisis le rôle: ' . $msg['role']. ' !' ?> </b> </br>
            <?php
        }

        //nombre de lignes dans la table
        $JoueursRestant = 7 - $allmsg->rowCount();

        if($JoueursRestant != 0)
        {
            echo " <p id='avantlancer1'> En attente de ". $JoueursRestant ." Joueurs</p>	<img src=\"ajax-loader.gif\" alt=\"patientez...\" id='ajax'> </br>";
        }
        else{
            echo '<p id="avantlancer2">La partie va commencer dans: <p/>';


        }

    }


}