<?php
?>


<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <script type="text/javascript" src="formulaire_connexion.js" ></script>
    <link rel="stylesheet" href="css/Connexion.css">
</head>
<body>
<form name="connexion" method="POST" action="connexion" onSubmit="return verif_formulaire()">
    <div>
        <label for="pseudo">Pseudo :</label><br>
        <input type="text" name="pseudo" id="pseudo" required>
    </div>
    <br>
    <div>
        <label for="password">Mot de passe :</label><br>
        <input type="password" name="password" id="password" required>
    </div>
    <br>
    <input type="submit" value="Se Connecter" name="validation" >
    <input type="reset" value="Recommencer">
</form>
</body>
</html>
