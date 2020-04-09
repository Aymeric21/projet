/* fonction pour chaquez roles
    si on peut faire tout dans une même
    fonction on fait
 */
function validRole1()
{
    //modifer le href du bouton valider
    document.getElementById('href').href = 'choixRole&id='+1;

    //on applique tous seulement
    //seulemnt si le role n'est pas en transparant
    //sinon cela voudrai dire qu'un joueur a deja choisis le role

    //on récupère la transparence
    var opa = document.getElementById("role1").style.opacity;
    if(opa != '0.2')
    {

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
        for (i = 1; i <= 6; i++) {
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

function validRole2() {
    //quand on clique sur un des roles

    //on affiche le bouton valider afin
    //de pouvoir valider
    var valid='<a href=""> <button id="js">Valider</button> </a>';
    document.getElementById("validation").innerHTML=valid;

    //maintenir le css
    var elmt =  document.getElementById("role2");
    elmt.style.color = "darkred" ;
    elmt.style.width = "140px" ;
    elmt.style.height = "140px";

    //enlever le maintient de css des autre roles
    //pour quil y est qu'un role selectionné
    var i = 0;
    for(i=1; i<=6; i++)
    {
        if(i!=2)
        {
            var elmt =  document.getElementById("role"+i);
            elmt.style.color = "blue" ;
            elmt.style.width = "120px" ;
            elmt.style.height = "120px";
        }
    }

}

function validRole3() {
    //quand on clique sur un des roles

    //on affiche le bouton valider afin
    //de pouvoir valider
    var valid='<a href=""> <button id="js">Valider</button> </a>';
    document.getElementById("validation").innerHTML=valid;

    //maintenir le css
    var elmt =  document.getElementById("role3");
    elmt.style.color = "darkred" ;
    elmt.style.width = "140px" ;
    elmt.style.height = "140px";

    //enlever le maintient de css des autre roles
    //pour quil y est qu'un role selectionné
    var i = 0;
    for(i=1; i<=6; i++)
    {
        if(i!=3)
        {
            var elmt =  document.getElementById("role"+i);
            elmt.style.color = "blue" ;
            elmt.style.width = "120px" ;
            elmt.style.height = "120px";
        }
    }

}

function validRole4() {
    //quand on clique sur un des roles

    //on affiche le bouton valider afin
    //de pouvoir valider
    var valid='<a href=""> <button id="js">Valider</button> </a>';
    document.getElementById("validation").innerHTML=valid;

    //maintenir le css
    var elmt =  document.getElementById("role4");
    elmt.style.color = "darkred" ;
    elmt.style.width = "140px" ;
    elmt.style.height = "140px";

    //enlever le maintient de css des autre roles
    //pour quil y est qu'un role selectionné
    var i = 0;
    for(i=1; i<=6; i++)
    {
        if(i!=4)
        {
            var elmt =  document.getElementById("role"+i);
            elmt.style.color = "blue" ;
            elmt.style.width = "120px" ;
            elmt.style.height = "120px";
        }
    }

}

function validRole5() {
    //quand on clique sur un des roles

    //on affiche le bouton valider afin
    //de pouvoir valider
    var valid='<a href=""> <button id="js">Valider</button> </a>';
    document.getElementById("validation").innerHTML=valid;

    //maintenir le css
    var elmt =  document.getElementById("role5");
    elmt.style.color = "darkred" ;
    elmt.style.width = "140px" ;
    elmt.style.height = "140px";

    //enlever le maintient de css des autre roles
    //pour quil y est qu'un role selectionné
    var i = 0;
    for(i=1; i<=6; i++)
    {
        if(i!=5)
        {
            var elmt =  document.getElementById("role"+i);
            elmt.style.color = "blue" ;
            elmt.style.width = "120px" ;
            elmt.style.height = "120px";
        }
    }

}

function validRole6() {
    //quand on clique sur un des roles

    //on affiche le bouton valider afin
    //de pouvoir valider
    var valid='<a href=""> <button id="js">Valider</button> </a>';
    document.getElementById("validation").innerHTML=valid;

    //maintenir le css
    var elmt =  document.getElementById("role6");
    elmt.style.color = "darkred" ;
    elmt.style.width = "140px" ;
    elmt.style.height = "140px";

    //enlever le maintient de css des autre roles
    //pour quil y est qu'un role selectionné
    var i = 0;
    for(i=1; i<=6; i++)
    {
        if(i!=6)
        {
            var elmt =  document.getElementById("role"+i);
            elmt.style.color = "blue" ;
            elmt.style.width = "120px" ;
            elmt.style.height = "120px";
        }
    }

}

/*
    fonction qui vérifie que le joueur qui a appuyé
    sur le bouton validé a bien choisis un role

    on va regarder si la bordure est en rouge
    carte quand on appuie sur une carte la bordure
    du bouton sera rouge

 */
function validation() {

    var bouton =document.getElementById("js");
    var boul = bouton.style.borderColor;

    if(boul != 'red')
    {
        alert("vous devez choisir un rôle avant de valider !")
    }
}

