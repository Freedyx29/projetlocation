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
        <!-- CREATE JOUEUR -->
        <h2>Ajouter une photo</h2>
        <form action="insertion.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="create_photos">
            <div>
                <label for="nom">Nom de la photo :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div>
                <label for="photo">Photo :</label>
                <input type="file" id="photo" name="photo" accept="image/*" required>
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
        <hr> <!-- séparation -->  

        <!-- DELETE JOUEUR -->
        <h2>Supprimer un bien</h2>
        <form action="insertion.php" method="POST">
            <input type="hidden" name="action" value="delete_photos">
            <div>
                <label for="id_phot">Photo :</label>
                <select id="id_photo" name="id_photo" required>
                    <option value="" selected disabled></option>
                    <?php
                    if ($photos && is_array($photos)) {
                        foreach ($photos as $photo) {
                            echo "<option value='{$photo['id_photo']}'>{$photo['nom_photo']}</option>";
                        }
                    } else {
                        echo "<option value=''>Erreur de récupération des ligues</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit">Supprimer</button>
        </form>
        <hr> <!-- séparation -->

        <!-- UPDATE JOUEUR -->
        <h2>Modifier son compte</h2>
        <form action="modifierphoto.php" method="POST">
            <input type="hidden" name="action" value="update_photos">
            <div>
                <label for="idphoto">Client :</label>
                <select id="idphoto" name="idphoto" required>
                    <option value="" selected disabled></option>
                    <?php
                    if ($photos && is_array($photos)) {
                        foreach ($photos as $photo) {
                            echo "<option value='{$photo['id_photo']}'>{$photo['nom_photo']}</option>";
                        }
                    } else {
                        echo "<option value=''>Erreur de récupération des clients</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit">Modifier</button>
        </form>
        <hr> <!-- séparation -->

        <h2>Afficher un bien</h2>
        <form action="affichagephoto.php" method="POST">
            <input type="hidden" name="action" value="affichage_photos">
            <div>
                <label for="idphoto">Bien :</label>
                <select id="idphoto" name="idphoto" required>
                    <option value="" selected disabled></option>
                    <?php
                    if ($photos && is_array($photos)) {
                        foreach ($photos as $photo) {
                            echo "<option value='{$photo['id_photo']}'>{$photo['nom_photo']} {$photo['id_photo']}</option>";
                        }
                    } else {
                        echo "<option value=''>Erreur de récupération des clients</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit">Afficher</button>
        </form>
        <hr> <!-- séparation -->

        <div class="buttons-container">
            <button type="button" onclick="location.href = 'bien.php'">Biens</button>
        </div>

    </body> 
</html>

