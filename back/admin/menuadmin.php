<?php
    require_once '../include/connexion_PDO.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Location</title>
        <link rel="stylesheet" href="menuadmin.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    </head>
    <body>
        <header>
            <div class="nav container">

                <a href="../front/index.php" class="logo"><i class='bx bx-home'></i>Location</a>

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

   
        
        <section class="contact container">
            <a href="index.php" class="btn">Bien</a>
            <a href="crudclient.php" class="btn">Client</a>
            <a href="indexcontact.php" class="btn">Contact</a>
            <a href="indexphoto.php" class="btn">Photo</a>
            <a href="indexreservation.php" class="btn">Réservation</a>
            <a href="indextarif.php" class="btn">Tarif</a>
            <a href="indextypebien.php" class="btn">Typebien</a>
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