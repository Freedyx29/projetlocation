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
    <h2>Contacts</h2>
    <form action="../traitement/insertion.php" method="POST">
        <input type="hidden" name="action" value="create_contact">
            <div>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div>
                <label for="prenom">prenom :</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div>
                <label for="mail">Votre mail :</label>
                <input type="mail" id="mail" name="mail" required>
            </div>
        <div>
                <label for="tel">Votre téléphone :</label>
                <input type="tel" id="tel" name="tel" required>
        </div>
        <div>
                <label for="mess">Votre message :</label>
                <input type="text" id="mess" name="mess" required>
            </div>
        <button type="submit">Créer</button>
    </form>
    <hr> <!-- séparation -->  

    <!-- DELETE JOUEUR -->
    <h2>Supprimer un bien</h2>
    <form action="insertion.php" method="POST">
        <input type="hidden" name="action" value="delete_contact">
            <div>
                <label for="idcontact">Message :</label>
                <select id="idcontact" name="idcontact" required>
                    <option value="" selected disabled></option>
                    <?php 
                    if ($contacts && is_array($contacts)) {
                        foreach ($contacts as $contact) {
                            echo "<option value='{$contact['id_contact']}'>{$contact['nom']} {$contact['prenom']}</option>";
                        }
                    } else {
                        echo "<option value=''>Erreur de récupération des ligues</option>";
                    }?>
                </select>
            </div>
            <button type="submit">Supprimer</button>
    </form>
    <hr> <!-- séparation -->
    
        <h2>afficher un compte</h2>
        <form action="affichagecontact.php" method="POST">
            <input type="hidden" name="action" value="affichage_contact">
            <div>
                <label for="idcontact">Tarifs :</label>
                <select id="idcontact" name="idcontact" required>
                    <option value="" selected disabled></option>
                    <?php
                    if ($contacts && is_array($contacts)) {
                        foreach ($contacts as $contact) {
                            echo "<option value='{$contact['id_contact']}'>{$contact['nom']} {$contact['prenom']}</option>";
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