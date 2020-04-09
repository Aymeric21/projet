<?php
require_once 'views/View.php';


class ControllerPost
{
    private $_articleManager;
    private $_view;

    //comme c'est le constructeur quand on tape l'url ca va directement appeler cette fonction
    public function __construct()
    {
        if (isset($url) && count($url) < 1)
        {
            throw new Exception("Page introuvable",1);
        }
        else{
            $this->article();
        }
    }

    //pour retourner un article spécifique de la base de donéée
    //attention avec les mots sans "s"
    private function article()
    {
        if(isset($_GET['id']))
        {
            $this->_articleManager = new ArticleManager();
            $article = $this->_articleManager->getArticle($_GET['id']);
            $this->view = new View('SinglePost');
            $this->view->generate(array('article' => $article));
        }
    }
}

?>
