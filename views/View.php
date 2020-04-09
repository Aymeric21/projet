<?php
    class View
    {
        //fichier vue
        private $_file;

        //titre de la page
        private $_t;

        function __construct($action)
        {
            $this->_file = 'views/view'.$action.'.php';
        }

        //crée une fonction qui va
        //générer et afficher la vue
        public function generate($data)
        {
            //définir le contenu a envoyer
            $content = $this->generateFile($this->_file, $data);

            //template
            $view = $this->generateFile('views/template.php', array('t' => $this->_t, 'content' => $content));
            echo $view;
        }

        private function generateFile($file, $data)
        {
            //va checker si la variable file
            //existe
            if(file_exists($file))
            {
                //permet de créer et d'initilaiser des variables
                //à partir des clés et des valeurs des éléments
                //d'un tableau associatif
                extract($data);

                //commencer la temporisation
                ob_start();

                require $file;

                //arreter la temporisation
                return ob_get_clean();
            }
            else{
                throw new Exception("Fichier".$file." introuvable",1);
            }
        }


    }
?>
