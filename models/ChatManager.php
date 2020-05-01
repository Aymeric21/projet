<?php


class ChatManager extends Model
{

    // enregistre le message dans la BD
    //AVEC LE pseudo de la personne associé
    public function setMessage($pseudo,$message)
    {
        return $this->setTwo('chat','pseudo', 'message', $pseudo, $message);
    }

    //récuprer tous les messages dans l'ordes
    //de la bd Chat
    public function getAllMessages($table)
    {
        return $this->getMess($table);
    }

    public function AfficheChat($table,$pseudo,$receveur)
    {
        return $this->getChat($table, $pseudo, $receveur);
    }

    public function setChat($table,$pseudo,$message,$receveur)
    {
        $this->setMess($table,$pseudo,$message,$receveur);
    }

}