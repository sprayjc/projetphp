CREATE DATABASE AnnuaireToutou;/* requete pour creer la base de données*/
USE AnnuaireToutou;/* requete que precise au script qu'on va utiliser cette base de données */

CREATE USER 'adminToutou' @'localhost' IDENTIFIED BY 'Annu@ireTOuTOu';
GRANT ALL PRIVILEGES ON AnnuaireToutou.* TO 'adminToutou'@'localhost';
FLUSH PRIVILEGES;

CREATE TABLE Maitres (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR (200),
    telephone VARCHAR (20)
);

CREATE TABLE Chiens (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR (255),
    age INT,
    race VARCHAR (200),
    id_maitre INT,
    FOREIGN KEY (id_maitre) REFERENCES Maitres (id)
);