<?php
require_once '../include/connexion_PDO.php';
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modification client</title>
    </head>

    <body>
        <!-- CREATE JOUEUR -->
        <h2>S'inscrire</h2>
        <form action="../traitement/insertion.php" method="POST">
            <input type="hidden" name="action" value="update_tarifs">
            <?php
            $id_tarif = $_POST['idtarif'];

            $tarif_info = get_one_tarifs($id_tarif);

            if ($tarif_info) {
                $dd = $tarif_info['DD_tarif'];
                $df = $tarif_info['DF_tarif'];
                $prix = $tarif_info['prix_loc'];
                $idbien = $tarif_info['id_bien'];

                $dd = htmlspecialchars($dd, ENT_QUOTES, 'UTF-8');
                $df = htmlspecialchars($df, ENT_QUOTES, 'UTF-8');
                $prix = htmlspecialchars($prix, ENT_QUOTES, 'UTF-8');
                $idbien = htmlspecialchars($idbien, ENT_QUOTES, 'UTF-8');
            } else {
                header('Location: erreur.php');
                exit();
            }
            ?>
            <div>
                <input type="hidden" value="<?php echo $id_tarif ?>" id="idtarif" name="idtarif" required>
            </div>
            <div>
                <label for="dd">Date début :</label>
                <input type="text" value="<?php echo $dd; ?>" id="dd" name="dd" required>
            </div>
            <div>
                <label for="df">Date fin :</label>
                <input type="text" value="<?php echo $df; ?>" id="df" name="df" required>
            </div>
            <div>
                <label for="prix">Prix :</label>
                <input type="text" value="<?php echo $prix; ?>" id="prix" name="prix" required>
            </div>
            <div>
                <label for="idbien">biens :</label>
                <select id="idbien" name="idbien" required>
                    <option selected disabled></option>
<?php
if ($biens && is_array($biens)) {
    foreach ($biens as $bien) {
        echo "<option value='{$bien['id_bien']}'>{$bien['nom_bien']} {$bien['id_bien']}</option>";
    }
} else {
    echo "<option value=''>Erreur de récupération des types bien</option>";
}
?>
                </select>
            </div>
            <button type="submit">Modifier</button>
        </form>
        <hr> <!-- séparation --> 
    </body> 
</html>