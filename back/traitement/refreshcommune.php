<?php


 // puis création de votre requete  dans l'exemple ci dessous on sélectionne les eleves d'une BDD
 
	include '../include/connexion_PDO.php';


$keyword = '%'.$_POST['keyword'].'%';  // récupère la lettre saisie dans le champ texte en provenance de JS 


$sql = "SELECT * FROM commune WHERE ville LIKE (:var) or codep LIKE (:var) ORDER BY ville ASC LIMIT 0, 10";  // création de la requete avec sélection des résultats sur la lettre 
$req = $con->prepare($sql);
$req->bindParam(':var', $keyword, PDO::PARAM_STR);
$req->execute();
$list = $req->fetchAll();
foreach ($list as $res) {
	//  affichage
	$Liste = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $res['ville'].' '.$res['codep']);
	// sélection 
        echo '<li onclick="set_item(\''.str_replace("'", "\'", $res['ville']).'\',\''.str_replace("'", "\'", $res['codep']).'\')">'.$Liste.'</li>';
}
?>