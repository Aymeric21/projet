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
}