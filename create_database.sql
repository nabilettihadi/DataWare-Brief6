CREATE DATABASE IF NOT EXISTS DataWare;
USE DataWare;

CREATE TABLE Equipe (
    IDEquipe INT PRIMARY KEY AUTO_INCREMENT,
    NomEquipe VARCHAR(255),
    DateCreation DATE
);

CREATE TABLE IF NOT EXISTS projets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    description TEXT,
    date_debut DATE,
    date_fin DATE
);

CREATE TABLE Membre (
    IDMembre INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(255) NOT NULL,
    Prenom VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    Role VARCHAR(50),
    IDEquipe INT,
    Statut VARCHAR(50),
    FOREIGN KEY (IDEquipe) REFERENCES Equipe(IDEquipe)
);

INSERT INTO Membre (Nom, Prenom, Email, mot_de_passe, Role, IDEquipe, Statut)
VALUES ('Nabil', 'Ettihadi', 'nabil@gmail.com', 'nabil2002', 'ProductOwner', NULL, 'actif');


-- INSERT INTO Equipe VALUES (1, 'Equipe A', '2023-01-01');
-- INSERT INTO Equipe VALUES (2, 'Equipe B', '2023-09-01');
-- INSERT INTO Equipe VALUES (3, 'Equipe C', '2023-10-01');

-- INSERT INTO Membre VALUES (1, 'Ettihadi', 'Nabil', 'nabil@gmail.com', 'nabil2002', 'ProductOwner', NULL, 'Actif');
-- INSERT INTO Membre VALUES (2, 'hatimi', 'Amine', 'amine@gmail.com', 'Developer', NULL, 'Inactif');
-- INSERT INTO Membre VALUES (3, 'berrada', 'Yassir', 'yassir@gmail.com', 'Designer', NULL, 'Actif');
-- INSERT INTO Membre VALUES (4, 'baraka', 'Kamal', 'kamal@gmail.com', 'Developer', NULL, 'Actif');
-- INSERT INTO Membre VALUES (5, 'saadan', 'Mohammed', 'mohamed@gmail.com', 'Designer', NULL, 'Inactif');
-- INSERT INTO Membre VALUES (6, 'kotaibi', 'Rayan', 'rayan@gmail.com', 'Developer', NULL, 'Inactif');
-- INSERT INTO Membre VALUES (7, 'hachimi', 'Salim', 'salim@gmail.com', 'Designer', NULL, 'Actif');
-- INSERT INTO Membre VALUES (8, 'Rami', 'Badr', 'badr@gmail.com', 'Developer', NULL, 'Inactif');