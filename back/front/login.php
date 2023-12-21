<?php
require_once '../include/connexion_PDO.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LocalExpress</title>
        <link rel="stylesheet" href="css/login.css">
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

        <div class="login container">
            <div class="login-container">
                <h2>Se connecter pour continuer</h2>
                <p>Connectez-vous avec les données que vous avez saisies lors de votre <a href="sign-up.php">inscription</a></p>

                <form>
                    <div>
                        <span>Entrer  votre adresse mail</span>
                        <input type="email" name="" id="" placeholder="votreemail@gmail.com" autocomplete="off" required>
                    </div>

                    <div>
                        <span>Entrer votre mot de passe</span>
                        <input type="motdepasse" name="" id="" placeholder="Mot de passe" autocomplete="off" required>
                    </div>

                    <div class="center-buttom">
                        <input type="submit" value="Se connecter" class="buttom">
                    </div>

                    <div class="center-text">
                        <a href="">Mot de passe oublier ?</a>
                    </div>

                    <div class="center-text">
                        <a href="sign-up.php" class="btn">S'inscrire maintenant</a>
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