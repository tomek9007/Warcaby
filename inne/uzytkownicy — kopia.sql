CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imie` text  NOT NULL,
  `nazwisko` text  NOT NULL,
  `mail` text  NOT NULL,
  `login` text  NOT NULL,
  `haslo` text NOT NULL,
  `zwyciestwa` int(10),
	PRIMARY KEY (`id`)
) ;


INSERT INTO `uzytkownicy`(`haslo`, `login`, `imie`, `nazwisko`, `mail`,`zwyciestwa`) 
VALUES 
('freeman','morfa65','Morgan','Freeman','morfre@onet.pl',2),
('nicholson','Joker','Nicholson','Jack','nicco@gmail.com',5),
('96m202' ,'kokoli','Daniel','Formela','formel@wp.pl',1),
('86m602','nugat','Kamil','Jastrzebski','jastrzab@onet.pl',0),      
('85m309','snick' ,'Rafal' ,'Wolak' ,'wolus@o2.pl',0),       
('90m207','dudus' ,'Tomasz','Spaleniak','spalony@wp.pl',0),           
('83m313' ,'Ruda' ,'Katarzyna' ,'Moskalewicz','moska@wp.pl',0),           
('80f307' ,'Gruby','Bernard' ,'Czartoryski' ,'czarus@onet.pl',1),           
('91d512','ribery' ,'Maria' ,'Poniatowska' ,'krolowa@gmail.com',2),           
('51s536','monia' ,'Monika' ,'Kaczmarek','mon@onet.pl',3),           
('78s123' ,'haslo' ,'Radoslaw','Burak' ,'cwiklowy@o2.pl',0),           
('97s321' ,'123456' ,'Bartosz','Figurski' ,'figur@gmail.com',0);


CREATE TABLE IF NOT EXISTS `mecze` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `GraczBialy` text  NOT NULL,
  `GraczCzarny` text  NOT NULL,
  `wynikBialych` text  NOT NULL,
  `wynikCzarnych` text  NOT NULL,
	PRIMARY KEY (`id`)
) ;


INSERT INTO `mecze`(`data`, `GraczBialy`, `GraczCzarny`, `wynikBialych`, `wynikCzarnych`) 
VALUES          
('2017-11-15','Joker' ,'morfa65' ,'win','lose'),           
('2017-11-18','Joker' ,'morfa65' ,'win','lose'),                  
('2017-11-25','morfa65' ,'Joker','lose','win'),
('2017-11-10','kokoli' ,'Joker','lose','win'),
('2017-11-30','dudus' ,'morfa65','lose','win'),
('2017-11-15','Ruda' ,'Joker','lose','win'),
('2017-11-16','Gruby' ,'morfa65','lose','lose'),
('2017-11-16','morfa65' ,'dudus','win','lose'),
('2017-11-20','Joker' ,'monia','lose','win'),
('2017-11-25','morfa65' ,'monia','lose','win'),
('2017-11-27','monia' ,'dudus','win','lose'),
('2017-11-24','kokoli' ,'Gruby','lose','win'),
('2017-11-29','Gruby' ,'kokoli','lose','win');
