<?php

/*
 * un nouveau blessé toutes les 30 secondes
 */
session_start();
$temps_max = 3600;
$j=0;


/*if ($_SESSION['time']==2720)
{
    echo 'kjrnvrj';
}*/
/*for ($i=0;$i<3600;$i = $i+10)
{
    $temps_max = $temps_max -$i;*/
for ($i=0;$i<3600;$i=$i+60) {
    if ($_SESSION['time'] < $temps_max - $i && $_SESSION['time'] > $temps_max -($i+60))
    {
        $newpatiens = $i/60 +1;
        echo 'Nouveau Bléssé numéro : '.$newpatiens .' ';
        echo ' <map name="rien">
                            <area shape="circle" coords="82,28,28"
                                  href="triage&zone=crane&num_patient='.$newpatiens.'" alt="Crâne"  id="crane" />
                            <area shape="poly" coords="120,110,50,110,50,60,120,60"
                                   href="triage&zone=thorax&num_patient='.$newpatiens.'" alt="Thorax" />
                            <area shape="poly" coords="120,160,47,160,47,115,120,115"
                                   href="triage&zone=abdos&num_patient='.$newpatiens.'" alt="Abdos" />
                            <area shape="poly" coords="140,350,110,350,90,180,120,160"
                                 href="triage&zone=jambe droite&num_patient='.$newpatiens.'" alt="Jambe-droite" />
                            <area shape="poly" coords="65,350,30,350,50,160,80,180"
                                href="triage&zone=jambe gauche&num_patient='.$newpatiens.'"  alt="Jambe-gauche" />
                            <area shape="poly" coords="175,205,150,220,120,100,135,70"
                                 href="triage&zone=bras droit&num_patient='.$newpatiens.'"  alt="Bras-droit" />
                            <area shape="poly" coords="17,220,-15,220,20,70,60,100"
                                 href="triage&zone=bras gauche&num_patient='.$newpatiens.'"  alt="Bras-gauche" />
                        </map>';
        echo "<img  src='images/patient0.PNG' alt='patients' id='patient1' usemap='#rien'>";


    }
}


?>
