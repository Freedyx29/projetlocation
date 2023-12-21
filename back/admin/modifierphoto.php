<?php
require_once '../include/connexion_PDO.php';
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test de CRUD</title>
    </head>

    <body>
            <div>
                <?php
                $id_photo = $_POST['idphoto'];

                $photo_info = get_one_photos($id_photo);

                if ($photo_info) {
                    $nom = $photo_info['nom_photo'];
                    $lib = $photo_info['lib_photo'];
                    $idbien = $photo_info['id_bien'];
                    
                    $nom = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
                    $idbien = htmlspecialchars($idbien, ENT_QUOTES, 'UTF-8');
                    ?>

                    <h2>Ajouter une photo</h2>
                    <form action="../traitement/insertion.php" method="POST">
                        <input type="hidden" name="action" value="update_photos">
                        <div>
                            <input type="hidden" value="<?php echo $id_photo ?>" id="idphoto" name="idphoto" required>
                        </div>
                        <div>
                            <label for="nom">Nom de la photo :</label>
                            <input type="text" value="<?php echo $nom ?>" id="nom" name="nom" required>
                        </div>
                        <div>
                            <label for="photo">Photo :</label>
                            <input type="file" id="lib" name="lib" accept="image/*" required>
                        </div>

                        <div>
                            <label for="idbien">Bien associé :</label>
                            <select id="idbien" name="idbien" required>
                                <option value="" selected disabled></option>
    <?php
    if ($biens && is_array($biens)) {
        foreach ($biens as $bien) {
            echo "<option value='{$bien['id_bien']}'>{$bien['nom_bien']}</option>";
        }
    } else {
        echo "<option value=''>Erreur de récupération des types bien</option>";
    }
    ?>
                            </select>
                        </div>
                        <button type="submit">Créer</button>
                    </form>
    <?php
} else {
    header('Location: erreur.php');
    exit();
}
?>
            </div>
        </form>
        <hr> <!-- séparation -->
    </body>
</html>
