<?php

require_once '../include/connexion_PDO.php';

$action = $_POST['action'];

switch ($action) {
    case 'create_biens':
        // Récupération des valeurs du formulaire
        $nom = $_POST['nom'];
        $rue = $_POST['rue'];
        $codep = $_POST['codep'];
        $vil = $_POST['vil'];
        $superficie = $_POST['superficie'];
        $nbpiece = $_POST['nbpiece'];
        $nbchambre = $_POST['nbchambre'];
        $nbcouchage = $_POST['nbcouchage'];
        $descriptif = $_POST['descriptif'];
        $ref = $_POST['ref'];
        $statut = $_POST['statut'];
        $suppr = $_POST['suppr'];
        $idtypes = $_POST['id_type_bien'];

        // Création d'une nouvelle instance de la classe Joueur
        $bien = new Biens($nom, $rue, $codep, $vil, $superficie, $nbpiece, $nbchambre, $nbcouchage, $descriptif, $ref, $statut, $suppr, $idtypes);

        // Appel de la fonction pour créer un nouveau joueur dans la base de données
        $result = $bien ->create_biens($bien);

        if ($result) {
            $result = $bien ->get_one_bien($bien);
        
        if ($result) {
        
            echo '<script>
        function retourPage() {

            // Revenir à la page précédente
            alert("Nouvelle location créer avec succés")
            
            window.location.href="formulairephoto.php?id=' . $result . '";
                }
        retourPage(); // Appeler automatiquement la fonction si le résultat est vrai
        </script>';
        }
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'create_clients':
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $rue = $_POST['rue'];
        $codep = $_POST['codep'];
        $vil = $_POST['vil'];
        $mail = $_POST['mail'];
        $pass = $_POST['pass'];
        $statut = $_POST['statut'];
        $valid = $_POST['valid'];

        $client = new Clients($nom, $prenom, $rue, $codep, $vil, $mail, $pass, $statut, $valid);

        $result = $client ->create_clients($client);

        if ($result) {
            echo '<script>
        function retourPage() {

            // Revenir à la page précédente
            alert("Votre bien a été ajouté avec succés !")

            window.location.href="../front/index.php";

        }
        retourPage(); // Appeler automatiquement la fonction si le résultat est vrai
        </script>';
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'create_photos':
        $nom = $_POST['nom'];
        $lib = $_FILES['photo']['name']; // Utilisez 'tmp_name' pour obtenir le chemin temporaire du fichier
        $lib2 = $_FILES['photo']['tmp_name'];
        $idbien = $_POST['idbien'];
        move_uploaded_file($lib2, '../front/img/' . $lib);

        $lib = "../front/img/" . $lib;

        $photo = new Photos($nom, $lib, $idbien);

        $result = $photo ->create_photos($photo);
        
        if ($result) {
            echo '<script>
        function retourPage() {

            // Revenir à la page précédente
            alert("Votre bien a été ajouté avec succés !")

            window.location.href="../front/location.php";

        }
        retourPage(); // Appeler automatiquement la fonction si le résultat est vrai
        </script>';
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'create_reservations':
        $date = $_POST['date'];
        $datedebut = $_POST['datedebut'];
        $datefin = $_POST['datefin'];
        $commentaire = $_POST['commentaire'];
        $moderation = $_POST['moderation'];
        $annulation = $_POST['annulation'];
        $id_client = $_POST['idclient'];
        $id_bien = $_POST['idbien'];

        $reservation = new Reservations($date, $datedebut, $datefin, $commentaire, $moderation, $annulation, $id_client, $id_bien);

        $result = $reservation ->create_reservations($reservation);

        if ($result) {
            echo "La réservation a été envoyée.";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'create_tarifs':
        $datedebut = $_POST['datedebut'];
        $datefin = $_POST['datefin'];
        $prix = $_POST['prix'];
        $idbien = $_POST['idbien'];

        $tarif = new Tarifs($datedebut, $datefin, $prix, $idbien);

        $result = $tarif -> create_tarifs($tarif);

        if ($result) {
            echo "La tarif a bien été créé.";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'create_typebien':
        $lib = htmlspecialchars($_POST['libtype']);
        $typebien = new Typebien($lib);

        $result = $typebien ->create_typebien($typebien);

        if ($result) {
            echo "La type du bien a été enregistré";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'create_contact':
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $tel = $_POST['tel'];
        $mess = $_POST['mess'];

        $contact = new Contacts($nom, $prenom, $mail, $tel, $mess);

        $result = $contact -> create_contact($contact);

        if ($result) {
            echo '<script>
        function retourPage() {

            // Revenir à la page précédente
            alert("Message envoyé avec succès")

            window.location.href="../front/contact.php";

        }
        retourPage(); // Appeler automatiquement la fonction si le résultat est vrai
        </script>';
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'delete_bien':
        $id = $_POST['id_bien'];
        
        $obien = new biens('','','','','','','','','','','','','0');
        
        $result = $obien->delete_biens_by_id($id);

        if ($result) {
            echo '<script>
        function retourPage() {

            // Revenir à la page précédente
            alert("Message envoyé avec succès")

            window.location.href="../front/location.php";

        }
        retourPage(); // Appeler automatiquement la fonction si le résultat est vrai
        </script>';
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'delete_clients':
        $id_client = $_POST['id_client'];

        $result = $id_client-> delete_clients_by_id($id_client);

        if ($result) {
            echo "Le compte a été supprimé avec succès.";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'delete_photos':
        $id_photo = $_POST['id_photo'];

        $result = $id_photo ->delete_photos_by_id($id_photo);

        if ($result) {
            echo "La photo a été supprimée avec succès.";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'delete_reservations':
        $id_reservation = $_POST['id_reservation'];

        $result = $id_reservation ->delete_reservations_by_id($id_reservation);

        if ($result) {
            echo "La réservation a bien été annulée.";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'delete_tarifs':
        $id_tarif = $_POST['id_tarif'];

        $result = $id_tarif ->delete_tarifs_by_id($id_tarif);

        if ($result) {
            echo "Le tarif a bien été supprimé.";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'delete_typebien':
        $id_type_bien = $_POST['id_type_bien'];

        $result = $id_type_bien ->delete_typebien_by_id($id_type_bien);

        if ($result) {
            echo "Le type de bien a bien été supprimé.";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'delete_contact':
        $id_contact = $_POST['idcontact'];

        $result = $id_contact -> delete_contacts_by_id($id_contact);

        if ($result) {
            echo "Le tarif a bien été supprimé.";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'update_clients':

        $id_client = $_POST['idclient'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $rue = $_POST['rue'];
        $codep = $_POST['codep'];
        $vil = $_POST['vil'];
        $mail = $_POST['mail'];
        $pass = $_POST['pass'];
        $statut = $_POST['statut'];
        $valid = $_POST['valid'];

        $client = new Clients($nom, $prenom, $rue, $codep, $vil, $mail, $pass, $statut, $valid);

        $result = $client ->update_clients($client, $id_client);
        if ($result) {
            echo '<script>
        function retourPage() {

            // Revenir à la page précédente
            alert("Message envoyé avec succès")

            window.location.href="../front/location.php";

        }
        retourPage(); // Appeler automatiquement la fonction si le résultat est vrai
        </script>';
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'update_biens':

        $id_bien = $_POST['idbien'];
        $nom = $_POST['nom'];
        $rue = $_POST['rue'];
        $codep = $_POST['codep'];
        $vil = $_POST['vil'];
        $superficie = $_POST['superficie'];
        $nb_piece = $_POST['nbpiece'];
        $nb_chambre = $_POST['nbchambre'];
        $nb_couchage = $_POST['nbcouchage'];
        $descriptif = $_POST['descriptif'];
        $ref = $_POST['ref'];
        $statut = $_POST['statut'];
        $suppr = $_POST['suppr'];
        $idtypebien = $_POST['idtype'];

        $bien = new Biens($nom, $rue, $codep, $vil, $superficie, $nb_piece, $nb_chambre, $nb_couchage, $descriptif, $ref, $statut, $suppr, $idtypebien);

        $result = update_biens($bien, $id_bien);
        if ($result) {
            echo '<script>
        function retourPage() {

            // Revenir à la page précédente
            alert("Message envoyé avec succès")

            window.location.href="../front/location.php";

        }
        retourPage(); // Appeler automatiquement la fonction si le résultat est vrai
        </script>';
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'update_reservations':

        $id_resa = $_POST['idresa'];
        $date = $_POST['date'];
        $datedebut = $_POST['datedebut'];
        $datefin = $_POST['datefin'];
        $commentaire = $_POST['commentaire'];
        $moderation = $_POST['moderation'];
        $annulation = $_POST['annulation'];
        $idclient = $_POST['idclient'];
        $idbien = $_POST['idbien'];

        $reservation = new Reservations($date, $datedebut, $datefin, $commentaire, $moderation, $annulation, $idclient, $idbien);

        $result = update_reservations($reservation, $id_resa);
        if ($result) {
            echo "Le compte client a bien été mis à jour.";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'update_tarifs':

        $id = $_POST['idtarif'];
        $dd = $_POST['dd'];
        $df = $_POST['df'];
        $prix = $_POST['prix'];
        $id_bien = $_POST['idbien'];

        $tarif = new Tarifs($dd, $df, $prix, $id_bien);

        $result = update_tarifs($tarif, $id);
        if ($result) {
            echo "Le compte client a bien été mis à jour.";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'update_typebien':

        $id_type = $_POST['idtype'];
        $lib_type = $_POST['lib'];

        $typebien = new Typebien($lib_type);

        $result = update_typebien($typebien, $id_type);
        if ($result) {
            echo "Le compte client a bien été mis à jour.";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'update_photos':

        $id_photo = $_POST['idphoto'];
        $nom = $_POST['nom'];
        $lib = $_FILES['lib']['name'];
        $lib2 = $_FILES['lib']['tmp_name'];
        $idbien = $_POST['idbien'];
        move_uploaded_file($lib2, '../front/img' . $lib);
        
        $lib = "../front/img/" . $lib;
        
        $photo = new Photos($nom, $lib, $idbien);

        $result = update_photos($photo, $id_photo);
        if ($result) {
            echo "Le compte client a bien été mis à jour.";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    default:
        echo "Action non reconnue.";
}
?>