<?php
//import de la database exe - 14
require_once ("database.php");
//creation de la connexion
$database = new Database();
// recuperation de la liste des chiens
$listeChiens = $database->getAllDogs();
?>
    <html>
        <header>
            <link rel="stylesheet" href="style.css">
        </header>
        <body>
            <a href="create-chien.php">Nouveau chien</a>
            <br>
            
            <h1>liste des chiens</h1>
            <h2>Annuaire</h2>

            <ul>
                <?php foreach($listeChiens as $chien){ ?>
                <li>
                <?php echo "<a href =afficherChien.php?id=".$chien->getID().">";
                        echo "chien numero".$chien->getID()." : ".$chien->getNom()."de race".$chien->getRace();
                        echo "</a>";
                ?>    
                </li>
                <?php } ?>
            </ul>
        </body>
    </html>
        

