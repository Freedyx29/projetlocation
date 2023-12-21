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
    <h2>Ajouter une réservation</h2>
    <form action="../traitement/insertion.php" method="POST">
        <input type="hidden" name="action" value="create_reservations">
            <div>
                <label for="date">Date de la réservation :</label>
                <input type="text" id="date" name="date" required>
            </div>
            <div>
                <label for="datedebut">Début de la réservation :</label>
                <input type="text" id="datedebut" name="datedebut" required>
            </div>
            <div>
                <label for="datefin">Fin de la réservation :</label>
                <input type="text" id="datefin" name="datefin" required>
            </div>
            <div>
                <label for="commentaire">Commentaire :</label>
                <input type="text" id="commentaire" name="commentaire" required>
            </div>
        <div>
                <label for="moderation">Modération :</label>
                <input type="text" id="moderation" name="moderation" required>
            </div>
        <div>
                <label for="annulation">Annulation :</label>
                <input type="text" id="annulation" name="annulation" required>
        </div>
        <div>
                <label for="idclient">Client :</label>
                <select id="idclient" name="idclient" required>
                    <option value="" selected disabled></option>
                    <?php 
                    if ($clients && is_array($clients)) {
                        foreach ($clients as $client) {
                            echo "<option value='{$client['id_client']}'>{$client['nom_client']} {$client['nom_client']}</option>";
                        }
                    } else {
                        echo "<option value=''>Erreur de récupération du client</option>";
                    }?>
                </select>
            </div>
        <div>
                <label for="idbien">Le bien :</label>
                <select id="idbien" name="idbien" required>
                    <option value="" selected disabled></option>
                    <?php 
                    if ($biens && is_array($biens)) {
                        foreach ($biens as $bien) {
                            echo "<option value='{$bien['id_bien']}'>{$bien['nom_bien']}</option>";
                        }
                    } else {
                        echo "<option value=''>Erreur de récupération des biens</option>";
                    }?>
                </select>
            </div>
        <button type="submit">Créer</button>
    </form>
    <hr> <!-- séparation -->  

    <!-- DELETE JOUEUR -->
    <h2>Supprimer une réservation</h2>
    <form action="insertion.php" method="POST">
        <input type="hidden" name="action" value="delete_reservations">
            <div>
                <label for="id_reservation">Bien :</label>
                <select id="id_reservation" name="id_reservation" required>
                    <option value="" selected disabled></option>
                    <?php 
                    if ($reservations && is_array($reservations)) {
                        foreach ($reservations as $reservation) {
                            echo "<option value='{$reservation['id_reservation']}'>{$reservation['id_reservation']}</option>";
                        }
                    } else {
                        echo "<option value=''>Erreur de récupération des réservations</option>";
                    }?>
                </select>
            </div>
            <button type="submit">Supprimer</button>
    </form>
    <hr> <!-- séparation -->
    
    <!-- UPDATE JOUEUR -->
        <h2>Modifier son compte</h2>
        <form action="modifierreservation.php" method="POST">
            <input type="hidden" name="action" value="update_reservations">
            <div>
                <label for="idreservation">Réservation :</label>
                <select id="idreservation" name="idreservation" required>
                    <option value="" selected disabled></option>
                    <?php
                    if ($reservations && is_array($reservations)) {
                        foreach ($reservations as $reservation) {
                            echo "<option value='{$reservation['id_reservation']}'>{$reservation['id_reservation']} {$reservation['id_client']}</option>";
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
        
        <h2>Afficher réservation</h2>
        <form action="affichagereservation.php" method="POST">
            <input type="hidden" name="action" value="affichage_reservations">
            <div>
                <label for="idreservation">Réservation :</label>
                <select id="idreservation" name="idreservation" required>
                    <option value="" selected disabled></option>
                    <?php
                    if ($reservations && is_array($reservations)) {
                        foreach ($reservations as $reservation) {
                            echo "<option value='{$reservation['id_reservation']}'>{$reservation['id_reservation']} {$reservation['id_client']}</option>";
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
        <button type="button" onclick="location.href='bien.php'">Biens</button>
    </div>

</body> 
</html>