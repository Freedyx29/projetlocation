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
            <input type="hidden" name="action" value="affichage_typebien">
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
            echo $id_type, "<br>";
            echo $lib, "<br>"; 
            ?>
    </body> 
</html>