<?php
require_once '../include/connexion_PDO.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LocalExpress</title>
        <link rel="stylesheet" href="css/sign-up.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <script type="text/javascript" src="../traitement/js/jquery.js"></script>
        <script type="text/javascript" src="../traitement/js/autocommune.js"></script>
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
                <h2>Bienvenue, c'est parti !</h2>
                <p>Vous avez déjà un compte ? <a href="login.php">Se connecter</a></p>

                <form action="../traitement/insertion.php" method="POST">

                    <input type="hidden" name="action" value="create_clients">

                    <div>
                        <span>Votre nom</span>
                        <input type="text" name="nom" id="nom" placeholder="Votre Nom" autocomplete="off" required>
                    </div>

                    <div>
                        <span>Votre prénom</span>
                        <input type="text" name="prenom" id="prenom" placeholder="Votre Prénom" autocomplete="off" required>
                    </div>

                    <div>
                        <span>Entrez votre rue</span>
                        <input type="text" name="rue" id="rue" placeholder="Votre rue" autocomplete="off" required>
                    </div>

                    <div>
                        <span>Entrez votre ville</span>
                        <input type="text" id="nom_id" name="vil" placeholder="La ville de votre bien" onkeyup="autocomplet()" required>
                        <ul id="nom_list_id"></ul>
                    </div>

                    <div>
                        <span>Entrez votre code postal</span>
                        <input type="text" id="nom2_id" name="codep" placeholder="Votre code postal" onkeyup="autocomplet()" required>
                        <ul id="nom_list_id"></ul>
                    </div>

                    <div>
                        <span>Entrez  votre adresse mail</span>
                        <input type="email" name="mail" id="mail" placeholder="votreemail@mail.com" autocomplete="off" required>
                    </div>

                    <div>
                        <span>Entrez votre mot de passe</span>
                        <input type="password" name="pass" id="pass" placeholder="Votre mot de passe" autocomplete="off" required>
                    </div>

                    <input type="hidden" name="statut" id="statut" value="0" placeholder="Votre statut d'utilisateur" autocomplete="off" required>
                    <input type="hidden" name="valid" id="valid" value="0" required>

                    <div>
                        <input type="submit" value="Enregistrer" class="buttom">
                    </div>

                    <div class="center-text">
                        <a href="login.html">Vous avez déjà un compte ?</a>
                    </div>

                    <div class="center-button">
                        <a href="login.html" class="btn">Se connecter</a>
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