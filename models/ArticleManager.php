<?php

    class ArticleManager extends Model
    {
        //créer la fonction qui va récupérer
        //tous les articles dans la bdd
        public function getArticles()
        {
            return $this->getAll('articles','Article');
        }

        //la fonction qui va
        //récupérer un seul article
        public function getArticle($id)
        {
            //en paramètre , la table , l'objet et L'id
            return $this->getOne('articles', 'Article', $id);
        }
    }
?>