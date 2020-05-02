<?php

    //définition des différents styles
    //'nom du style' => 'nom affiché pour l'utilisateur'
    $styles = array
    (
        'template_bleu' => 'Style bleu',
        'template_rouge' => 'Style rouge'
    );

    //si le formulaire de changement de style est rempli avec une valeur correcte
    if(isset($_GET['style']) && array_key_exists($_GET['style'], $styles))
    {
        //On met htmlspecialchars par sécurité
        $styleChoisi = htmlspecialchars($_GET['style']);
        //echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>Style choisi';
    }
    //sinon s'il y a un cookie enregistré
    elseif(isset($_COOKIE['style']) && array_key_exists($_COOKIE['style'], $styles))
    {
        //idem
        $styleChoisi = htmlspecialchars($_COOKIE['style']);
        //echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>Style cookie';
    }
    //sinon on met une valeur par défaut
    else
    {
        //echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>Style par défaut';
        $styleChoisi = 'template_bleu';
    }

    //On crée un cookie pour le style
    if(isset($_GET['style']) && array_key_exists($_GET['style'], $styles))
    {
        //Le cookie ne dure qu'une journée ( 86400 secondes )
        setcookie('style', htmlspecialchars($_GET['style']), time() + 86400);
    }


?>