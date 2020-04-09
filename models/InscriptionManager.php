<?php


class InscriptionManager extends Model
{
    //créer la fonction qui va récupérer
    //tous les articles dans la bdd
    public function setInscription($pseudo, $password, $admail)
    {
        return $this->setUser('utilisateurs',$pseudo, $password, $admail);
    }

    public function NbrPseudo($pseudo)
    {
        return $this->getNbLignes('utilisateurs', 'prenom', $pseudo);
    }

}