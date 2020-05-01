<?php
    abstract class Model
    {
        private static $_bdd;

        //connection à la bdd

        private static function setBdd()
        {
            //self un peu comme this
            self::$_bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        }

        //fonction de connection par defaut à la bdd
        //on regarde si on est pas connecter a la bdd
        //si on l'est pas on se connecte
        protected function getBdd()
        {
            if(self::$_bdd==null)
            {
                self::setBdd();
                return self::$_bdd;
            }
        }

        //création de la méthode
        //de récupération de liste d'éléments
        //dans la bdd
        protected function getAll($table, $obj)
        {
            $this->getBdd();
            $var = [];
            $req = self::$_bdd->prepare('SELECT * FROM '.$table.' ORDER BY id desc ');
            $req->execute();

            //on crée la variable data qui
            //va contenir les données
            while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                //var contiendra les données sous forme d'objets
                $var[] = new $obj($data);
            }
            
            return $var;
            $req->closeCursor();
        }

        //methode
        //qui va récupérer un seul élément, commentaire...
        //ce que l'on veut
        //dans la BD
        protected function getOne($table, $obj, $id)
        {
            $this->getBdd();
            $var = [];
            $req = self::$_bdd->prepare("SELECT id, title,content, DATE_FORMAT(date, '%d/%m/%Y à %Hh%imin%ss ') AS date FROM " .$table. " WHERE id = ?");
            $req->execute(array($id));
            while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                $var = new $obj($data);
            }

            return $var;
            $req->closeCursor();
        }

        //ajouter un utilisateur a la BDD
        protected function setUser($table,$pseudo,$password,$admail)
        {
            $this->getBdd();
            $insertsql = self::$_bdd->prepare("INSERT INTO " .$table."(prenom, mdp, admail) VALUES(?, ?, ?)");
            $insertsql->execute(array($pseudo, $password, $admail));

            $insertsql->closeCursor();

        }

        //Récuperer le nombre de lignes d'une table
        //en parametre la colone
        //et la valeur de colonne
        protected function getNbLignes($table,$col, $val_col)
        {
            $this->getBdd();
            $reg = self::$_bdd->query("SELECT COUNT(*) AS total FROM $table WHERE " .$col. " = '$val_col' ");
            $donnees = $reg->fetch();
            $total = $donnees['total'];

            return $total;
            $reg->closeCursor();

        }

        //Requete pour savoir si le pseudo et le mdp
        //correspondent bien lors de la connexion
        //et sont inscrits dans la BDD
        protected function getConnect($table, $col1, $val_col1,$col2, $val_col2)
        {
            $this->getBdd();
            //requete pour savoir si pseudo et mdp correspondent dans la bd
            $reg = self::$_bdd->query("SELECT * FROM $table WHERE " .$col1. " = '$val_col1' AND " .$col2. " = '$val_col2' ");
            //pour voir si la requête a renvoyer une ligne
            $total= $reg->rowCount();

            return $total;
            $reg->closeCursor();

        }

        //insérer un élément dans une table
        protected function setOne($table, $pseudo,$col )
        {
            $this->getBdd();
            $insertsql = self::$_bdd->prepare("INSERT INTO " .$table."(" .$col. ") VALUES(?)");
            $insertsql->execute(array($pseudo));

            $insertsql->closeCursor();

        }

        //insérer un élément dans une table
        protected function setTwo($table, $col1,$col2, $pseudo, $message)
        {
            $this->getBdd();
            $insertsql = self::$_bdd->prepare("INSERT INTO " .$table."(" .$col1. " , " .$col2. ") VALUES(?, ?)");
            $insertsql->execute(array($pseudo, $message));

            $insertsql->closeCursor();

        }

        //récupérer tt les messages
        //dans l'ordres ou ils ont été envoyés
        protected function getMess($table)
        {
            $this->getBdd();
            $allmsg = self::$_bdd->query("SELECT * FROM " .$table." ORDER BY id ASC ");

            return $allmsg;
            $allmsg->closeCursor();

        }

        protected function getChat($table,$pseudo,$receveur)
        {
            $this->getBdd();
            $allmsg = self::$_bdd->query("SELECT * FROM " .$table." WHERE (pseudo='$pseudo' OR pseudo='$receveur') AND (receveur='$receveur' OR receveur='$pseudo') ORDER BY id ASC ");

            return $allmsg;
            $allmsg->closeCursor();

        }

        //insérer un élément dans une table
        protected function setMess($table, $pseudo, $message,$receveur)
        {
            $this->getBdd();
            $insertsql = self::$_bdd->prepare("INSERT INTO " .$table."(pseudo,message,receveur) VALUES(?, ?,)");
            $insertsql->execute(array($pseudo, $message,$receveur));

            $insertsql->closeCursor();

        }


        //enlever une table de la base de donné
        /*protected function Supp($table)
        {

        }*/


    }
?>
