 <head>
        <title>chat</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/chat.css">
        <?php //LIBRAIRIE AJAX JQUERY ?>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
     <script>
            setInterval(function(){
                $('#text').load('chat_affichage.php').fadeIn("slow");
            },1000);
            setInterval(function(){
                $('#users').load('membre_connecté.php').fadeIn("slow");
            },1000);
            $(document).ready(function () {
                var $form = $('#chatform');
                $('#envoimess').on('click', function () {
                    $form.trigger('submit');
                    return false;
                });
                $form.on('submit', function () {
                    var message = $('#message').val();
                    $.ajax({
                        url: "chat_bdd.php",
                        type: "POST",
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function (json) {
                            document.getElementById('message').value = document.getElementById('message').defaultValue;
                        }
                    });
                    return false;
                });
            });
        </script>
 </head>
    <?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    echo $_SESSION['pseudo'];
    if(!isset($_SESSION['pseudo']))//POUR VERIFIER SI UN UTILISATEUR S'EST BIEN CONNECTER
    {
        header("Location:formulaire_connexion.php");
    }
    ?>
        <!-- Statut //////////////////////////////////////////////////////// -->
        <table class="status"><tr>
                <td>
                    <span id="statusResponse"></span>
                    <select name="status" id="status" style="width:200px;" onchange="setStatus(this)">
                        <option value="0">Absent</option>
                        <option value="1" selected>En ligne</option>
                    </select>
                </td>
            </tr>
        </table>
        <table class="chat">
            <tr>
                <!-- zone des messages -->
                <td valign="top" id="text-td">
                    <div id="annonce"></div>
                    <div id="text">

                    </div>
                </td>

                <!-- colonne avec les membres connectés au chat -->
                <td valign="top" id="users-td">
                    <div id="users">

                    </div>
                </td>
                <!-- Zone de texte //////////////////////////////////////////////////////// -->
                <td >
                    <tr>
                            <td id="post_message">
                                <form id="chatform" action="" method="POST">
                                    <input type="text" name="message" id="message" placeholder="Ecrire votre message..." maxlength="255" />
                                    <input type="submit" name="envoimess"  value="Envoyer" id="envoimess" />
                                </form>
                            </td>
                    </tr>
                </td>
            </tr>
        </table>

    <div>
        <a href='deconnexion.php'>Se Deconnecter</a>;
    </div>
