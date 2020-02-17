<?php
    // si on clique sur le boutton s'incrire et que la validation est faite
     if (isset($_POST['validation'])) {
          $pseudo = trim($_POST['pseudo']);//trim permet de virer tous les espaces
          $password = md5(trim($_POST['password']));//md5 permet de chiffrer le mot de passe
          $admail = trim($_POST['admail']);
          $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          $reg = $bdd->query("SELECT COUNT(*) AS total FROM utilisateurs WHERE prenom='$pseudo' ");
         while($donnees = $reg->fetch()) //fetch récupère une nouvelle ligne a chaque fois
         {
             echo '<p>' . $donnees['total']  . '</p>';//on peut maintenant savoir il y a combien de gens qui ont deja pris ce pseudo rste a mettre le if
         }
          $insertsql = $bdd->prepare('INSERT INTO utilisateurs(prenom, mdp, admail) VALUES(?, ?, ?)');
          $insertsql->execute(array($pseudo, $password, $admail));
         header('location:http://localhost/L3/projet/formulaire_connexion.php');//afin de rediriger vers une autre page pour eviter le renvoie du formualaire a la bd
     }
?>

<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <script type="text/javascript" src="formulaire_inscription.js" ></script>
</head>
<body>
    <form name="inscription" method="POST" action="formulaire_inscription.php" onSubmit="return verif_formulaire()">
        <div>
            <label for="pseudo">Choisissez un pseudo :</label><br>
            <input type="text" name="pseudo" id="pseudo" required>
        </div>
        <br>
        <div>
            <label for="password">Choisissez un mot de passe :</label><br>
            <input type="password" name="password" id="password" required>
        </div>
        <br>
        <div>
            <label for="confirmpassword">Confirmer votre mot de passe :</label><br>
            <input type="password" name="confirmpassword" id="confirmpassword" required>
        </div>
        <br>
        <div>
                <label for="email">Donnez un mail valide :</label><br>
                <input type="email" name="admail" id="admail" required>
        </div>
        <br>
        <input type="submit" value="S'inscire" name="validation" >
        <input type="reset" value="Recommencer">
    </form>
</body>
</html>


