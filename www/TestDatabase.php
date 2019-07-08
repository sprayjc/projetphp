<?php
    //Import des fichiers nécéssaires aux tests
    require_once("database.php"); //(on a pas besoin d'autres)

    /////

    //J'affiche le titre de ma page
    echo "<h1> 1TakeJay - Loyal </h1>";


    //J'instancie une nouvelle connexion à ma base de données
    $database = new Database();

    //Affichage du contenu de la variable pour débugger
    //var_dump($database);

    if($database->getConnexion() == null){
        echo "<p> La connexion a échouée </p>";
    }else{
        echo "<p> Connexion réussie </p>";
             }

    //J'insère un nouveau maitre et je récupère son ID
    $nouvelId = $database->insertMaster("Cozi", "0762458329");

    echo "<p> Un nouveau maitre inséré avec le numéro : $nouvelId</p>";

    //J'insère un nouveau chien et je récupère son ID
    $idChien = $database->insertDog("Mal", "9", "Rotweiler", $nouvelId);
    echo "<p> Un nouveau chien a été inséré avec le numéro: $idChien</p>";
    //test exerc 11
    // on test la RECUPERATION DE LA LISTE DES CHIENS
    $listeChiens = $database->getAllDogs();

    // AFICHER LE RETOUR SUR UNE FORME DE LISTE
    echo "<ul>";
    foreach($listeChiens as $chien){
        echo "<li>";
        echo "le chien numero".$chien->getId()." : ".$chien->getNom()."de race".$chien->getRace();

        
        echo "</li>";
    }
        echo "</ul>";

       // var_dump($listeChiens);
    // demande d'obtenir l'id d'un chien sopecifique
    //$chien = $database->getChienById(27);
    //affiche le retour sur une forme de ligne
   // echo "Nom : ". $chien->getNom().",  race :".$chien->getRace();
   // appele la function delete 
    echo "Supprimer chien :  ";
   $resultat = $database->deleteChien(20);
   if($resultat == true){
       echo "Le chien a bien été supprimé";
   }else{
       echo "Problème, impossible de supprimer le chien";
   }

   
   // appel de la funftion update
   //$id, $nom, $age, $race
   $resultat = $database->updateChien(5, "tutu", 5, "chiuaua");
   if($resultat == true){
       echo "Le chien a bien été mis à jour";
   }else{
       echo "Problème, impossible de mettre à jour le chien";
   }


?>;