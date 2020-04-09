<?php


class ConnexionManager extends Model
{
    //Se connecter
    //verifier que le mdp et pseudo correspondent
    //et inscrit dans la BD
    //renvoie 1 ligne si oui 0 sinon
    public function getConnection($pseudo, $mdp)
    {
        return $this->getConnect('utilisateurs','prenom', $pseudo, 'mdp', $mdp);
    }

    //vérifie si la personne est déja connecté
    public function DejaConnecte($pseudo)
    {
        return $this->getNbLignes('connecte', 'pseudo', $pseudo);
    }

    //on enregistre le pseudo dans la base de donné des membre connectés
    public function setConnecte($pseudo)
    {
        return $this->setOne('connecte', $pseudo , 'pseudo');
    }


}