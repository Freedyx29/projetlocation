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
            <input type="hidden" name="action" value="update_reservations">
            <?php
            $id_resa = $_POST['idreservation'];

            $resa_info = get_one_reservations($id_resa);

            if ($resa_info) {
                $date = $resa_info['date_resa'];
                $datedebut = $resa_info['date_debut_resa'];
                $datefin = $resa_info['date_fin_resa'];
                $commentaire = $resa_info['commentaire'];
                $moderation = $resa_info['moderation'];
                $annulation = $resa_info['annulation_resa'];
                $idclient = $resa_info['id_client'];
                $idbien = $resa_info['id_bien'];

                $date = htmlspecialchars($date, ENT_QUOTES, 'UTF-8');
                $datedebut = htmlspecialchars($datedebut, ENT_QUOTES, 'UTF-8');
                $datefin = htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8');
                $commentaire = htmlspecialchars($commentaire, ENT_QUOTES, 'UTF-8');
                $moderation = htmlspecialchars($moderation, ENT_QUOTES, 'UTF-8');
                $annulation = htmlspecialchars($annulation, ENT_QUOTES, 'UTF-8');
                $idclient = htmlspecialchars($idclient, ENT_QUOTES, 'UTF-8');
                $idbien = htmlspecialchars($idbien, ENT_QUOTES, 'UTF-8');
            } else {
                header('Location: erreur.php');
                exit();
            }
            ?>
            <div>
                <input type="hidden" value="<?php echo $id_resa ?>" id="idresa" name="idresa" required>
            </div>
            <div>
                <label for="date">Date de réservation :</label>
                <input type="text" value="<?php echo $date; ?>" id="date" name="date" required>
            </div>
            <div>
                <label for="datedebut">Date début :</label>
                <input type="text" value="<?php echo $datedebut; ?>" id="datedebut" name="datedebut" required>
            </div>
            <div>
                <label for="datefin">Date fin :</label>
                <input type="text" value="<?php echo $datefin; ?>" id="datefin" name="datefin" required>
            </div>
            <div>
                <label for="commentaire">Commentaire :</label>
                <input type="text" value="<?php echo $commentaire; ?>" id="commentaire" name="commentaire" required>
            </div>
            <div>
                <label for="moderation">Modération :</label>
                <input type="text" value="<?php echo $moderation; ?>" id="moderation" name="moderation" required>
            </div>
            <div>
                <label for="annulation">Annulation :</label>
                <input type="text" value="<?php echo $annulation; ?>" id="annulation" name="annulation" required>
            </div>
            <div>
                <label for="idclient">client :</label>
                <select id="idclient" name="idclient" required>
                    <option selected disabled></option>
<?php
if ($clients && is_array($clients)) {
    foreach ($clients as $client) {
        echo "<option value='{$client['id_client']}'>{$client['nom_client']} {$client['prenom_client']}</option>";
    }
} else {
    echo "<option value=''>Erreur de récupération des types bien</option>";
}
?>
                </select>
            </div>
            <div>
                <label for="idbien">bien :</label>
                <select id="idbien" name="idbien" required>
                    <option selected disabled></option>
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
            <button type="submit">Modifier</button>
        </form>
        <hr> <!-- séparation --> 
    </body> 
</html>