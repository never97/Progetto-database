INSERT INTO UTENTE(Matricola,Nome_utente,Cognome_utente,Data_n_utente) VALUES 
    (111111,"Mario","Rossi",'1995-10-06'),
    (222222,"Giuseppe","Verdi",'1999-12-01'),
    (333333,"Carlo","Ferrari",'1998-01-02'),
    (444444,"Antonio","Russo",'1997-07-07'),
    (555555,"Rosa","Bianchi",'1996-03-05'),
    (666666,"Angela","Romano",'1998-05-12');
    (111222,"Leone","Rosso",'1969-07-01');
    (333444,"Giovanni","Muciaccia",'1993-01-15');
    (666777,"Saburo","Yatsude",'1984-09-10');

INSERT INTO UTENTE(Matricola,Nome_Utente,Cognome_utente,Iniziali_sn_utente,Data_n_utente) VALUES
    (777777,"Giovanna","Costa","A",'1999-10-05'),
    (888888,"Vincenzo","Fontana","N",'1998-08-09'),
    (999999,"Francesca","Rizzo","G",'1995-10-05');

INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato,Data_restituzione) VALUES (1,111111,'2010-01-02','2010-02-02',1,'2010-01-09');

INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato,Data_restituzione) VALUES (8,222222,'2013-10-04','2013-11-04',1,'2013-10-13');

INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato,Data_restituzione) VALUES (27,333333,'2002-05-06','2002-06-06',1,'2002-06-03');

INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato) VALUES (59,444444,'2020-03-13','2020-04-13',0);
UPDATE COPIE_LIBRO SET Presenza = 0 WHERE ID = 59 ;
INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato,Data_restituzione) VALUES (231,555555,'2015-10-17','2015-11-17',1,'2015-11-15');

INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato) VALUES (108,666666,'2020-07-20','2020-08-20',0);
UPDATE COPIE_LIBRO SET Presenza = 0 WHERE ID = 108 ;
INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato,Data_restituzione) VALUES (97,777777,'2008-02-14','2008-03-14',1,'2008-03-05');

INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato) VALUES (12,888888,'2020-05-11','2020-06-11',0);
UPDATE COPIE_LIBRO SET Presenza = 0 WHERE ID = 12 ;
INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato,Data_restituzione) VALUES (43,999999,'2018-04-27','2018-05-27',1,'2018-04-22');


INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato,Data_restituzione) VALUES (124,999999,'2020-07-21','2018-08-21',1,'2018-08-20');
 
INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato,Data_restituzione) VALUES (198,999999,'2014-04-27','2014-05-27',1,'2014-05-18');

INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato) VALUES (13,555555,'2020-04-27','2020-05-27',0);
UPDATE COPIE_LIBRO SET Presenza = 0 WHERE ID = 13 ;  
INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato) VALUES (99,999999,'2020-07-10','2020-08-10',0);
UPDATE COPIE_LIBRO SET Presenza = 0 WHERE ID = 99 ;  
INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato,Data_restituzione) VALUES (71,666666,'2012-04-27','2012-05-27',1,'2012-05-30');

INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato,Data_restituzione) VALUES (149,222222,'2003-05-13','2003-06-13',1,'2003-07-11');
  
INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato,Data_restituzione) VALUES (438,666666,'2019-01-21','2019-02-21',1,'2019-05-01');

INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato) VALUES (401,555555,'2020-04-11','2020-05-11',0);
UPDATE COPIE_LIBRO SET Presenza = 0 WHERE ID = 401 ;  
INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato) VALUES (343,999999,'2020-06-10','2020-07-10',0);
UPDATE COPIE_LIBRO SET Presenza = 0 WHERE ID = 343 ;  
INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato,Data_restituzione) VALUES (355,666666,'2012-04-27','2012-05-27',1,'2012-05-30');

INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato,Data_restituzione) VALUES (366,222222,'2003-05-13','2003-06-13',1,'2003-07-11');
  
INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato,Data_restituzione) VALUES (378,666666,'2019-01-21','2019-02-21',1,'2019-05-01');


INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato) VALUES (197,888888,'2020-02-27','2020-03-27',0);
UPDATE COPIE_LIBRO SET Presenza = 0 WHERE ID = 197 ;  

INSERT INTO PRESTITO(ID_libro,Matricola,Data_prestito,Scadenza_prestito,Consegnato) VALUES (296,888888,'2020-05-02','2020-06-02',0);
UPDATE COPIE_LIBRO SET Presenza = 0 WHERE ID = 296 ;
  
  
    
    
    
    
    
   

