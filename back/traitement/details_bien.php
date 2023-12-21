<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Location</title>
        <link rel="stylesheet" href="css/detailsbien.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
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

                <a href="../front/login.html" class="btn">Se connecter</a>
            </div>

        </header>



        <?php
// Inclure la connexion à la base de données et d'autres configurations
        include '../include/connexion_PDO.php';

// Récupérer l'identifiant du bien depuis l'URL
        $id_bien = $_GET['id'];

// Effectuer une requête pour obtenir les détails du bien
        $query = $con->prepare("SELECT * FROM `biens` JOIN typebien ON biens.id_type_bien = typebien.id_type_bien WHERE id_bien = ?");
        $query->execute([$id_bien]);
        $details_bien = $query->fetch(PDO::FETCH_ASSOC);

// Vérifier si le bien a été trouvé
        if (!$details_bien) {
            die("Bien non trouvé.");
        }

// ... le reste de votre code HTML pour afficher les détails du bien
        ?>

        <!-- Affichez les détails du bien -->
        <div class="details-container">
            <h2>Détails du bien : <?php echo $details_bien['nom_bien']; ?></h2><br>
            <?php
            $photo_info = Photos::get_by_photos($details_bien['id_bien']);

            if ($photo_info && is_array($photo_info)) {
                $lib = $photo_info['lib_photo'];
            } else {
                $lib = "../front/img/home1.jpg";
            }

            echo '<div class="box">';
            echo "<img src='$lib'><br></div>";
            ?><br>
            <table class="details-table">
                <tr>
                    <td class="property-label">Rue :</td>
                    <td><?php echo $details_bien['rue_bien']; ?></td>
                </tr>
                <tr>
                    <td class="property-label">Ville :</td>
                    <td><?php echo $details_bien['vil_bien']; ?></td>
                </tr>
                <tr>
                    <td class="property-label">Code postal :</td>
                    <td><?php echo $details_bien['codep_bien']; ?></td>
                </tr>
                <tr>
                    <td class="property-label">Superficie :</td>
                    <td><?php echo $details_bien['superficie_bien']; ?></td>
                </tr>
                <tr>
                    <td class="property-label">Nombre de pièce :</td>
                    <td><?php echo $details_bien['nb_piece']; ?></td>
                </tr>
                <tr>
                    <td class="property-label">Nombre de chambre :</td>
                    <td><?php echo $details_bien['nb_chambre']; ?></td>
                </tr>
                <tr>
                    <td class="property-label">Nombre de couchage :</td>
                    <td><?php echo $details_bien['nb_couchage']; ?></td>
                </tr>
                <tr>
                    <td class="property-label">Description :</td>
                    <td><?php echo $details_bien['descriptif']; ?></td>
                </tr>
                <tr>
                    <td class="property-label">Référence :</td>
                    <td><?php echo $details_bien['ref_bien']; ?></td>
                </tr>
                <tr>
                    <td class="property-label">Statut :</td>
                    <td><?php echo $details_bien['statut_bien']; ?></td>
                </tr>
                <tr>
                    <td class="property-label">Type du bien :</td>
                    <td><?php echo $details_bien['lib_type_bien']; ?></td>
                </tr>
            </table>

            <section class="contact container">
                <h2>Action possible : </h2><br>
                <form action="modifierbien.php" method="POST">
                    <input type="hidden" name="action" value="update_biens">
                    <input type="hidden" id="id_bien" name="id_bien" value ="<?php echo $details_bien['id_bien'] ?>" placeholder="Le nombre de pièces de votre bien">
                    <input type="submit" value="MODIFIER" class="btn">
                </form><br>
                <form action="insertion.php" method="POST">
                    <input type="hidden" name="action" value="delete_bien">
                    <input type="hidden" id="id_bien" name="id_bien" value ="<?php echo $details_bien['id_bien'] ?>" placeholder="Le nombre de pièces de votre bien">
                    <input type="submit" value="SUPPRIMER" class="btn">
                </form><br>
                <a href="formulairephoto.php?id=<?php echo $details_bien['id_bien'] ?>" class="btn">AJOUTER DES PHOTOS</a>
                <a href="indexcalendrier.php" class="btn">RESERVER</a>
            </section>



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