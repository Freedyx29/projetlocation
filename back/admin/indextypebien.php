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
    <h2>Ajouter un bien</h2>
    <form action="../traitement/insertion.php" method="POST">
        <input type="hidden" name="action" value="create_photos">
            <div>
                <label for="libtype">Nom du type de bien :</label>
                <input type="text" id="libtype" name="libtype" required>
            </div>
        <button type="submit">Créer</button>
    </form>
    <hr> <!-- séparation -->  

    <!-- DELETE JOUEUR -->
    <h2>Supprimer un bien</h2>
    <form action="insertion.php" method="POST">
        <input type="hidden" name="action" value="delete_photos">
            <div>
                <label for="id_type_bien">Type de bien :</label>
                <select id="id_type_bien" name="id_type_bien" required>
                    <option value="" selected disabled></option>
                    <?php 
                    if ($typebiens && is_array($typebiens)) {
                        foreach ($typebiens as $typebien) {
                            echo "<option value='{$typebien['id_type_bien']}'>{$typebien['lib_type_bien']}</option>";
                        }
                    } else {
                        echo "<option value=''>Erreur de récupération des ligues</option>";
                    }?>
                </select>
            </div>
            <button type="submit">Supprimer</button>
    </form>
    <hr> <!-- séparation -->
    
    <!-- UPDATE JOUEUR -->
        <h2>Modifier type de bien</h2>
        <form action="modifiertypebien.php" method="POST">
            <input type="hidden" name="action" value="update_typebien">
            <div>
                <label for="idtype">Type bien à modifier :</label>
                <select id="idtype" name="idtype" required>
                    <option value="" selected disabled></option>
                    <?php
                    if ($typebiens && is_array($typebiens)) {
                        foreach ($typebiens as $typebien) {
                            echo "<option value='{$typebien['id_type_bien']}'>{$typebien['lib_type_bien']}</option>";
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
        
        <h2>Afficher type bien</h2>
        <form action="affichagetypebien.php" method="POST">
            <input type="hidden" name="action" value="affichage_typebien">
            <div>
                <label for="idtype">Type bien à modifier :</label>
                <select id="idtype" name="idtype" required>
                    <option value="" selected disabled></option>
                    <?php
                    if ($typebiens && is_array($typebiens)) {
                        foreach ($typebiens as $typebien) {
                            echo "<option value='{$typebien['id_type_bien']}'>{$typebien['lib_type_bien']}</option>";
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

    
    <div class="buttons-container">
        <button type="button" onclick="location.href='bien.php'">Biens</button>
    </div>

</body> 
</html>