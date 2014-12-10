INSERT INTO `uzivatele` (`id_uzivatele`, `jmeno`, `prijmeni`, `login`, `heslo`, `email`) VALUES
(1,	'Marek',	'Rojík',	'admin',	'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec',	'admin@doprava.cz');

INSERT INTO `preprava` (`id_prepravy`, `nazev_prepravy`) VALUES
(1,	'Pick-up přeprava'),
(2,	'Dodávková přeprava'),
(3,	'Nákladní přeprava');

INSERT INTO `firma` (`nazev`, `ulice`, `mesto`, `psc`, `mobil`, `telefon`, `email`) VALUES
('Autodoprava Kučera',	'Adresa adresa 452',	'České Budějovice',	'389 71',	'+420 723 654 895',	'+420 383 695 475',	'doprava@autodoprava.cz');

INSERT INTO `stranky` (`id_stranky`, `nazev`, `obsah`) VALUES
(1,	'o_nas',	'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(2,	'nabidka',	'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&nbsp;<br /><br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(3,	'Stěhování',	'<p class=\"MsoNormal\"><strong>Stěhov&aacute;n&iacute; bytů a zař&iacute;zen&iacute; rodinn&yacute;ch domků</strong></p>\r\n<p class=\"MsoNormal\">Na&scaron;e firma&nbsp;<strong>Autodoprava Kučera</strong>&nbsp;zajist&iacute; kompletn&iacute; stěhovac&iacute; služby pro Va&scaron;i dom&aacute;cnost - přestěhujeme zař&iacute;zen&iacute; Va&scaron;eho bytu nebo rodinn&eacute;ho domku po Praze a cel&eacute; ČR.</p>\r\n<p class=\"MsoNormal\"><strong>Kontaktujte n&aacute;s</strong></p>\r\n<p class=\"MsoNormal\"><strong>Stěhovac&iacute; služby pro firmy, stěhov&aacute;n&iacute; firem a kancel&aacute;ř&iacute;</strong></p>\r\n<p class=\"MsoNormal\"><strong>Autodoprava Kučera</strong>&nbsp;prov&aacute;d&iacute; odborn&eacute; stěhovac&iacute; služby pro firmy, při stěhov&aacute;n&iacute; kancel&aacute;ř&iacute; po Praze a cel&eacute; ČR.</p>\r\n<p class=\"MsoNormal\"><strong>Před stěhov&aacute;n&iacute;m doporučujeme udělat</strong></p>\r\n<ol style=\"margin-top: 0cm;\" type=\"1\" start=\"1\">\r\n<li class=\"MsoNormal\">Připravte seznam stěhovan&yacute;ch věc&iacute;. T&iacute;mto n&aacute;m pomůžete co nejpřesněji odhadnout cenu stěhov&aacute;n&iacute;.</li>\r\n<li class=\"MsoNormal\">Pro zji&scaron;těn&iacute; ceny stěhov&aacute;n&iacute; můžete zavolat na&nbsp;<strong>Dispečink NON-STOP</strong>. Zabezpečte parkov&aacute;n&iacute; pro stěhovac&iacute; auto.</li>\r\n</ol>'),
(4,	'Skladování',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

INSERT INTO `zakaznici` (`id_zakaznika`, `jmeno`, `prijmeni`, `ulice`, `mesto`, `psc`, `datum_registrace`, `email`) VALUES
(1,	'Lukáš',	'Palek',	'Brigádnick 8218',	'Písek',	'39701',	'2014-11-11 00:00:00',	'adwqd@cdow.cz'),
(2,	'Patrik',	'Hedak',	'Písecká 729',	'Strakonice',	'39850',	'2014-11-03 00:00:00',	'patrik@seznam.cz'),
(3,	'Luboš',	'Helák',	'Astrova 759',	'České Budějovice',	'72562',	'2014-11-09 00:00:00',	'halak@centrum.cz'),
(4,	'Leoš', 	'Nový',		'Nová 458',		'Praha',		'45124',	'2014-11-25 00:00:00',	'pkp@opk.cz'),
(5,	'Karel',	'Patrok',	'Stará 457',	',Opava,',	'45874',	'2014-11-25 00:00:00',	'kpokp@opkp.cz');

INSERT INTO `auto` (`id_auta`, `nazev`, `objem`, `nosnost`, `pocet`, `vybaveni`, `pocet_sezeni`, `technika`, `delka_plochy`, `cena`, `vyrazeno`, `preprava_id`, `uzivatele_id`) VALUES
(1,	'Dacia DOKKER',	'3',	'600',	'1',	NULL,	NULL,	NULL,	'15 m',	30,	0,	2,	1),
(2,	'Renault KANGOO',	'3',	'600',	'3',	NULL,	NULL,	NULL,	NULL,	38,	0,	1,	1),
(3,	'Renault MASTER DUAL',	'8 + 3',	'1,1 tuny',	'1',	NULL,	'',	NULL,	NULL,	60,	1,	2,	1),
(4,	'Renault MASTER',	'7 - 12,6',	'1,5 tuny',	'9',	NULL,	'',	NULL,	NULL,	51,	0,	2,	1),
(5,	'Renault MIDLUM',	'34',	'3,4 tuny',	'2',	NULL,	'',	NULL,	NULL,	70,	0,	3,	1),
(6,	'Škoda OCTAVIA',	'10',	'600 tuny',	'3',	NULL,	'5',	NULL,	NULL,	25,	0,	2,	1),
(7,	'Ford ESCORT',	'3',	'5,5 kg',	'2',	NULL,	'4',	NULL,	NULL,	19,	0,	3,	1),
(8,	'Škoda SUPERB',	'5',	'500',	'5',	NULL,	'6',	NULL,	NULL,	74,	0,	3,	1),
(9,	'Passat',	'4',	'23',	'4',	NULL,	'5',	NULL,	NULL,	28,	0,	3,	1),
(10,	'Ford Focus',	'12',	'542 kg',	'2',	NULL,	'5',	NULL,	NULL,	42,	0,	3,	1);


INSERT INTO `foto` (`id_foto`, `soubor`, `auto_id`) VALUES
(1,	'car-1.jpg',	1),
(2,	'car-2.jpg',	1),
(3,	'car-3.jpg',	2),
(4,	'car-4.jpg',	4),
(5,	'car-5.jpg',	5),
(6,	'car-6.jpg',	5),
(7,	'car-7.jpg',	5),
(8,	'car-8.jpg',	3),
(9,	'car-9.jpg',	4),
(10,	'car-10.JPG',	7),
(11,	'car-11.jpg',	6),
(12,	'car-12.JPG',	10);žc

INSERT INTO `objednavky` (`id_objednavky`, `datum`, `zakaznici_id`, `preprava_id`, `auto_id`, `vyrizeno`) VALUES
(1,	'2014-11-24 00:00:00',	1,	3,	5,	1),
(2,	'2014-11-24 00:00:00',	1,	2,	4,	0),
(3,	'2014-11-24 00:00:00',	2,	2,	4,	1),
(4,	'2014-11-25 00:00:00',	4,	1,	1,	0),
(5,	'2014-11-25 00:00:00',	2,	1,	1,	0),
(6,	'2014-11-25 00:00:00',	2,	3,	5,	1),
(7,	'2014-11-25 00:00:00',	2,	2,	3,	0),
(8,	'2014-11-25 10:40:47',	2,	2,	4,	1),
(9,	'2014-11-25 10:41:38',	5,	2,	3,	1),
(10,	'2014-11-25 10:43:34',	1,	2,	3,	0),
(11,	'2014-11-26 17:15:03',	3,	2,	3,	0);



