<?php
require_once("../include/connexion_PDO.php");
?><h2>Supprimer son compte</h2>
        <form action="../traitement/insertion.php" method="POST">
            <input type="hidden" name="action" value="delete_clients">
            <div>
                <label for="id_client">Client :</label>
                <select id="id_client" name="id_client" required>
                    <option value="" selected disabled></option>
                    <?php
                    if ($clients && is_array($clients)) {
                        foreach ($clients as $client) {
                            echo "<option value='{$client['id_client']}'>{$client['nom_client']} {$client['prenom_client']}</option>";
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
        <form action="modifierclient.php" method="POST">
            <input type="hidden" name="action" value="update_clients">
            <div>
                <label for="idclient">Client :</label>
                <select id="idclient" name="idclient" required>
                    <option value="" selected disabled></option>
                    <?php
                    if ($clients && is_array($clients)) {
                        foreach ($clients as $client) {
                            echo "<option value='{$client['id_client']}'>{$client['nom_client']} {$client['prenom_client']}</option>";
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
        <h2>Afficher son compte</h2>
        <form action="affichageclient.php" method="POST">
            <input type="hidden" name="action" value="affichage_clients">
            <div>
                <label for="idclient">Client :</label>
                <select id="idclient" name="idclient" required>
                    <option value="" selected disabled></option>
                    <?php
                    if ($clients && is_array($clients)) {
                        foreach ($clients as $client) {
                            echo "<option value='{$client['id_client']}'>{$client['nom_client']} {$client['prenom_client']}</option>";
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