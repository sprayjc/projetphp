--creer la base de donées
CREATE DATABASE AnnuaireToutou;
USE AnnuaireToutou;
--creer l'utilisateur
CREATE USER "adminToutou"@"%" IDENTIFIED BY "Annu@ireToutou";
GRANT ALL PRIVILEGES ON AnnuaireToutou.* TO "adminToutou"@"%";


--creer la table Maitres en premier
CREATE TABLE Maitres (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR'(200)',
    telephone VARCHAR'(20)'
);
--creer la table chiens
CREATE TABLE Chiens(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR'(255)',
    age INT,
    race VARCHAR'(200)',
    id_maitre INT,
    FOREIGN KEY '('id_maitre')' REFERENCES Maitres'('id')'
);


--Insérer un maitre
INSERT INTO Maitres (nom, telephone)
VALUES ('Bob', '0798767654');

--Insérer un  chien
INSERT INTO Chiens (nom, age, race, id_maitre)
VALUES ("Donatello", "5", "Huskey", 2);

--lister tous les chiens existants et obtenir leur id,nom, et race
select id, nom, race from Chiens;
-- selectionner un chien avec les informations de son maitre
SELECT c.id, c.nom, c.age, c.race, m.nom as nomMaitre, m.telephone
FROM Chiens c
INNER JOIN Maitres m
ON c.id_maitre = m.id
where c.id = 1
-- selection tous les chiens
SELECT c.id, c.nom, c.age, c.race, m.nom as nomMaitre, m.telephone
FROM Chiens c
INNER JOIN Maitres m
ON c.id_maitre = m.id

