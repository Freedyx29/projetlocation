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
            <input type="hidden" name="action" value="update_biens">
            <div>
                <?php
                $id_bien = $_POST['idbien'];

                $bien_info = get_one_biens($id_bien);

                if ($bien_info) {
                    $nom = $bien_info['nom_bien'];
                    $rue = $bien_info['rue_bien'];
                    $codep = $bien_info['codep_bien'];
                    $vil = $bien_info['vil_bien'];
                    $superficie = $bien_info['superficie_bien'];
                    $nb_piece = $bien_info['nb_piece'];
                    $nb_chambre = $bien_info['nb_chambre'];
                    $nb_couchage = $bien_info['nb_couchage'];
                    $descriptif = $bien_info['descriptif'];
                    $ref = $bien_info['ref_bien'];
                    $statut = $bien_info['statut_bien'];
                    $idtypebien = $bien_info['id_type_bien'];

                    $nom = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
                    $rue = htmlspecialchars($rue, ENT_QUOTES, 'UTF-8');
                    $codep = htmlspecialchars($codep, ENT_QUOTES, 'UTF-8');
                    $vil = htmlspecialchars($vil, ENT_QUOTES, 'UTF-8');
                    $superficie = htmlspecialchars($superficie, ENT_QUOTES, 'UTF-8');
                    $nb_piece = htmlspecialchars($nb_piece, ENT_QUOTES, 'UTF-8');
                    $nb_chambre = htmlspecialchars($nb_chambre, ENT_QUOTES, 'UTF-8');
                    $nb_couchage = htmlspecialchars($nb_couchage, ENT_QUOTES, 'UTF-8');
                    $descriptif = htmlspecialchars($descriptif, ENT_QUOTES, 'UTF-8');
                    $ref = htmlspecialchars($ref, ENT_QUOTES, 'UTF-8');
                    $statut = htmlspecialchars($statut, ENT_QUOTES, 'UTF-8');
                    $idtypebien = htmlspecialchars($idtypebien, ENT_QUOTES, 'UTF-8');
                } else {
                    header('Location: erreur.php');
                    exit();
                }
                ?>
                <div>
                    <input type="hidden" value="<?php echo $id_bien ?>" id="idbien" name="idbien" required>
                </div>
            </div>
            <div>
                <label for="nom">Nom du bien :</label>
                <input type="text" value="<?php echo $nom ?>" id="nom" name="nom" required>
            </div>
            <div>
                <label for="rue">Rue du bien :</label>
                <input type="text" value="<?php echo $rue ?>" id="rue" name="rue" required>
            </div>
            <div>
                <label for="codep">Code postal du bien :</label>
                <input type="text" value="<?php echo $codep ?>" id="codep" name="codep" required>
            </div>
            <div>
                <label for="vil">Ville du bien :</label>
                <input type="text" value="<?php echo $vil ?>" id="vil" name="vil" required>
            </div>
            <div>
                <label for="superficie">Superficie du bien :</label>
                <input type="text" value="<?php echo $superficie ?>" id="superficie" name="superficie" required>
            </div>
            <div>
                <label for="nbpiece">Nombre de pièces :</label>
                <input type="text" value="<?php echo $nb_piece ?>" id="nbpiece" name="nbpiece" required>
            </div>
            <div>
                <label for="nbchambre">Nombre de chambres :</label>
                <input type="text" value="<?php echo $nb_chambre ?>" id="nbchambre" name="nbchambre" required>
            </div>
            <div>
                <label for="nbcouchage">Nombre de couchages :</label>
                <input type="text" value="<?php echo $nb_couchage ?>" id="nbcouchage" name="nbcouchage" required>
            </div>
            <div>
                <label for="descriptif">Descriptif :</label>
                <input type="text" value="<?php echo $descriptif ?>" id="descriptif" name="descriptif" required>
            </div>
            <div>
                <label for="ref">Référence du bien :</label>
                <input type="text" value="<?php echo $ref ?>" id="ref" name="ref" required>
            </div>
            <div>
                <label for="statut">Statut du bien :</label>
                <input type="text" value="<?php echo $statut ?>" id="statut" name="statut" required>
            </div>
            <div>
                <label for="idtype">Type du bien :</label>
                <select id="idtype" name="idtype" required>
                    <option selected disabled></option>
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
    </body>
</html>