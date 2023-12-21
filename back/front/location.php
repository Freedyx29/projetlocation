<?php
//
include '../include/connexion_PDO.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LocalExpress</title>
        <link rel="stylesheet" href="css/location.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    </head>
    <body>
        <header>
            <div class="nav container">

                <a href="index.php" class="logo"><i class='bx bx-home'></i>LocalExpress</a>

                <input type="checkbox" name="" id="menu">
                <label for="menu" <i class='bx bx-menu' id="menu-icon"></i></label>

                <ul class="navbar">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="aproposdenous.html">A propos de nous</a></li>
                    <li><a href="location.php">Location</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>

                <a href="login.html" class="btn">Se connecter</a>
            </div>

        </header>


        <div class="title">
            <h2>Voici les locations disponibles</h2>
        </div>
        <form action="../traitement/affichagebien.php" method="POST">
            <input type="hidden" name="action" value="affichage_biens">
            <div class="proprietaires-container container">


                <?php
                if ($biens && is_array($biens)) {
                    foreach ($biens as $bien) {
                        $photo = Photos::get_by_photos($bien['id_bien']);
                        ?>
                        <div class='box'>
                            <img src="<?php
                            if ($photo && is_array($photo)) {
                                $lib = $photo['lib_photo'];
                            } else {
                                $lib = "../front/img/home1.jpg";
                            } echo $lib
                            ?>">
                            <h3><?php echo $bien['nom_bien']; ?></h3>
                            <div class='content'>
                                <div class='text'>
                                    <p><?php echo $bien['vil_bien']; ?></p>
                                </div>
                                <div class='icon'>
                                    <i class='bx bx-bed'></i><span><?php echo $bien['nb_couchage']; ?></span>
                                </div><br>
                                <div class="center-buttons">
                                    <a href="../traitement/details_bien.php?id=<?php echo $bien['id_bien']; ?>" class="btn">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>Aucun bien disponible.</p>";
                }
                ?>
            </div>
        </form>


        <section class="contact container">
            <a href="../traitement/indexCrud.php" class="btn">Ajouter un bien</a>
            <a href="../admin/menuadmin.php" class="btn">Menu admin</a>
            <h2>Vous avez des questions ? <br> Nous sommes la pour vous aider</h2>
            <a href="contact.php" class="btn">CONTACTEZ-NOUS</a>
        </section>

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