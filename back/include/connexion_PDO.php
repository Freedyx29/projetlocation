<?php

$user = "root";
$mdp = "";
$serveur = "localhost";
$bd = "projetlocation";
$dns = "mysql:host=$serveur;dbname=$bd";

try {
    $con = new PDO($dns, $user, $mdp);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

require "../class/bien.class.php";
require "../class/client.class.php";
require "../class/photo.class.php";
require "../class/reservation.class.php";
require "../class/tarif.class.php";
require "../class/typebien.class.php";
require "../class/contact.class.php";

$biens = Biens::get_all_biens();

$clients = Clients::get_all_clients();

$photos = Photos::get_all_photos();

$reservations = Reservations::get_all_reservations();

$tarif = Tarifs::get_all_tarifs();

$typebien = Typebien::get_all_typebien();

$contact = Contacts::get_all_contacts();
?>