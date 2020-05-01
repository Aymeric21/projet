var x=0;
var y=0;

var valid_sinus=0

function fiche_PMA(){
    var elmt =document.getElementById('fiche_medical');
    var elmt2 =document.getElementById('div_PMA');
    if(x%2 == 0)
    {
        elmt.innerHTML = '<img src="images/PMA.png" alt="PMA" id="img_PMA">';

        elmt2.innerHTML=    '  <label for="UA">UA</label>\n' +
                            '  <input type="radio" id="UA" name="PMA" value="UA">\n' +
                            '  <label for="UR">UR</label>\n' +

                            '  <input type="radio" id="UR" name="PMA" value="UR">\n' +
                            '  <label for="DCD">DCD</label>\n' +

                            '  <input type="radio" id="DCD" name="PMA" value="DCD">\n' +
                            '  <label for="CUMP">CUMP</label>\n' +

                            '  <input type="radio" id="CUMP" name="PMA" value="CUMP">\n' +
                            '  <input type="submit" name="envoi_blessé"  value="Valider" id="envoi_blessé" />';

        x=x+1;
    }

    else{
        elmt.innerHTML='';
        elmt2.innerText='';
        x=x+1;

    }
}

function fiche_SINUS() {

    var elmt =document.getElementById('bracelet_sinus');
    var elmt2 = document.getElementById('div_SINUS');

    if( y%2 == 0 )
    {
        elmt.innerHTML='<img src="images/SINUS.jpg" alt="SINUS" id="img_SINUS">';
        elmt2.innerHTML='<input type="text" name="num_sinus" id="num_sinus" placeholder="Entrer le SINUS..." required/>';

        y=y+1;
    }

    else {
        elmt.innerHTML = '';
        elmt2.innerText='';
        y=y+1;
    }
}

function verif_blessé() {
    //si le sinus ne contient pas 21 caractère
    if (document.form_blessé.num_sinus.value.length != 21) {
        alert("Le numéro de SINUS doit contenir 21 caractères ");
        return false;

    }
    //verifier que au moins un bouton radio a été cocher
    for (i = 0; i < document.form_blessé.PMA.length; i++) {
        if (document.form_blessé.PMA[i].checked) return true;
    }
    alert("Veuillez en selectionner un !");
    return false;
}

/*// Un tableau qui va contenir toutes tes images.
var images = new Array();
images.push("images/patient1.PNG");
images.push("images/patient2.PNG");
images.push("images/patient4.jpg");
images.push("images/patient5.jpg");


var pointeur = 0;

//fonction qui eprmet de changer les images a interval de temps
function ChangerImage(){
    document.getElementById("patient1").src = images[pointeur];

    if(pointeur < images.length - 1){
        pointeur++;
    }
    else{
        pointeur = 0;
    }

    setTimeout("ChangerImage()", 2000)
}*/



