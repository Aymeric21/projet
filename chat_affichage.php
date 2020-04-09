<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $allmsg = $bdd->query('SELECT * FROM chat ORDER BY id ASC ');
    while($msg= $allmsg->fetch())
    {
        ?>
        <b><?php echo $msg['pseudo'] ?> : </b>
        <?php echo $msg['message'] ?><br/>
        <?php
    }
?>