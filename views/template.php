<?php
    include('configCSS.php');
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Index</title>
    <?php echo '<link rel="stylesheet" href="css/' . $styleChoisi . '.css" media="all">' ?>
</head>

<body>

<?php
    include('header.php');
?>



        <?= //c'est ca qui affiche sur la page
            $content
        ?>


<?php
    include('footer.php');
?>

</body>
</html>
