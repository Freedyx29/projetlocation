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
    <form action="insertion.php" method="POST">
        <input type="hidden" name="action" value="affichage_photos">
        <div>
            <?php
            $id_photo = $_POST['idphoto'];

            $photo_info = get_one_photos($id_photo);

            if ($photo_info) {
                $nom = $photo_info['nom_photo'];
                $lib = $photo_info['lib_photo'];
                $idbien = $photo_info['id_bien'];

                $nom = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
                $idbien = htmlspecialchars($idbien, ENT_QUOTES, 'UTF-8');
                
                // Affichage des informations de la photo
                echo $id_photo, "<br>";
                echo $nom, "<br>";
                echo $idbien, "<br>";

                // Affichage de l'image directement depuis les données binaires
                echo "<img src='data:image/png;base64," . base64_encode($lib) . "'><br>";
            } else {
                header('Location: erreur.php');
                exit();
            }
            ?>
        </div>
    </form>
</body>
</html>
