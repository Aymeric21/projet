function f() {
    /*  var elmt = document.getElementById('20.20');
      elmt.innerHTML = '<img  src=\'images/tante_pma.png\' alt=\'tente\' id=\'tente_pma\' >';
      elmt.style.backgroundColor=  'red';*/

  /*  var elmt = document.getElementById('19.24');
    elmt.innerHTML = '<img  src=\'images/accident.png\' alt=\'accident\' id=\'accident\' >';

    var elmt = document.getElementById('10.10');
    elmt.innerHTML = '<img  src=\'images/img_police.png\' alt=\'accident\' id=\'police\' >';
    elmt.style.border = 'solid red 2px';

    var elmt = document.getElementById('20.50');
    elmt.innerHTML = '<img  src=\'images/policier.png\' alt=\'accident\' id=\'policier\' >';
    elmt.style.border = 'solid red 2px';*/

}

var x=0;
var y=0;
function select1()
{

        var elmt1 =document.getElementById('img_police');
        elmt1.style.border = 'solid red 2px';

        var elmt2 =document.getElementById('img_policier');
        elmt2.style.border = '';


}

function select2()
{

        var elmt2 =document.getElementById('img_policier');
        elmt2.style.border = 'solid red 2px';

        var elmt1 =document.getElementById('img_police');
        elmt1.style.border = '';


}