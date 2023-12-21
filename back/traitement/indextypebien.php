<?php
require_once '../include/connexion_PDO.php';
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/typebien.css">
        <title>Test de CRUD</title>
    </head>

    <body>
        <!-- CREATE JOUEUR -->
        <h2>Ajouter un bien</h2>
        <form action="insertion.php" method="POST">
            <input type="hidden" name="action" value="create_biens">
            <div>
                <label for="nom">Nom du bien :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div>
                <label for="rue">Rue du bien :</label>
                <input type="text" id="rue" name="rue" required>
            </div>
            <div>
                <label for="codep">Code postal du bien :</label>
                <input type="text" id="codep" name="codep" required>
            </div>
            <div>
                <label for="vil">Ville du bien :</label>
                <input type="text" id="vil" name="vil" required>
            </div>
            <div>
                <label for="superficie">Superficie du bien :</label>
                <input type="text" id="superficie" name="superficie" required>
            </div>
            <div>
                <label for="nbpiece">Nombre de pièces :</label>
                <input type="text" id="nbpiece" name="nbpiece" required>
            </div>
            <div>
                <label for="nbchambre">Nombre de chambres :</label>
                <input type="text" id="nbchambre" name="nbchambre" required>
            </div>
            <div>
                <label for="nbcouchage">Nombre de couchages :</label>
                <input type="text" id="nbcouchage" name="nbcouchage" required>
            </div>
            <div>
                <label for="descriptif">Descriptif :</label>
                <input type="text" id="descriptif" name="descriptif" required>
            </div>
            <div>
                <label for="ref">Référence du bien :</label>
                <input type="text" id="ref" name="ref" required>
            </div>
            <div>
                <label for="statut">Statut du bien :</label>
                <input type="text" id="statut" name="statut" required>
            </div>
            <label for="idtype">Type du bien :</label>
            <select id="idtype" name="idtype" required>
                <option value="" selected disabled></option>
                <?php
                if ($typebiens && is_array($typebiens)) {
                    foreach ($typebiens as $typebien) {
                        echo "<option value='{$typebien['id_type_bien']}'>{$typebien['lib_type_bien']}</option>";
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
        <input type="hidden" name="action" value="delete_bien">
        <div>
            <label for="id_bien">Bien :</label>
            <select id="id_bien" name="id_bien" required>
                <option value="" selected disabled></option>
                <?php
                if ($biens && is_array($biens)) {
                    foreach ($biens as $bien) {
                        echo "<option value='{$bien['id_bien']}'>{$bien['nom_bien']} {$bien['id_bien']}</option>";
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
    <form action="modifierbien.php" method="POST">
        <input type="hidden" name="action" value="update_biens">
        <div>
            <label for="idbien">Bien :</label>
            <select id="idbien" name="idbien" required>
                <option value="" selected disabled></option>
                <?php
                if ($biens && is_array($biens)) {
                    foreach ($biens as $bien) {
                        echo "<option value='{$bien['id_bien']}'>{$bien['nom_bien']} {$bien['id_bien']}</option>";
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

    
    
    
    
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une photo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <!-- ... Votre en-tête ici ... -->
    </header>

    <section class="add-photo container">
        <h2>Ajouter une photo</h2>
        <form action="traitement_photo.php" method="POST" enctype="multipart/form-data">
            <label for="photo">Sélectionner une photo :</label>
            <input type="file" name="photo" id="photo" accept="image/*" required>
            <button type="submit" class="btn">Ajouter</button>
        </form>
    </section>

    <section class="footer">
        <!-- ... Votre pied de page ici ... -->
    </section>
</body>
</html>