<?php
//create la page create-chien.php et implementer le formulaire html
//import de la database
require_once ("database.php");
//  creation ou instanciation de la classe Database
$database = new Database();
// recuperation de la liste d'un chien
$maitres = $database->getAllMaitres();
//var_dump($maitres);
?>
<html>
<header>
    <link rel="stylesheet" href="style.css">
</header>
    <body>
        <h1>Creation d'un nouveau chien</h1>
        <form action="process-create.php" method="post">
            <label for="monChien"> Nom </label><br>
            <input type="text" id="nomChien" name="nom"><br>
            <label for="ageChien">Age</label><br>
            <input type="number" id="ageChien" name="age"><br>
            <label for="raceChien">Race</label><br>
            <input type="text" id="raceChien" name="race"><br>

            <label for="choixMaitre">Maitre</label>
            <select id="choixMaitre" name="idMaitre">
            <?php
                foreach($maitres as $maitre){
                    echo"<option value=".$maitre->getId().">".$maitre->getNom()."</option>";
                }               
            ?>
                </select>
        
            <input type="submit">

        </form> 


        
        
    </body>
      
</html>
