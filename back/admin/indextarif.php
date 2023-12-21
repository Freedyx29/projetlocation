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
        <input type="hidden" name="action" value="create_tarifs">
            <div>
                <label for="datedebut">Date de début :</label>
                <input type="date" id="datedebut" name="datedebut" required>
            </div>
            <div>
                <label for="datefin">Date de fin :</label>
                <input type="date" id="datefin" name="datefin" required>
            </div>
            <div>
                <label for="prix">Prix de la location :</label>
                <input type="text" id="prix" name="prix" required>
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
                        echo "<option value=''>Erreur de récupération des ligues</option>";
                    }?>
                </select>
            </div>
        <button type="submit">Créer</button>
    </form>
    <hr> <!-- séparation -->  

    <!-- DELETE JOUEUR -->
    <h2>Supprimer un bien</h2>
    <form action="insertion.php" method="POST">
        <input type="hidden" name="action" value="delete_tarifs">
            <div>
                <label for="id_tarif">Tarifs :</label>
                <select id="id_tarif" name="id_tarif" required>
                    <option value="" selected disabled></option>
                    <?php 
                    if ($tarifs && is_array($tarifs)) {
                        foreach ($tarifs as $tarif) {
                            echo "<option value='{$tarif['id_tarif']}'>{$tarif['id_tarif']}</option>";
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
        <h2>Modifier son compte</h2>
        <form action="modifiertarif.php" method="POST">
            <input type="hidden" name="action" value="update_tarifs">
            <div>
                <label for="idtarif">Tarifs :</label>
                <select id="idtarif" name="idtarif" required>
                    <option value="" selected disabled></option>
                    <?php
                    if ($tarifs && is_array($tarifs)) {
                        foreach ($tarifs as $tarif) {
                            echo "<option value='{$tarif['id_tarif']}'>{$tarif['id_tarif']}</option>";
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
        
        <h2>Modifier son compte</h2>
        <form action="affichagetarif.php" method="POST">
            <input type="hidden" name="action" value="affichage_tarifs">
            <div>
                <label for="idtarif">Tarifs :</label>
                <select id="idtarif" name="idtarif" required>
                    <option value="" selected disabled></option>
                    <?php
                    if ($tarifs && is_array($tarifs)) {
                        foreach ($tarifs as $tarif) {
                            echo "<option value='{$tarif['id_tarif']}'>{$tarif['id_tarif']}</option>";
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