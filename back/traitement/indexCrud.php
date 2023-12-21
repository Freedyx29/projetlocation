<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajout du bien</title>
        <link rel="stylesheet" href="css/cssCrud.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
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



    <?php
        require_once '../include/connexion_PDO.php';
    ?>
        <div class="login container">
            <div class="login-container">
                <h2>Ajouter un bien</h2>
                <form action="insertion.php" method="POST">
                    <input type="hidden" name="action" value="create_biens">

                    <div>
                        <span>Nom du bien :</span>
                        <input type="text" id="nom" name="nom" placeholder="Le nom de votre bien" required>
                    </div>

                    <div>
                        <span>Rue du bien :</span>
                        <input type="text" id="rue" name="rue" placeholder="La rue de votre bien" required>
                    </div>

                    <div>
                        <span>Ville du bien :</span>
                        <input type="text" id="nom_id" name="vil" placeholder="La ville de votre bien" onkeyup="autocomplet()" required>
                        <ul id="nom_list_id"></ul>
                    </div>

                    <div>
                        <span>Code postale du bien :</span>
                        <input type="text" id="nom2_id" name="codep" placeholder="Le code postal de votre bien" onkeyup="autocomplet()" required>
                        <ul id="nom_list_id"></ul>
                    </div>

                    <div>
                        <span>Superficie du bien :</span>
                        <input type="text" id="superficie" name="superficie" placeholder="La superficie de votre bien" required>
                    </div>

                    <div>
                        <span>Nombre de pièces :</span>
                        <input type="text" id="nbpiece" name="nbpiece" placeholder="Le nombre de pièces de votre bien" required>
                    </div>

                    <div>
                        <span>Nombre de chambres :</span>
                        <input type="text" id="nbchambre" name="nbchambre" placeholder="Le nombre de chambres de votre bien" required>
                    </div>

                    <div>
                        <span>Nombre de chouchages</span>
                        <input type="text" id="nbcouchage" name="nbcouchage" placeholder="Le nombre de couchages de votre bien" required>
                    </div>

                    <div>
                        <span>Descriptif du bien :</span>
                        <textarea id="dsescriptif" name="descriptif" placeholder="Le descriptif de votre bien"></textarea>
                    </div>

                    <div>
                        <span>Référence du bien :</span>
                        <input type="text" id="ref" name="ref" placeholder="La référence de votre bien" required>
                    </div>

                    
                    <input type="hidden" value="disponible" id="statut" name="statut" placeholder="Le statut de votre bien" required>
                    
                    <input type="hidden" value="0" id="suppr" name="suppr" placeholder="supprimer" required>
                    

                    <div>
                        <span>Type du bien :</span>
                        <input type="text" id="nom_lib_typebien" name="idtype" placeholder="Le type de bien" onkeyup="autocompletTypeBien()" required>
                        <ul id="nom_list_id_typebien"></ul>
                    </div>
                    
                    <input type="hidden" id="id_type_bien" name="id_type_bien">

                    <div class="center-button">
                        <input type="submit" value="Créer" class="buttom">
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