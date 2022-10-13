CREATE TABLE `uzytkownicy` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`login` varchar(255) NOT NULL,
	`hasło` varchar(255) NOT NULL,
	`nick` varchar(255) NOT NULL,
	`data_utworzenia` DATE(255) NOT NULL,
	`prof_img` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `glosy` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_uzyt` INT NOT NULL,
	`polubienia` INT NOT NULL,
	`temat` varchar(255) NOT NULL,
	`opis` TEXT(255) NOT NULL,
	`data_dodania` DATE(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `polubienia` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_uzyt` INT NOT NULL AUTO_INCREMENT,
	`id_glosy` INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Do usunięcia` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_uzyt` INT NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `glosy` ADD CONSTRAINT `glosy_fk0` FOREIGN KEY (`id_uzyt`) REFERENCES `uzytkownicy`(`id`);

ALTER TABLE `polubienia` ADD CONSTRAINT `polubienia_fk0` FOREIGN KEY (`id_uzyt`) REFERENCES `uzytkownicy`(`id`);

ALTER TABLE `polubienia` ADD CONSTRAINT `polubienia_fk1` FOREIGN KEY (`id_glosy`) REFERENCES `glosy`(`id`);

ALTER TABLE `Do usunięcia` ADD CONSTRAINT `Do usunięcia_fk0` FOREIGN KEY (`id_uzyt`) REFERENCES `uzytkownicy`(`id`);