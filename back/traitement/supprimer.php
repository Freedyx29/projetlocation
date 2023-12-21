<?php
    require_once "../include/connexion_PDO.php";
?>

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
    <hr>