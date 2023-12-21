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
            <input type="hidden" name="action" value="affichage_biens">
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
                echo $id_bien, "<br>";
                 echo $nom, "<br>";
                 echo $rue, "<br>";
                 echo $codep, "<br>";
                 echo $vil, "<br>";
                 echo $superficie, "<br>";
                 echo $nb_piece, "<br>";
                 echo $nb_chambre, "<br>";
                 echo $nb_couchage, "<br>";
                 echo $descriptif, "<br>";
                 echo $ref, "<br>";
                 echo $statut, "<br>";
                 echo $idtypebien, "<br>";
                 echo "</form>";
?>
    </body>
</html>