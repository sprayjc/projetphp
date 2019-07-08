<?php

//import de la database
require_once ("database.php");
//creation de la connexion
$database = new Database();
//recuperer l'id depuis l'url
$id = $_GET["id"];
//var_dump($id);
// recuperation de la liste d'un chien
$chien = $database->getChienById($id);

?>
<html>
<!--Affiche les info de forme agreable-->
    <header>
        <link rel="stylesheet" href="style.css">
    </header>
    <body>
        <h1>Informations chien</h1>      
            <p>Nom : <?php echo $chien->getNom()?></p><br>           
            <p>Race : <?php echo $chien->getRace()?><p><br>
            <p>Age : <?php echo $chien->getAge()?></p><br>
        <h1>Informations maitre</h1>   
            <p>Nom : <?php echo $chien->getNomMaitre()?></p><br>
            <p>Tel : <?php echo $chien->getTelephone()?></p><br>   
        <br><br>
            <a class="buttonDelete" href="process-delete.php?id=<?php echo $chien->getid(); ?>">Delete</a>
    </body>
</html>