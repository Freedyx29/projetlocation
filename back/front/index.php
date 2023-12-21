<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LocalExpress</title>
        <link rel="stylesheet" href="style.css">
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

        <section class="home container" id="home">
            <div class="home-text">
                <h1>Trouvez votre prochaine <br> Destination parfaite pour <br> Vous.</h1>
                <a href="sign-up.html" class="btn">S'inscrire</a>
            </div>
        </section>

        <section class="about container" id="#">
            <div class="about-img">
                <img src="img/home3.jpg" alt="">
            </div>
            <div class="about-text">
                <span>A propos de nous</span>
                <h2>Nous proposons les meilleures <br> Location pour vous !</h2>
                <P>Notre plateforme dédiée à la location offre une variété de maisons, appartements, locaux commerciaux et studios.</P>
                <P>Chez nous, la recherche du lieu idéal devient simple. Avec un engagement envers la qualité et le service, nous facilitons chaque étape du processus de location, vous permettant de trouver votre chez-vous ou l'espace parfait pour votre activité.</P>
                <a href="#" class="btn">En savoir plus</a>
            </div>
        </section>

        <section class="location container" id="#">
            <div class="box">
                <i class='bx bx-user'></i>
                <h3>Réalisez votre rêve</h3>
            </div>

            <div class="box">
                <i class='bx bx-desktop'></i>
                <h3>Inscrivez-vous<br>maintenant</h3>
            </div>

            <div class="box">
                <i class='bx bx-home-alt'></i>
                <h3>Profitez de votre<br>nouvelle maison</h3>
            </div>
        </section>

        <?php
// Inclure votre fichier de connexion à la base de données
        include '../include/connexion_PDO.php';
        ?>
        <!-- Section Nos propriétés en vedette -->
        <section class="proprietaires container" id="#">
            <div class="heading">
                <h2>Nos dernière propriétés mis en ligne</h2>
                <p>Pour en savoir en savoit plus aller vois la page <a href="location.php">location</a></p>
            </div>

            <div class="proprietaires-container container">
                <?php
                
                $dernierbiens = Biens::trier_bien();
                
                if ($dernierbiens && is_array($dernierbiens)) {
                    foreach ($dernierbiens as $dernierbien) {
                        $photo = Photos::get_by_photos($dernierbien['id_bien']);
                        ?>
                        <div class='box'>
                            <img src="<?php
                            if ($photo && is_array($photo)) {
                                $lib = $photo['lib_photo'];
                            } else {
                                $lib = "../front/img/home1.jpg";
                            } echo $lib
                            ?>">

                        <div class="content">
                            <div class="text">
                                <h3><?php echo $dernierbien['nom_bien']; ?></h3>
                                <p><?php echo $dernierbien['vil_bien']; ?>, FR</p>
                            </div>
                            <div class="icon">
                                <i class='bx bx-bed'><span><?php echo $dernierbien['nb_couchage']; ?></span></i>
                            </div><br>
                            <div class="center-buttons">
                                <a href="../traitement/details_bien.php?id=<?php echo $dernierbien['id_bien']; ?>" class="btn">En savoir plus</a>
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
    </section>


</div>
</section>

<section class="contact container">
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