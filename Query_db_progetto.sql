SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE Utenti;
SET FOREIGN_KEY_CHECKS = 1;
DELETE FROM ProdottiInVendita WHERE idProdotto=15;


INSERT INTO Reparti (NomeReparto) values("Arredamento");
INSERT INTO Reparti (NomeReparto) values("Soggiorno");
INSERT INTO Reparti (NomeReparto) values("Illuminazione");
Select * from Reparti;

INSERT INTO Magazzino(Capacità, Sede )VALUES ("2000", "Milano");
INSERT INTO Magazzino(Capacità, Sede )VALUES ("500", "Roma");
Select * from Magazzino;

INSERT INTO ProdottiInVendita (NomeProdotto, Prezzo, CasaProduttrice, Reparti_idReparto, Magazzino_idMagazzino, Quantità) 
values("Sedia EcoLine", "80", "0","2","1","20");
INSERT INTO ProdottiInVendita (NomeProdotto, Prezzo, CasaProduttrice, Reparti_idReparto, Magazzino_idMagazzino, Quantità) 
values("Lampada Elegante", "50", "0","3","2","40");
INSERT INTO ProdottiInVendita (NomeProdotto, Prezzo, CasaProduttrice, Reparti_idReparto, Magazzino_idMagazzino, Quantità) 
values("Set di Vasi", "90", "1425","1","1","28");
INSERT INTO ProdottiInVendita (NomeProdotto, Prezzo, CasaProduttrice, Reparti_idReparto, Magazzino_idMagazzino, Quantità) 
values("Divano Marrone", "390", "0","2","1","60");
INSERT INTO ProdottiInVendita (NomeProdotto, Prezzo, CasaProduttrice, Reparti_idReparto, Magazzino_idMagazzino, Quantità) 
values("Sedia Elegante", "60", "0","2","1","22");
INSERT INTO ProdottiInVendita (NomeProdotto, Prezzo, CasaProduttrice, Reparti_idReparto, Magazzino_idMagazzino, Quantità) 
values("Orario Classico", "450", "0","1","1","1");
INSERT INTO ProdottiInVendita (NomeProdotto, Prezzo, CasaProduttrice, Reparti_idReparto, Magazzino_idMagazzino, Quantità) 
values("Sedia di Legno", "40", "0","2","1","10");
INSERT INTO ProdottiInVendita (NomeProdotto, Prezzo, CasaProduttrice, Reparti_idReparto, Magazzino_idMagazzino, Quantità) 
values("Divano Moderno", "380","0","2","1","44");
INSERT INTO ProdottiInVendita (NomeProdotto, Prezzo, CasaProduttrice, Reparti_idReparto, Magazzino_idMagazzino, Quantità) 
values("Piantana WoodGlow", "318", "0","3","2","24");
INSERT INTO ProdottiInVendita (NomeProdotto, Prezzo, CasaProduttrice, Reparti_idReparto, Magazzino_idMagazzino, Quantità) 
values("Orologio da Comodino", "15", "0","1","1","0");
INSERT INTO ProdottiInVendita (NomeProdotto, Prezzo, CasaProduttrice, Reparti_idReparto, Magazzino_idMagazzino, Quantità) 
values("Lampada da Studio", "80", "0","3","2","17");
INSERT INTO ProdottiInVendita (NomeProdotto, Prezzo, CasaProduttrice, Reparti_idReparto, Magazzino_idMagazzino, Quantità) 
values("Vaso Bianco", "60", "1425","1","1","3");
INSERT INTO ProdottiInVendita (NomeProdotto, Prezzo, CasaProduttrice, Reparti_idReparto, Magazzino_idMagazzino, Quantità) 
values("Coppia di Vasi", "45", "1425","1","1","40");
INSERT INTO ProdottiInVendita (NomeProdotto, Prezzo, CasaProduttrice, Reparti_idReparto, Magazzino_idMagazzino, Quantità) 
values("Divano Verde", "480", "0","2","1","6");
INSERT INTO ProdottiInVendita (NomeProdotto, Prezzo, CasaProduttrice, Reparti_idReparto, Magazzino_idMagazzino, Quantità) 
values("Orologio da Parete", "50", "0","1","1","0");
SELECT * from ProdottiInVendita;


