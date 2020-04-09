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
            $('#text').load('ChatAffiche').fadeIn("slow");
        },1000);
        setInterval(function(){
            $('#users').load('membreConnecte').fadeIn("slow");
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
                    url: "chatBDD",
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

?>

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
    <a href='deconnexion'>Se Deconnecter</a>;
</div>
