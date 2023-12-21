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
            $id_contact = $_POST['idcontact'];

            $contact_info = get_one_contacts($id_contact);

            if ($contact_info) {
                $nom = $contact_info['nom'];
                $prenom = $contact_info['prenom'];
                $mail = $contact_info['mail'];
                $tel = $contact_info['tel'];
                $mess = $contact_info['mess'];

                $nom = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
                $prenom = htmlspecialchars($prenom, ENT_QUOTES, 'UTF-8');
                $mail = htmlspecialchars($mail, ENT_QUOTES, 'UTF-8');
                $tel = htmlspecialchars($tel, ENT_QUOTES, 'UTF-8');
                $mess = htmlspecialchars($mess, ENT_QUOTES, 'UTF-8');
            } else {
                header('Location: erreur.php');
                exit();
            }
            echo $id_contact, "<br>";
            echo $nom, "<br>"; 
            echo $prenom, "<br>"; 
            echo $mail, "<br>";
            echo $tel, "<br>";
            echo $mess, "<br>";
            ?>
    </body> 
</html>