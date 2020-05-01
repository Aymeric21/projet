<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$zone = $_GET['zone'];

echo $zone;

/*$reqlesion = $bdd->query("SELECT * FROM lesion " );
while($lesion = $reqlesion->fetch()) {

    echo $lesion['partie du corp'];
}

<table id="tableSymptomes">
    <thead>
    <tr>
        <th>M.A.R.C.H.</th>
        <th>Lésions</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Hémorragie</td>
        <td></td>
    </tr>
    <tr>
        <td>Voies aériennes</td>
        <td></td>
    </tr>
    <tr>
        <td>Respiration</td>
        <td></td>
    </tr>
    <tr>
        <td>Circulation</td>
        <td></td>
    </tr>
    <tr>
        <td>Neuro</td>
        <td></td>
    </tr>
    </tbody>
</table>

?>



<table id="tableSymptomes">
    <thead>
    <tr>
        <th>M.A.R.C.H.</th>
        <th>Lésions</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Hémorragie</td>
        <td></td>
    </tr>
    <tr>
        <td>Voies aériennes</td>
        <td></td>
    </tr>
    <tr>
        <td>Respiration</td>
        <td></td>
    </tr>
    <tr>
        <td>Circulation</td>
        <td></td>
    </tr>
    <tr>
        <td>Neuro</td>
        <td></td>
    </tr>
    </tbody>
</table>*/

?>
