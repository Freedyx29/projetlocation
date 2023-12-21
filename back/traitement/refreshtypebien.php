<?php


 // puis création de votre requete  dans l'exemple ci dessous on sélectionne les eleves d'une BDD
 
	include '../include/connexion_PDO.php';

        

$keyword = '%'.$_POST['keyword'].'%';  // récupère la lettre saisie dans le champ texte en provenance de JS 


$sql = "SELECT * FROM typebien WHERE lib_type_bien LIKE (:var) ORDER BY id_type_bien ASC LIMIT 0, 10";  // création de la requete avec sélection des résultats sur la lettre 
$req = $con->prepare($sql);
$req->bindParam(':var', $keyword, PDO::PARAM_STR);
$req->execute();
$list = $req->fetchAll();
foreach ($list as $res) {
	//  affichage
	$Listetypebien = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $res['lib_type_bien']);
	// sélection 
        echo '<li onclick="set_item2(\''.str_replace("'", "\'", $res['lib_type_bien']).'\',\''.str_replace("'", "\'", $res['id_type_bien']).'\')">'.$Listetypebien.'</li>';
}
?>