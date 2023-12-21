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
            <input type="hidden" name="action" value="affichage_reservations">
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
             echo $id_resa, "<br>";
             echo $date, "<br>";
             echo $datedebut, "<br>";
             echo $datefin, "<br>"; 
             echo $commentaire, "<br>";
             echo $moderation, "<br>";
             echo $annulation, "<br>";
             echo $idclient, "<br>";
             echo $idbien, "<br>";
             ?>
    </body> 
</html>