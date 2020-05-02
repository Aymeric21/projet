<?php include('configCSS.php'); ?>

<!doctype html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>Index</title>
        <?php echo '<link rel="stylesheet" href="css/' . $styleChoisi . '.css">' ?>
    </head>

    <body>

    <?php include('views/header.php'); ?>


            <?= //c'est ca qui affiche sur la page
                $content
            ?>

    <?php include('views/footer.php'); ?>

    </body>
</html>
