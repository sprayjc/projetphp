<?php
require "classChien.php";
    class Database{
        private $connexion;


        //Le constructeur
        public function __construct(){
            $PARAM_hote="mariadb";                  //Le chemin vers le serveur
            $PARAM_port="3306";                     //Le port de connexion à la base de données
            $PARAM_nom_bd="AnnuaireToutou";         //Le nom de ma base de données
            $PARAM_utilisateur="adminToutou";       //Nom d'utilisateur pour se connecter
            $PARAM_mot_passe="Annu@ireT0ut0u";      //Mot de passe de l'utilisateur pour se connecter

            try{        //Le code qu'on essaye de faire
                $this->connexion = new PDO("mysql:dbname=" .$PARAM_nom_bd.";host=".$PARAM_hote,
                                    $PARAM_utilisateur, 
                                    $PARAM_mot_passe);
            }catch (Exception $monException){
                echo "Erreur : ".$monException->getMessage()."<br/>"; 
                echo "Code : ".$monException->getCode();
            }
        }

        //Les fonctions (Le comportement)
        public function getConnexion(){
            return $this->connexion;
        }

        //Fonction pour insérer un nouveau maitre
        public function insertMaster($nomMaitre, $telMaitre){

            //Je prépare la requête
            $pdoStatement = $this->connexion->prepare(
                "INSERT INTO Maitres (nom, telephone) VALUES (:paramNom, :paramTel)");

            //J'exécute la requête
            //En lui passant les valeurs en paramètres
            $pdoStatement->execute(array(
                "paramNom"=>$nomMaitre,
                "paramTel"=>$telMaitre
            ));

            /*//Pour débugger et vérifier que tout s'est bien passé
            var_dump($pdoStatement->errorInfo());*/


            //Je récupère l'id qui a été créé par la base de données
            $id = $this->connexion->lastInsertId();
            return $id;
        }

        //Fonction pour insérer un nouveau chien
        public function insertDog ($nomChien, $ageChien, $raceChien, $maitreChien){

            //Je prépare la requête
            $pdoStatement = $this->connexion->prepare(
                "INSERT INTO Chiens (nom, age, race, id_maitre) VALUES (:paramNom, :paramAge, :paramRace, :paramMaitre)");
            
                /*//Pour débugger et vérifier que tout s'est bien passé
                var_dump($pdoStatement->errorInfo());*/

            //J'exécute la requête
            //En lui passant les valeurs en paramètres
            $pdoStatement->execute(array(
                "paramNom"=>$nomChien,
                "paramAge"=>$ageChien,
                "paramRace"=>$raceChien,
                "paramMaitre"=>$maitreChien
            ));

            //Je récupère l'id qui a été créé par la base de données
            $id = $this->connexion->lastInsertId();
            return $id;
        }// fi function insertChien
        //exerc11
        // fonctio pour recupere tous les chiens
        public function getAllDogs(){
            //je prepare la requete nouveau chien
            $pdoStatement = $this->connexion->prepare(
            "SELECT id, nom, race from Chiens"
            );  
             //j'execute la requete

            $pdoStatement->execute();
            //on stock enphp le resultat de la requete
            $listeChiens = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Chien');
            // je retourne la liste chiens

            return $listeChiens;   
        
        }

        // function qui recupere un chien en fonction de son id
        public function getChienById($id){
            //je prepare ma requete
            $pdoStatement = $this->connexion->prepare(
                "SELECT c.id, c.nom, c.age, c.race, m.nom as nomMaitre, m.telephone
                FROM Chiens c
                INNER JOIN Maitres m
                ON c.id_maitre = m.id
                WHERE c.id = :idChien"
            );
            // j'execute la requete
            $pdoStatement->execute(
                array("idChien" => $id)
            );
            // je recupere et je stoke le rsultat
            $monChien = $pdoStatement->fetchObject("Chien");
            // var_dump($monChien);
            return $monChien;
        }
        //creer une function delete chien    
        public function deleteChien($id){
            //je prepare la requete
            $pdoStatement = $this->connexion->prepare(
                "DELETE  FROM Chiens  WHERE id = :idChien");
            // j'execute la requete
            $pdoStatement->execute(array(
                "idChien"=>$id,
            ));
       
            // recupere le code de retour de l'execution de la requete
            $errorCode = $pdoStatement->errorCode();
            if(errorCode == 0){
            // si c'a c'est bien passé renvoyer true
            }else{
                //si ça c'est mal passé return false
                return false;
            }
        }  
                
    }// fin database





    
?>