/*setTimeout(function(){elmt = document.getElementById('elmt').textContent;
    alert(elmt);  }, 3000);

function destinataire()
{


}*/

function reduire(){
    var chat =document.getElementById('chat');
    chat.innerHTML = '                <tr>\n' +
                  '                    <td id="com" onclick="conv()">Cliquez pour ouvrir la Communication</td>\n' +
                     '                </tr>'
}

function conv() {
    var chat =document.getElementById('chat');
    chat.innerHTML = ' <tr>\n' +
        '        <!-- zone des messages -->\n' +
        '        <td valign="top" id="text-td">\n' +
        '            <div id="annonce">\n' +
        '                    <button id="reduire" onclick="reduire()" >-</button>\n' +
        '            </div>\n' +
        '            <div id="text">\n' +
        '\n' +
        '            </div>\n' +
        '        </td>\n' +
        '\n' +
        '        <!-- colonne avec les membres connectés au chat -->\n' +
        '        <td valign="top" id="users-td">\n' +
        '            <div id="users">\n' +
        '\n' +
        '            </div>\n' +
        '        </td>\n' +
        '        <!-- Zone de texte //////////////////////////////////////////////////////// -->\n' +
        '        <td >\n' +
        '    <tr>\n' +
        '        <td id="post_message">\n' +
        '            <form id="chatform" action="" method="POST">\n' +
        '                <input type="text" name="message" id="message" placeholder="Ecrire votre message..." maxlength="255" />\n' +
        '                <input type="submit" name="envoimess"  value="Envoyer" id="envoimess" />\n' +
        '                <div id="div_listeRole">\n' +
        '                    <label for="_listeRole" id="lab_listeRole">Destinataire ?</label>\n' +
        '                    <select id="_listeRole" name="_listeRole" size="1">\n' +
        '\n' +
        '                    </select>\n' +
        '                </div>\n' +
        '\n' +
        '            </form>\n' +
        '        </td>\n' +
        '    </tr>\n' +
        '    </td>\n' +
        '    </tr>';
}