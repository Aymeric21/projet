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
    <div id="div_inscription">
        <h1>Inscrit toi sur le Serious Game</h1>
        <form name="inscription" method="POST" action="inscription" onSubmit="return verif_formulaire()">
            <table>
                <tr>
                    <td><label for="pseudo">Choisissez un pseudo :</label></td>
                    <td><input type="text" name="pseudo" id="pseudo" required></td>
                </tr>
                <tr>
                    <td><label for="password">Choisissez un mot de passe :</label></td>
                    <td><input type="password" name="password" id="password" required></td>
                </tr>
                <tr>
                    <td><label for="confirmpassword">Confirmer votre mot de passe :</label></td>
                    <td><input type="password" name="confirmpassword" id="confirmpassword" required></td>
                </tr>
                <tr>
                    <td><label for="email">Donnez un mail valide :</label></td>
                    <td><input type="email" name="admail" id="admail" required></td>
                </tr>
            </table>
            <br>
            <input type="submit" value="S'inscire" name="validation" >
            <input type="reset" value="Recommencer">
        </form>
    </div>
</body>
</html>

