CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `imie` text  NOT NULL,
  `nazwisko` text  NOT NULL,
  `mail` text  NOT NULL,
  `login` varchar(20)  NOT NULL,
  `haslo` text NOT NULL,
	PRIMARY KEY (`login`)
) ;


INSERT INTO `uzytkownicy`(`haslo`, `login`, `imie`, `nazwisko`, `mail`,`zwyciestwa`) 
VALUES 
('freeman','morfa65','Morgan','Freeman','morfre@onet.pl',2),
('nicholson','Joker','Nicholson','Jack','nicco@gmail.com',5),
('forma' ,'kokoli','Daniel','Formela','formel@wp.pl',1),
('nugat','kamil','Kamil','Jastrzebski','jastrzab@onet.pl',0),      
('85m309','snick' ,'Rafal' ,'Wolak' ,'wolus@o2.pl',0),       
('duda','dudus' ,'Tomasz','Spaleniak','spalony@wp.pl',0),           
('lisica' ,'Ruda' ,'Katarzyna' ,'Moskalewicz','moska@wp.pl',0),           
('80f307' ,'Gruby','Bernard' ,'Czartoryski' ,'czarus@onet.pl',1),           
('91d512','ribery' ,'Maria' ,'Poniatowska' ,'krolowa@gmail.com',2),           
('51s536','monia' ,'Monika' ,'Kaczmarek','mon@onet.pl',3),           
('login' ,'haslo' ,'Radoslaw','Burak' ,'cwiklowy@o2.pl',0),           
('figura' ,'bartek' ,'Bartosz','Figurski' ,'figur@gmail.com',0);


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


INSERT INTO `uzytkownicy` (`imie`, `nazwisko`, `mail`, `login`, `haslo`, `zwyciestwa`) VALUES
('Bartosz', 'Figurski', 'figur@gmail.com', 'bartek', '$2y$10$tEcHjVE24ClmbqL6yaTR5eXq6n6iT/uJsNwdPpuZq8Pc3m3zO9kUK'),
('Roman', 'Dudkiewicz', 'duda@onet.pl', 'dudus', '$2y$10$MQhsz3AquZ/jUFwjRnK7BeZrtOFynELO7BE3G4pokUM2Vx88RW73K'),
('Bartosz', 'Tlusty', 'tlusty@wp.pl', 'Gruby', '$2y$10$2YbEgy9BPmg7PV4lB2B6k.8xMjUvY8hSeK/93sPBj0W3jzxrl1A8i'),
('Radoslaw', 'Burak', 'cwiklowy@o2.pl', 'haslo', '$2y$10$N9hm/w6xoKK03ZwzkUdPB.4qaOWfBFxdfYcyGTrNxcz58CHEsO2eS'),
('Jack', 'Nicholson', 'nicco@gmail.com', 'Joker', '$2y$10$laUOuxIlyAG/654SVlt0ruzPxtyMJMj0NuluCfIG9vHI7YcJyMkAK'),
('Daniel', 'Formela', 'formel@wp.pl', 'kokoli', '$2y$10$7GALZorEhVnbNVHLxLv23OVdwsLiVnV45N01hHcRoAa2qs/Yavquu'),
('Kyle', 'Simmons', 'kyle@gmail.com', 'kyle', '$2y$10$PPAD0IxMx2sm.n6P.KvOTu.Wqt8bxANQ.OxRArnyLKpNZKdM9r5oq'),
('Monika', 'Krzak', 'monia@onet.pl', 'monia', '$2y$10$JGnW0os2qwcPkGpcc.LaJeHvoMOw2/NGrIxd9YjoEq5Q4.pmODry6'),
('Morgan', 'Freeman', 'mor@onet.pl', 'morfa65', '$2y$10$6Xv/6OkvNzG6Uob0rJz5OuTCm0DTA/S2YUtqoOKvhVC0qcBTIXRte'),
('Edyta', 'Mroz', 'mrozna@wp.pl', 'Ruda', '$2y$10$TdJIE58kAUKSlntWLT34C.xKsvQzH7q/I9s7fKHYYByr9J/CDTpfu');
