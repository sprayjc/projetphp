<?php
//page intermediaire => que du php



// importe une database
require_once ("database.php");
// instancier une database
$database = new Database();

// recuperer les infos du formilaire avec $_POST
$nom = $_POST["nom"];
$age = $_POST["age"];
$race = $_POST["race"];
$idMaitre = $_POST["idMaitre"];


// appeler la fonction inserDog en lui passant les infos du formulaire
$nouvelId = $database->insertDog($nom, $age, $race, $idMaitre);

// rediriger l'utilisateur vers la page de profil du nouveau chien (rediriger  url directon)
header('location: afficherChien.php?id='.$nouvelId);

?>