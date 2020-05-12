<head>
    <title>chat</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="js/Chat.js"></script>
    <link rel="stylesheet" type="text/css" href="css/chat.css?t=<? echo time(); ?>media="all"" >
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
            remplirListeDestinataires();
        },1000);
        $(document).ready(function () {
            //lancer la fonction pour la liste de personne connecter
            //pour le chat
            var $form = $("#chatform");
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

        function remplirListeDestinataires(){
            const AjaxRequest = new XMLHttpRequest();
            const listRole = document.getElementById('_listeRole');
            var destinataire = '';
            if( listRole.options.length > 0 ){
                destinataire = listRole.options[listRole.selectedIndex].value;
            }

            AjaxRequest.open("GET", "membreConnecte&fonction=listeDestinataires");
            AjaxRequest.onload = function(){
                const result = JSON.parse(AjaxRequest.responseText);
                const html = result.map((function (connecte) {
                        if(connecte.pseudo === destinataire){
                            return `<option value="${connecte.pseudo}" selected> ${connecte.pseudo} </option>`
                        }
                        else{
                            return `<option value="${connecte.pseudo}" > ${connecte.pseudo} </option>`                      }
                })).join('');

                listRole.innerHTML = html;
            };
            AjaxRequest.send();
        }
    </script>

</head>
<?php

?>
<body >
<table id="chat" >
    <tr>
        <!-- zone des messages -->
        <td valign="top" id="text-td">
            <div id="annonce">
                    <button id="reduire" onclick="reduire()" >-</button>
            </div>
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
                <div id="div_listeRole">
                    <label for="_listeRole" id="lab_listeRole">Destinataire ?</label>
                    <select id="_listeRole" name="_listeRole" size="1">

                    </select>
                </div>

            </form>
        </td>
    </tr>
    </td>
    </tr>
</table>

<div>
    <a id="deconnexion" href='deconnexion'>Se Deconnecter</a>
</div>
</body>