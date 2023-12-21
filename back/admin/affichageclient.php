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
            <input type="hidden" name="action" value="update_clients">
            <?php
            $id_client = $_POST['idclient'];
            
            $client_info = get_one_clients($id_client);
            
            if($client_info){
                $nom = $client_info['nom_client'];
                $prenom = $client_info['prenom_client'];
                $rue = $client_info['rue_client'];
                $codep = $client_info['codep_client'];
                $vil = $client_info['vil_client'];
                $mail = $client_info['mail_client'];
                $pass = $client_info['pass_client'];
                $statut = $client_info['statut_client'];
                $valid = $client_info['valid_client'];
                
                $nom = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
                $prenom = htmlspecialchars($prenom, ENT_QUOTES, 'UTF-8');
                $rue = htmlspecialchars($rue, ENT_QUOTES, 'UTF-8');
                $codep = htmlspecialchars($codep, ENT_QUOTES, 'UTF-8');
                $vil = htmlspecialchars($vil, ENT_QUOTES, 'UTF-8');
                $mail = htmlspecialchars($mail, ENT_QUOTES, 'UTF-8');
                $pass = htmlspecialchars($pass, ENT_QUOTES, 'UTF-8');
                $statut = htmlspecialchars($statut, ENT_QUOTES, 'UTF-8');
                $valid = htmlspecialchars($valid, ENT_QUOTES, 'UTF-8');
            }
            else{
                header('Location: erreur.php');
                exit();
            }
             echo $id_client, "<br>";
            echo $nom, "<br>"; 
            echo $prenom, "<br>";
            echo $rue, "<br>";
            echo $codep, "<br>";
            echo $vil, "<br>";
            echo $mail, "<br>"; 
            echo $pass, "<br>"; 
            echo $statut, "<br>";
            echo $valid, "<br>"; 
            ?>
    </body> 
</html>