<?php
//import de la database
require_once ("database.php");
//creation de la connexion
$database = new Database();
//recuperer l'id depuis l'url
$id = $_GET["id"];
// je suprime le chien et je recupere le resultat
$resultat = $database->deleteChien($id);
if ($resultat == true){
    // si la supression a fonctionné je redirige vers la liste des chiens
    // php url redirectiion
    header('location: LiateChiens.php');
}else{
    //Si ca n'a pas marché afficher un message
    echo "Suppression impossible";
}

?>