/* fonction pour chaquez roles
    si on peut faire tout dans une même
    fonction on fait
 */
function validRole1()
{
    //on applique tous seulement
    //seulemnt si le role n'est pas en transparant
    //sinon cela voudrai dire qu'un joueur a deja choisis le role

    //on récupère la transparence
    var opa = document.getElementById("role1").style.opacity;
    if(opa != '0.2')
    {
        //modifer le href du bouton valider
        document.getElementById('validation').innerHTML = '<form action="ChoixRole&id=1&role=Maitre du Jeu" method="POST">\n' +
            '                <input type="submit" name="clique" value="Valider" id="js" onclick="validation()"/>\n' +
            '            </form>';

        //quand on clique sur un des roles
        var bouton = document.getElementById('js');
        bouton.style.borderColor = "red";

        //maintenir le css
        var elmt = document.getElementById("role1");
        elmt.style.color = "darkred";
        elmt.style.width = "140px";
        elmt.style.height = "140px";

        //enlever le maintient de css des autre roles
        //pour quil y est qu'un role selectionné
        var i = 0;
        for (i = 1; i <= 7; i++) {
            if (i != 1) {
                var elmt = document.getElementById("role" + i);
                elmt.style.color = "blue";
                elmt.style.width = "120px";
                elmt.style.height = "120px";

            }
        }
    }//sinon on enlève le style du hover
        //qui s'applique quand on passe la souris
    else{
        document.getElementById('role1').onmouseover = document.getElementById('role1').style.color='blue'
    }

}

function validRole2()
{
    //on applique tous seulement
    //seulemnt si le role n'est pas en transparant
    //sinon cela voudrai dire qu'un joueur a deja choisis le role

    //on récupère la transparence
    var opa = document.getElementById("role2").style.opacity;
    if(opa != '0.2')
    {
        //modifer le href du bouton valider
        document.getElementById('validation').innerHTML = '<form action="ChoixRole&id=2&role=COS" method="POST">\n' +
            '                <input type="submit" name="clique"  value="Valider" id="js" onclick="validation()"/>\n' +
            '            </form>';

        //quand on clique sur un des roles
        var bouton = document.getElementById('js');
        bouton.style.borderColor = "red";

        //maintenir le css
        var elmt = document.getElementById("role2");
        elmt.style.color = "darkred";
        elmt.style.width = "140px";
        elmt.style.height = "140px";

        //enlever le maintient de css des autre roles
        //pour quil y est qu'un role selectionné
        var i = 0;
        for (i = 1; i <= 7; i++) {
            if (i != 2) {
                var elmt = document.getElementById("role" + i);
                elmt.style.color = "blue";
                elmt.style.width = "120px";
                elmt.style.height = "120px";

            }
        }
    }//sinon on enlève le style du hover
    //qui s'applique quand on passe la souris
    else{
        document.getElementById('role2').onmouseover = document.getElementById('role2').style.color='blue'
    }

}

function validRole3()
{
    //on applique tous seulement
    //seulemnt si le role n'est pas en transparant
    //sinon cela voudrai dire qu'un joueur a deja choisis le role

    //on récupère la transparence
    var opa = document.getElementById("role3").style.opacity;
    if(opa != '0.2')
    {
        //modifer le href du bouton valider
        document.getElementById('validation').innerHTML = '<form action="ChoixRole&id=3&role=CRRA" method="POST">\n' +
            '                <input type="submit" name="clique" value="Valider" id="js" onclick="validation()"/>\n' +
            '            </form>';

        //quand on clique sur un des roles
        var bouton = document.getElementById('js');
        bouton.style.borderColor = "red";

        //maintenir le css
        var elmt = document.getElementById("role3");
        elmt.style.color = "darkred";
        elmt.style.width = "140px";
        elmt.style.height = "140px";

        //enlever le maintient de css des autre roles
        //pour quil y est qu'un role selectionné
        var i = 0;
        for (i = 1; i <= 7; i++) {
            if (i != 3) {
                var elmt = document.getElementById("role" + i);
                elmt.style.color = "blue";
                elmt.style.width = "120px";
                elmt.style.height = "120px";

            }
        }
    }//sinon on enlève le style du hover
    //qui s'applique quand on passe la souris
    else{
        document.getElementById('role3').onmouseover = document.getElementById('role3').style.color='blue'
    }

}

function validRole4()
{
    //on applique tous seulement
    //seulemnt si le role n'est pas en transparant
    //sinon cela voudrai dire qu'un joueur a deja choisis le role

    //on récupère la transparence
    var opa = document.getElementById("role4").style.opacity;
    if(opa != '0.2')
    {
        //modifer le href du bouton valider
        document.getElementById('validation').innerHTML = '<form action="ChoixRole&id=4&role=DSM" method="POST">\n' +
            '                <input type="submit" name="clique" value="Valider" id="js" onclick="validation()"/>\n' +
            '            </form>';

        //quand on clique sur un des roles
        var bouton = document.getElementById('js');
        bouton.style.borderColor = "red";

        //maintenir le css
        var elmt = document.getElementById("role4");
        elmt.style.color = "darkred";
        elmt.style.width = "140px";
        elmt.style.height = "140px";

        //enlever le maintient de css des autre roles
        //pour quil y est qu'un role selectionné
        var i = 0;
        for (i = 1; i <= 7; i++) {
            if (i != 4) {
                var elmt = document.getElementById("role" + i);
                elmt.style.color = "blue";
                elmt.style.width = "120px";
                elmt.style.height = "120px";

            }
        }
    }//sinon on enlève le style du hover
    //qui s'applique quand on passe la souris
    else{
        document.getElementById('role4').onmouseover = document.getElementById('role4').style.color='blue'
    }

}

