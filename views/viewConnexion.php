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

    <div id="div_connexion">
        <h1>Connecte toi pour Jouer</h1>
        <form name="connexion" method="POST" action="connexion" onSubmit="return verif_formulaire()">
            <table>
                <tr>
                    <td><label for="pseudo">Pseudo :</label></td>
                    <td><input type="text" name="pseudo" id="pseudo" required></td>
                </tr>
                <tr>
                    <td><label for="password">Mot de passe :</label></td>
                    <td><input type="password" name="password" id="password" required></td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Se Connecter" name="validation" >
            <input type="reset" value="Recommencer">
        </form>
    </div>
</form>
</body>
</html>
