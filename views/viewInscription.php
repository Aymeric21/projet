<?php

?>

<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <script type="text/javascript" src="js/formulaire_inscription.js" ></script>
    <link rel="stylesheet" href="css/Inscription.css">
</head>
<body>
<form name="inscription" method="POST" action="inscription" onSubmit="return verif_formulaire()">
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