function validRole5()
{

    //on applique tous seulement
    //seulemnt si le role n'est pas en transparant
    //sinon cela voudrai dire qu'un joueur a deja choisis le role

    //on récupère la transparence
    var opa = document.getElementById("role5").style.opacity;
    if(opa != '0.2')
    {
        //modifer le href du bouton valider
        document.getElementById('validation').innerHTML = '<form action="ChoixRole&id=5&role=EVAC" method="POST">\n' +
            '                <input type="submit" name="clique" value="Valider" id="js" onclick="validation()"/>\n' +
            '            </form>';

        //quand on clique sur un des roles
        var bouton = document.getElementById('js');
        bouton.style.borderColor = "red";

        //maintenir le css
        var elmt = document.getElementById("role5");
        elmt.style.color = "darkred";
        elmt.style.width = "140px";
        elmt.style.height = "140px";

        //enlever le maintient de css des autre roles
        //pour quil y est qu'un role selectionné
        var i = 0;
        for (i = 1; i <= 7; i++) {
            if (i != 5) {
                var elmt = document.getElementById("role" + i);
                elmt.style.color = "blue";
                elmt.style.width = "120px";
                elmt.style.height = "120px";

            }
        }
    }//sinon on enlève le style du hover
    //qui s'applique quand on passe la souris
    else{
        document.getElementById('role5').onmouseover = document.getElementById('role5').style.color='blue'
    }

}


function validRole6()
{

    //on applique tous seulement
    //seulemnt si le role n'est pas en transparant
    //sinon cela voudrai dire qu'un joueur a deja choisis le role

    //on récupère la transparence
    var opa = document.getElementById("role6").style.opacity;
    if(opa != '0.2')
    {
        //modifer le href du bouton valider
        document.getElementById('validation').innerHTML = '<form action="ChoixRole&id=6&role=COPG" method="POST">\n' +
            '                <input type="submit" name="clique" value="Valider" id="js" onclick="validation()"/>\n' +
            '            </form>';

        //quand on clique sur un des roles
        var bouton = document.getElementById('js');
        bouton.style.borderColor = "red";

        //maintenir le css
        var elmt = document.getElementById("role6");
        elmt.style.color = "darkred";
        elmt.style.width = "140px";
        elmt.style.height = "140px";

        //enlever le maintient de css des autre roles
        //pour quil y est qu'un role selectionné
        var i = 0;
        for (i = 1; i <= 7; i++) {
            if (i != 6) {
                var elmt = document.getElementById("role" + i);
                elmt.style.color = "blue";
                elmt.style.width = "120px";
                elmt.style.height = "120px";

            }
        }
    }//sinon on enlève le style du hover
    //qui s'applique quand on passe la souris
    else{
        document.getElementById('role6').onmouseover = document.getElementById('role6').style.color='blue'
    }

}

function validRole7()
{

    //on applique tous seulement
    //seulemnt si le role n'est pas en transparant
    //sinon cela voudrai dire qu'un joueur a deja choisis le role

    //on récupère la transparence
    var opa = document.getElementById("role7").style.opacity;
    if(opa != '0.2')
    {
        //modifer le href du bouton valider
        document.getElementById('validation').innerHTML = '<form action="ChoixRole&id=7&role=Triage" method="POST">\n' +
            '                <input type="submit" name="clique" value="Valider" id="js" onclick="validation()"/>\n' +
            '            </form>';

        //quand on clique sur un des roles
        var bouton = document.getElementById('js');
        bouton.style.borderColor = "red";

        //maintenir le css
        var elmt = document.getElementById("role7");
        elmt.style.color = "darkred";
        elmt.style.width = "140px";
        elmt.style.height = "140px";

        //enlever le maintient de css des autre roles
        //pour quil y est qu'un role selectionné
        var i = 0;
        for (i = 1; i <= 7; i++) {
            if (i != 7) {
                var elmt = document.getElementById("role" + i);
                elmt.style.color = "blue";
                elmt.style.width = "120px";
                elmt.style.height = "120px";

            }
        }
    }//sinon on enlève le style du hover
    //qui s'applique quand on passe la souris
    else{
        document.getElementById('role7').onmouseover = document.getElementById('role7').style.color='blue'
    }

}

//quand on clique sur le bouton valider
function validation() {

    var bouton =document.getElementById("js");
    var boul = bouton.style.borderColor;

    //si la bordure du bouton n'est pas rouge
    //c'est que le joueur n'a pas encore choisis un role
    if(boul != 'red')
    {
        alert("vous devez choisir un rôle avant de valider !")
    }

}

