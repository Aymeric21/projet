<?php
require_once 'views/View.php';



class ControllerCOS
{
    private $_COSManager;
    private $_view;

    //comme c'est le constructeur quand on tape l'url ca va directement appeler cette fonction
    public function __construct()
    {
        if (isset($url) && count($url) < 1)
        {
            throw new Exception("Page introuvable",1);
        }
        else{
            if(isset($_GET['fonction']) and $_GET['fonction']=='ressources'){
                $this->ressources();
            }
            else if (isset($_GET['fonction']) and $_GET['fonction']=='cosBDD'){
                $this->cosBDD();
            }
            else if(isset($_GET['fonction']) and $_GET['fonction']=='cosAffiche')
            {
                $this->cosAffiche();
            }
            else{
                $this->cos();
            }
        }
    }

    //pour retourner un article spécifique de la base de donéée
    private function cos()
    {

            $this->view = new View('COS');
            $this->view->generate(array());


    }

    private function ressources()
    {

        $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $allpma = $bdd->query('SELECT * FROM ressources ');
        ($pma= $allpma->fetch());
            if($pma['quantite'])
            {
                ?>
                <img  src='images/tante_pma.png' alt='tente' id='ress_pma' ><br/>
                <b><?php echo $pma['nom'] ?> : </b>
                <?php echo $pma['quantite'] ?><br/>
                <?php
            }
            else{
                //supprimer la ressources quand il y en a plus
                ?>
                <script>
                    $('#tante_pma').remove();
                </script>
                <?php
            }

        $allpma->closeCursor();

    }

    private function cosBDD()
    {

        if(isset($_POST['localisation']) && isset($_POST['ress'])){
            $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $insert = $bdd->prepare("INSERT INTO map(ressource, coordonnee) VALUES(?,?) ");
            $insert->execute(array($_POST['ress'], $_POST['localisation']));

            $ress = $_POST['ress'];
            //et on oublie pas de delete parmis les ressources
            $delete = $bdd->exec("UPDATE ressources SET quantite= quantite - 1 ");

        }

    }

    private function cosAffiche()
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $allmap = $bdd->query('SELECT * FROM map  ');
        while($map= $allmap->fetch())
        {
            ?>
            <script language="JavaScript">
                var loca =document.getElementById('<?php echo $map['coordonnee'] ?>');
                loca.innerHTML = '<img  src=\'images/<?php echo $map['ressource'] ?>\' alt=\'tente\' id=\'<?php echo $map['ressource'] ?>1\' >';

            </script>
            <?php
        }
    }

}