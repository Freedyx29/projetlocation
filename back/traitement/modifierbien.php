<?php
require_once '../include/connexion_PDO.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajout du bien</title>
        <link rel="stylesheet" href="css/modifierbien.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/autocommune.js"></script>
        <script type="text/javascript" src="js/autotypebien.js"></script>
    </head>
    <body>
        <header>
            <div class="nav container">

                <a href="../front/index.php" class="logo"><i class='bx bx-home'></i>LocalExpress</a>

                <input type="checkbox" name="" id="menu">
                <label for="menu" <i class='bx bx-menu' id="menu-icon"></i></label>

                <ul class="navbar">
                    <li><a href="../front/index.php">Accueil</a></li>
                    <li><a href="../front/aproposdenous.html">A propos de nous</a></li>
                    <li><a href="../front/location.php">Location</a></li>
                    <li><a href="../front/contact.php">Contact</a></li>
                </ul>

                <a href="../front/login.php" class="btn">Se connecter</a>
            </div>


        </header>

            <div>
                <?php
                $id_bien = $_POST['id_bien'];

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
                    $suppr = $bien_info['suppr'];
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
                    $suppr = htmlspecialchars($suppr, ENT_QUOTES, 'UTF-8');
                    $idtypebien = htmlspecialchars($idtypebien, ENT_QUOTES, 'UTF-8');
                } else {
                    header('Location: erreur.php');
                    exit();
                }
                ?>

                <div class="login container">
                    <div class="login-container">
                        <h2>Ajouter un bien</h2>
        <form action="insertion.php" method="POST">
            <input type="hidden" name="action" value="update_biens">
             <input type="hidden" id="idbien" name="idbien" value="<?php echo $id_bien ?>" placeholder="Le nom de votre bien" required>
                            <div>
                                <span>Nom du bien :</span>
                                <input type="text" id="nom" name="nom" value="<?php echo $nom ?>" placeholder="Le nom de votre bien" required>
                            </div>

                            <div>
                                <span>Rue du bien :</span>
                                <input type="text" id="rue" name="rue" value="<?php echo $rue ?>" placeholder="La rue de votre bien" required>
                            </div>

                            <div>
                                <span>Ville du bien :</span>
                                <input type="text" id="nom_id" name="vil" value="<?php echo $vil ?>" placeholder="La ville de votre bien" onkeyup="autocomplet()" required>
                                <ul id="nom_list_id"></ul>
                            </div>

                            <div>
                                <span>Code postale du bien :</span>
                                <input type="text" id="nom2_id" name="codep" value="<?php echo $codep ?>" placeholder="Le code postal de votre bien" onkeyup="autocomplet()" required>
                                <ul id="nom_list_id"></ul>
                            </div>

                            <div>
                                <span>Superficie du bien :</span>
                                <input type="text" id="superficie" name="superficie" value="<?php echo $superficie ?>" placeholder="La superficie de votre bien" required>
                            </div>

                            <div>
                                <span>Nombre de pièces :</span>
                                <input type="text" id="nbpiece" name="nbpiece" value="<?php echo $nb_piece ?>" placeholder="Le nombre de pièces de votre bien" required>
                            </div>

                            <div>
                                <span>Nombre de chambres :</span>
                                <input type="text" id="nbchambre" name="nbchambre" value="<?php echo $nb_chambre ?>" placeholder="Le nombre de chambres de votre bien" required>
                            </div>

                            <div>
                                <span>Nombre de chouchages</span>
                                <input type="text" id="nbcouchage" name="nbcouchage" value="<?php echo $nb_couchage ?>" placeholder="Le nombre de couchages de votre bien" required>
                            </div>

                            <div>
                                <span>Descriptif du bien :</span>
                                <textarea id="dsescriptif" name="descriptif" placeholder="Le descriptif de votre bien"><?php echo $descriptif ?></textarea>
                            </div>

                            <div>
                                <span>Référence du bien :</span>
                                <input type="text" id="ref" name="ref" value="<?php echo $ref ?>"  placeholder="La référence de votre bien" required>
                            </div>


                            <input type="hidden" value="disponible" id="statut" name="statut" value="<?php echo $statut ?>" placeholder="Le statut de votre bien" required>

                            <input type="hidden" value="0" id="suppr" name="suppr" vvalue="<?php echo $suppr ?>" placeholder="supprimer" required>


                            <div>
                                <span>Type du bien :</span>
                                <input type="text" id="nom_lib_typebien" name="idtype" value="<?php echo $idtypebien ?>" placeholder="Le type de bien" onkeyup="autocompletTypeBien()" required>
                                <ul id="nom_list_id_typebien"></ul>
                            </div>

                            <input type="hidden" id="id_type_bien" name="id_type_bien">

                            <div class="center-button">
                                <input type="submit" value="MODIFIER" class="buttom">
                            </div>
                        </form>

                    </div>
                </div>   
            </div>

            <section class="footer">
                <div class="footer-container container">
                    <h2>Location</h2>
                    <div class="footer-box">
                        <h3>Lien rapide</h3>
                        <a href="#">Agence</a>
                        <a href="#">Bâtiment</a>
                        <a href="#">Les taux</a>
                    </div>

                    <div class="footer-box">
                        <h3>Locations</h3>
                        <a href="#">Paris</a>
                        <a href="#">Bordeaux</a>
                        <a href="#">Brive</a>
                    </div>

                    <div class="footer-box">
                        <h3>Contact</h3>
                        <a href="#">+33 00 00 00 00</a>
                        <a href="#">location@gmail.com</a>
                        <div class="social">
                            <a href="#"><i class='bx bxl-facebook' ></i></a>
                            <a href="#"><i class='bx bxl-twitter' ></i></a>
                            <a href="#"><i class='bx bxl-instagram' ></i></a>
                        </div>
                    </div>
                </div>
            </section>
    </body>
</html>