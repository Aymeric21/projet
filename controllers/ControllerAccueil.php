<?php
require_once 'views/View.php';


    class ControllerAccueil
    {
        private $_articleManager;
        private $_view;

        public function __construct()
        {
            if (isset($url) && count($url) >1)
            {
                throw new Exception("Page introuvable",1);
            }
            else{
                $this->articles();
            }
        }

        private function articles(){
            $this->_articleManager = new ArticleManager();
            $articles = $this->_articleManager->getArticles();
            $this->view = new View('Accueil');
            $this->view->generate(array('articles' => $articles));
        }
    }

?>
