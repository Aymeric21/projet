<?php
require_once 'views/View.php';

class ControllerPartie
{
    private $_PartieManager;
    private $_view;

    //comme c'est le constructeur quand on tape l'url ca va directement appeler cette fonction
    public function __construct()
    {
        if (isset($url) && count($url) < 1)
        {
            throw new Exception("Page introuvable",1);
        }
        else{
            if(isset($_GET['fonction']) and $_GET['fonction']=='listePartie')
            {
                $this->listePartie();
            }
            else{
                $this->partie();

            }
        }
    }

    private function partie()
    {
        session_start();
        if(!isset($_SESSION['pseudo']))
        {
            header('Location:connexion');
        }
        else
        {
            $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $allpartie = $bdd->query('SELECT * FROM partie ORDER BY id DESC ');
            while($partie= $allpartie->fetch())
            {
                //quand on clique sur le bouton jouer
                //supprimer les espaces //str_replace
                if(isset($_POST[str_replace(' ','',$partie['nom'])]))
                {
                    //on vérifie d'abors que le nombre de place n'est pas complet
                    if($partie['places'] == '7')
                    {
                        ?>
                        <script language="JavaScript">alert('La partie est complète choisissez une autre partie !');</script>
                        <?php
                    }
                    else{
                        $nom_partie = $partie['nom'];
                        //on ajouter +1 a la colonne place
                        $insert = $bdd->exec("UPDATE partie SET places = places +1 WHERE nom = '$nom_partie' ");
                        //on récupère la variable de Session Partie
                        $_SESSION['partie']= $partie['nom'];
                        //on redirige vers la page de Choix du role
                        header('Location:ChoixRole ');
                    }
                }
            }
            $this->view = new View('Partie');
            $this->view->generate(array());
        }

    }
    private function listePartie()
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $allpartie = $bdd->query('SELECT * FROM partie ORDER BY id ASC ');
        while($partie= $allpartie->fetch())
        {
            ?>
            <tr>
                <td><?php echo $partie['nom'] ?></td>
                <td><?php echo $partie['Createur'] ?></td>
                <td><?php echo $partie['places'] ?>/7</td>
                <td id="options">

                    <form action="" method="POST">
                        <input type="submit" name="<?php echo str_replace(' ','',$partie['nom']) ?>" value="Jouer">
                    </form>
                </td>
            </tr>
            <?php

        }
    }

}