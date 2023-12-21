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
            
            ?>
            <div>
                <input type="hidden" value="<?php echo $id_client ?>" id="idclient" name="idclient" required>
            </div>
            <div>
                <label for="nom">Votre nom :</label>
                <input type="text" value="<?php echo $nom; ?>" id="nom" name="nom" required>
            </div>
            <div>
                <label for="prenom">Votre prénom :</label>
                <input type="text" value="<?php echo $prenom; ?>" id="prenom" name="prenom" required>
            </div>
            <div>
                <label for="rue">Votre rue :</label>
                <input type="text" value="<?php echo $rue; ?>" id="rue" name="rue" required>
            </div>
            <div>
                <label for="codep">Votre code postal :</label>
                <input type="text" value="<?php echo $codep; ?>" id="codep" name="codep" required>
            </div>
            <div>
                <label for="vil">Ville du bien :</label>
                <input type="text" value="<?php echo $vil; ?>" id="vil" name="vil" required>
            </div>
            <div>
                <label for="mail">Indiquez votre mail :</label>
                <input type="text" value="<?php echo $mail; ?>" id="mail" name="mail" required>
            </div>
            <div>
                <label for="pass">Entrez un mot de passe :</label>
                <input type="password" value="<?php echo $pass; ?>" id="pass" name="pass" required>
            </div>
            <div>
                <label for="statut">Indiquez votre statut :</label>
                <input type="text" value="<?php echo $statut; ?>" id="statut" name="statut" required>
            </div>
            <div>
                <label for="valid">validité :</label>
                <input type="text" value="<?php echo $valid; ?>" id="valid" name="valid" required>
            </div>
            <button type="submit">Modifier</button>
        </form>
        <hr> <!-- séparation --> 
    </body> 
</html>