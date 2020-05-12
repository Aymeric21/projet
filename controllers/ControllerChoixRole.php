<?php
require_once 'views/View.php';


class ControllerChoixRole
{
    private $_choixroleManager;
    private $_view;

    //comme c'est le constructeur quand on tape l'url ca va directement appeler cette fonction
    public function __construct()
    {
        if (isset($url) && count($url) < 1)
        {
            throw new Exception("Page introuvable",1);
        }
        else{
            $this->role();
        }
    }

    private function role()
    {
        session_start();


//afin de vérifier à chaque fois
//qu'un utilisteur s'est bien connecté
        if(!isset($_SESSION['pseudo']))
        {
            header('Location:connexion');
        }

        $pseudo = $_SESSION['pseudo'];

//variable qui va nous servir
//pour que l'utilisateur puisse valider qu'une seul fois
//on se connecte a la BD
        $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//si l'utilisateur appuie sous le bouton valider
//et si un id a été envoyer dans lurl
        if(isset($_GET['id']) && isset($_GET['role']) && isset($_POST['clique']))//faire aussi si on a cliquer sur le bouton valider
        {

            //on récupère l'id et le role
            $id = $_GET['id'];
            $role = $_GET['role'];

            //on insere une table dans la BD role
            //avec l'id correspondant
            $insert = $bdd->prepare('INSERT INTO role(id,role,pseudo) VALUES(?,?,?)');
            $insert->execute(array($id,$role,$pseudo));


        }
        //pour regarder si le joueur a deja choisis un role on prend sa variable de session
        //on la met dans la BD puisu au moment ou il clique on fait un if on regarde si la variable de session pseudo
        //est deja inscrite dans la bd, si tel est le cas on envoie un message que il a deja choisis un role.



        $this->view = new View('ChoixRole');
        $this->view->generate(array());

        //si tous le monde a choisis son rôle
        //on lance le compte à rebours et on redirige les joueurs sur la vue
        //en fonction du role qu'ils ont choisis

        $allrole = $bdd->query('SELECT * FROM role ORDER BY ordre ASC ');
        $JoueursRestant = 7 - $allrole->rowCount();


        //quand tous les joueurs ont choisis leur role
        //on lance le Compte a rebours
        //et envoie une variale url en get que l'on pourra reprendre en php
        //pour envoyer chaque joueur a sa vue ensuite
        if($JoueursRestant==0)
        {
            echo "<script type='text/javascript'>
                    var n=10;
                    function car(){
                            document.getElementById('idc').innerHTML=n--;
                            if (0<=n) setTimeout(car,1000);
                            else {n=0;document.getElementById('idc').innerHTML=0;}
                            if (n==0)
                                {
                                      document.location.href=\"Choixrole&lance=1\"; 

                                }
                    }
                    car();
                  </script>";
        }


        if(isset($_GET['lance']))
        {
            echo "<script language='JavaScript'>
                    car();
                </script>";
            //on prend la variable de session et on regarde le role correspondant dans la BD
            $role = $bdd->query("SELECT role FROM role WHERE pseudo='$pseudo'");

            header("Location:".$role->fetch()[0]);
        }



    }
}

?>
