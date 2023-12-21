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
        <form action="insertion.php" method="POST">
            <input type="hidden" name="action" value="affichage_tarifs">
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
            echo $id_tarif, "<br>";
            echo $dd, "<br>"; 
            echo $df, "<br>"; 
            echo $prix, "<br>";
            echo $idbien, "<br>";
            ?>
    </body> 
</html>