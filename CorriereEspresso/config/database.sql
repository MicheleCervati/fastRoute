-- Creazione del database
CREATE DATABASE CampionatoAutomobilistico;


-- Tabella Case Automobilistiche
CREATE TABLE CampionatoAutomobilistico.CaseAutomobilistiche (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    colore_livrea VARCHAR(30) NOT NULL
);

-- Tabella Piloti
CREATE TABLE CampionatoAutomobilistico.Piloti (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    cognome VARCHAR(50) NOT NULL,
    nazionalita VARCHAR(30) NOT NULL,
    numero INT UNIQUE NOT NULL,
    id_casa INT NOT NULL,
    FOREIGN KEY (id_casa) REFERENCES CaseAutomobilistiche(id) ON DELETE CASCADE
);

-- Tabella Gare
CREATE TABLE CampionatoAutomobilistico.Gare (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    data DATE NOT NULL
);



-- Tabella Risultati
CREATE TABLE CampionatoAutomobilistico.Risultati (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_gara INT NOT NULL,
    id_pilota INT NOT NULL,
    posizione INT NOT NULL,
    tempo TIME NOT NULL,
    FOREIGN KEY (id_gara) REFERENCES Gare(id) ON DELETE CASCADE,
    FOREIGN KEY (id_pilota) REFERENCES Piloti(id) ON DELETE CASCADE
);

ALTER TABLE CampionatoAutomobilistico.Piloti
DROP COLUMN punteggio;


-- Inserimento dati nelle Case Automobilistiche
INSERT INTO CampionatoAutomobilistico.CaseAutomobilistiche (nome, colore_livrea) VALUES 
('Ferrari', 'Rosso'),
('Mercedes', 'Argento'),
('Red Bull', 'Blu');

-- Inserimento dati nei Piloti
INSERT INTO CampionatoAutomobilistico.Piloti (nome, cognome, nazionalita, numero, id_casa) VALUES
('Charles', 'Leclerc', 'Monegasco', 16, 1),
('Lewis', 'Hamilton', 'Britannico', 44, 2),
('Max', 'Verstappen', 'Olandese', 33, 3);

-- Inserimento dati nelle Gare
INSERT INTO CampionatoAutomobilistico.Gare (nome, data) VALUES
('Gran Premio di Monaco', '2025-05-25'),
('Gran Premio di Silverstone', '2025-07-07');


-- Inserimento dati nei Risultati
INSERT INTO CampionatoAutomobilistico.Risultati (id_gara, id_pilota, posizione, tempo) VALUES
(1, 3, 1, '01:30:25'),
(1, 2, 2, '01:30:50'),
(1, 1, 3, '01:31:10'),
(2, 2, 1, '01:27:45'),
(2, 3, 2, '01:28:00'),
(2, 1, 3, '01:28:20');


