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
            <input type="hidden" name="action" value="update_typebien">
            <?php
            $id_type = $_POST['idtype'];

            $typebien_info = get_one_typebien($id_type);

            if ($typebien_info) {
                $lib = $typebien_info['lib_type_bien'];
                
                $lib = htmlspecialchars($lib, ENT_QUOTES, 'UTF-8');
                
            } else {
                header('Location: erreur.php');
                exit();
            }
            ?>
            <div>
                <input type="hidden" value="<?php echo $id_type ?>" id="idtype" name="idtype" required>
            </div>
            <div>
                <label for="lib">Libellé du type bien :</label>
                <input type="text" value="<?php echo $lib; ?>" id="lib" name="lib" required>
            </div>
            <button type="submit">Modifier</button>
        </form>
        <hr> <!-- séparation --> 
    </body> 
</html>