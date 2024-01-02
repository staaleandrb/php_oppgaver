/*
Oppgave p06 - quiz med database
Porsgrunn vgs - 2024    
Utvikling vg2
 
Laget av Staale Andre Bergersen

Først må du opprette en database og en tabell for å lagre spørsmål og svar. 
Du kan gjøre dette ved hjelp av verktøy som phpMyAdmin eller ved å kjøre 
SQL-kommandoer i for eksempel MySQL Workbench.

Koden under vil opprette en database kalt quiz_database og en tabell kalt 
sporsmal med kolonnene id, sporsmaltekst, og fasit.
*/


CREATE DATABASE quiz_database;
USE quiz_database;

CREATE TABLE sporsmal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sporsmaltekst VARCHAR(255) NOT NULL,
    fasit VARCHAR(10) NOT NULL
);

INSERT INTO sporsmal (sporsmaltekst, fasit) VALUES
    ('Snør det i dag?', 'ja'),
    ('Blir det sol?', 'nei'),
    ('Er det kaldt?', 'ja');
