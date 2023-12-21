<?php
require_once '../include/connexion_PDO.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Location</title>
        <link rel="stylesheet" href="css/formulairephoto.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    </head>
    <body>
        <?php 
        $id_bien = $_GET['id'];
        ?>
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


        <div class="login container">
            <div class="login-container">
                <h2>Ajouter une photo</h2>
                <form action="insertion.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="create_photos">

                    <div>
                        <span>Nom de la photo :</span>
                        <input type="text" id="nom" name="nom" placeholder="Le nom de votre photo" required>
                    </div>

                    <div>
                        <span>Sélectionner une photo :</span>
                        <input type="file" id="photo" name="photo" accept="image/*" required>
                    </div>

                    <input type="hidden" id="idbien" name="idbien" value="<?php echo $id_bien ?>" accept="image/*" required>

                    <div class="center-button">
                        <input type="submit" value="Ajouter">
                    </div>
                </form>
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