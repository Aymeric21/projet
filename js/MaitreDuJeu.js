
var pause= document.getElementById('bouton_pause');
var reprendre= document.getElementById('bouton_reprendre');

var x = 0;
var y = 0;

//pour ne pas pouvoir cliquer deux fois sur le bouton pause
//channge également le style
function p(){

    var pause= document.getElementById('bouton_pause');
    var reprendre= document.getElementById('bouton_reprendre');



    if(x==1)
    {
        return false
    }else {
        pause.style.opacity = '0.2';
        reprendre.style.opacity = '1';
        x=1;
        y=0;
    }

}

//pour ne pas pouvoir cliquer deux fois sur le bouton reprendre
//change egalement le style
function r() {

    var pause= document.getElementById('bouton_pause');
    var reprendre= document.getElementById('bouton_reprendre');

    if(y==1)
    {
        return false
    }else {
        reprendre.style.opacity = '0.2';
        pause.style.opacity = '1';
        y=1;
        x=0;
    }
}