<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LocalExpress</title>
        <link rel="stylesheet" href="css/contact.css">
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

                <a href="login.php" class="btn">Se connecter</a>
            </div>

        </header>

        <div class="contactUs">
            <div class="title">
                <h2>Contactez-nous</h2>
            </div>
            <div class="box">
                <div class="contact form">
                    <form action="../traitement/insertion.php" method="POST">
                        <input type="hidden" name="action" value="create_contact">
                        <div class="formBox">
                            <div class="row">
                                <div class="inputBox">
                                    <span>Nom</span>
                                    <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
                                </div>
                                <div class="inputBox">
                                    <span>Prénom</span>
                                    <input type="text" id="prenom" name="prenom" placeholder="Votre prenom" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="inputBox">
                                    <span>Email</span>
                                    <input type="mail" id="mail" name="mail" placeholder="Votre Email" required>
                                </div>
                                <div class="inputBox">
                                    <span>Téléphone</span>
                                    <input type="tel" id="tel" name="tel" placeholder="Votre numéro de téléphone" required>
                                </div>
                            </div>

                            <div class="row1">
                                <div class="inputBox">
                                    <span>Message</span>
                                    <textarea id="mess" name="mess" placeholder="Ecrivez votre message ici..." required></textarea>
                                </div>
                            </div>

                            <div class="row1">
                                <div class="inputBox">
                                    <input type="submit" value="Envoyez">
                                </div>
                            </div>
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