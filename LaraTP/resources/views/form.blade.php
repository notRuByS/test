<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">

<head>
    <title>Upload d'une image sur le serveur !</title>
</head>

<body>
    <?php
    if (!empty($message)) {
        echo '<p>', "\n";
        echo "\t\t<strong>", htmlspecialchars($message), "</strong>\n";
        echo "\t</p>\n\n";
    }
    ?>
    <!-- Debut du formulaire -->
    <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <fieldset>
            <legend>Formulaire</legend>
            <p>
                <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer le fichier :</label>
                <input name="fichier" type="file" id="fichier_a_uploader" />
                <input type="submit" name="submit" value="Uploader" />
            </p>
        </fieldset>
    </form>
    <!-- Fin du formulaire -->
</body>

</html>