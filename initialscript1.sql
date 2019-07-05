CREATE DATABASE Babysitter;
USE Babysitter;10
CREATE TABLE Babysitter (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(200),
    prenom VARCHAR(200),
    age INT(20)
);
CREATE TABLE Enfant (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    prenom VARCHAR(200),
    age INT,
    babysitter int,
    FOREIGN KEY (babysitter) REFERENCES Babysitter(id)

);