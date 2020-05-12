<div id="menu_bas">
    <form method="get" action="index.php">
        <select name="style">
            <?php
            //On affiche dynamiquement tous les styles disponibles
            foreach($styles as $cle => $valeur)
            {
                if($cle !== $styleChoisi)
                {
                    echo '<option value="' . $cle . '">' . $valeur . '</option>';
                }
                else//On met en "selected" le style choisi pour la page
                {
                    echo '<option value="' . $cle . '" selected="selected">' . $valeur . '</option>';
                }
            }
            ?>
        </select>
        <input type="submit" value="Changer le style">
    </form>
</div>