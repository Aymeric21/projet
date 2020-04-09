<?php
require_once 'views/View.php';

class Router
{
    private $ctrl;
    private $view;

    public function routeReq()
    {
        try {
            //chargement automatque des classes du dossier models
             spl_autoload_register(function ($class)
             {
                 require_once ('models/'.$class.'.php');
             });

             //on crée une variable $url
             $url='';

             //on va determiner le controleur en
            //fonction de la valeur de cette variable
            if(isset($_GET['url'])){
                //on decompose l'url et on lui applique un filtre
                $url = explode('/', filter_var($_GET['url'],FILTER_SANITIZE_URL));

                //on récupère le premier paramètre de l'url
                //on le met tout en minuscule
                //on met sa première lettre en majuscule
                $controller = ucfirst(strtolower($url[0]));

                $controllerClass = "Controller".$controller;

                //on retrouve le chemin du controleur voulu
                $controllerFile = "controllers/".$controllerClass.".php";

                //on vérifie que le fichier du controleur existe
                if(file_exists($controllerFile))
                {
                    //on lance la class en question
                    //avec tous les paramètres url
                    //pour respecter l'encapsulation
                    require_once ($controllerFile);
                    $this->ctrl = new $controllerClass($url);
                }

                else{
                    throw new \Exception("Page introuvable",1);

                }
            }
            else{
                require_once ('controllers/ControllerAccueil.php');
                $this->ctrl = new ControllerAccueil($url);
            }

        } catch (Exception $e){
            $errorMsg =$e->getMessage();
            $this->view = new View('Error');
            $this->view->generate(array('errorMsg' => $errorMsg));
            require_once ('views/viewError.php');
        }
    }
}

?>