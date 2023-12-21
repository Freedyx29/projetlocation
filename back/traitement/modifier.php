<?php
require_once ("../include/connexion_PDO.php")
?>

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