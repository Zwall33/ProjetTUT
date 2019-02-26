CREATE USER 'server'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON * . * TO 'server'@'localhost';

CREATE DATABASE Jardin_PTUT;
USE Jardin_PTUT;


CREATE TABLE Capteur(Heure TIMESTAMP, Temperature INT, Humidite INT, Luminosite INT, Fertilite INT);
CREATE TABLE Pompe(Heure TIMESTAMP, Pompe1 BOOLEAN, vit_pompe1 INT, Pompe2 BOOLEAN, vit_pompe2 INT, Pompe3 BOOLEAN, vit_pompe3 INT, Pompe4 BOOLEAN, vit_pompe4 INT);
CREATE TABLE Calendrier(Heure TIMESTAMP, Pompe1 BOOLEAN, Pompe2 BOOLEAN, Pompe3 BOOLEAN, Pompe4 BOOLEAN);

