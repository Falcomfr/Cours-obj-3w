CREATE DATABASE IF NOT EXISTS `nains` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `ville` (
	`v_id` INT(11) NOT NULL AUTO_INCREMENT,
	`v_nom` VARCHAR(255) NOT NULL,
    `v_superficie` INT(11) NOT NULL,
	PRIMARY KEY(`v_id`)
	) ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `taverne` (
	`t_id` INT(11) NOT NULL AUTO_INCREMENT,
	`t_nom` VARCHAR(255) NOT NULL,
	`t_chambres` int(11) NOT NULL,
	`t_blonde` BOOL NOT NULL,
	`t_brune` BOOL NOT NULL,
    `t_rousse` BOOL NOT NULL,
    `t_ville_fk` INT(11) NOT NULL, CONSTRAINT `t_ville_fk_v` FOREIGN KEY (`t_ville_fk`) REFERENCES `ville` (`v_id`) ON UPDATE CASCADE ON DELETE RESTRICT,
	PRIMARY KEY(`t_id`)
	) ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tunnel` (
	`t_id` INT(11) NOT NULL AUTO_INCREMENT,
	`t_progres` FLOAT NOT NULL,
    `t_villedepart_fk` INT(11) NOT NULL, CONSTRAINT `t_villedepart_fk_v` FOREIGN KEY (`t_villedepart_fk`) REFERENCES `ville` (`v_id`) ON UPDATE CASCADE ON DELETE RESTRICT,
    `t_villearrivee_fk` INT(11) NOT NULL, CONSTRAINT `t_villearrivee_fk_v` FOREIGN KEY (`t_villearrivee_fk`) REFERENCES `ville` (`v_id`) ON UPDATE CASCADE ON DELETE RESTRICT,
	PRIMARY KEY(`t_id`)
	) ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `groupe` ( 
	`g_id` INT(11) NOT NULL AUTO_INCREMENT, 
	`g_debuttravail` TIME NOT NULL,
    `g_fintravail` TIME NOT NULL,
    `g_tunnel_fk` INT(11) DEFAULT NULL, CONSTRAINT `g_tunnel_fk_t` FOREIGN KEY (`g_tunnel_fk`) REFERENCES `tunnel` (`t_id`) ON UPDATE CASCADE ON DELETE RESTRICT,
    `g_taverne_fk` INT(11) DEFAULT NULL, CONSTRAINT `g_taverne_fk_t` FOREIGN KEY (`g_taverne_fk`) REFERENCES `taverne` (`t_id`) ON UPDATE CASCADE ON DELETE RESTRICT,
	PRIMARY KEY(`g_id`)
	) ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `nain` ( 
	`n_id` INT(11) NOT NULL AUTO_INCREMENT, 
	`n_nom` VARCHAR(255) NOT NULL,
    `n_barbe` FLOAT NOT NULL,
    `n_ville_fk` INT(11) NOT NULL, CONSTRAINT `n_ville_fk_v` FOREIGN KEY (`n_ville_fk`) REFERENCES `ville` (`v_id`) ON UPDATE CASCADE ON DELETE RESTRICT,
    `n_groupe_fk` INT(11) DEFAULT NULL, CONSTRAINT `n_groupe_fk_g` FOREIGN KEY (`n_groupe_fk`) REFERENCES `groupe` (`g_id`) ON UPDATE CASCADE ON DELETE RESTRICT,
	PRIMARY KEY(`n_id`)
	) ENGINE=InnoDB CHARSET=utf8mb4;



-- EXO REQUETE
--1
SELECT * FROM `taverne` WHERE `t_brune` = 1;
--2
SELECT * FROM `nain` WHERE `n_groupe_fk` = 2;
--3 
SELECT `g_debuttravail`, `g_fintravail`FROM `groupe` JOIN `nain` ON `g_id` = `n_groupe_fk` WHERE `n_id` = 13;
--4
SELECT * FROM `nain` 
JOIN `groupe` ON `g_id` = `n_groupe_fk`
JOIN `taverne` ON `g_taverne_fk` = `t_id`
WHERE `t_ville_fk` = 1;
--5
SELECT * FROM `taverne`
JOIN `ville` ON `v_id` = `t_ville_fk`;
--6
SELECT * FROM `nain`
WHERE `n_groupe_fk` IS NULL;
--7
SELECT * FROM `nain`
JOIN `ville` ON `v_id` = `n_ville_fk`
JOIN `taverne` ON `t_ville_fk` = `v_id`
WHERE `t_id` = 7;
--8
SELECT * FROM `tunnel`
JOIN `groupe` ON `g_tunnel_fk` = `tunnel`.`t_id`
JOIN `taverne` ON `taverne`.`t_id` = `g_taverne_fk`
WHERE `t_blonde` = 1
GROUP BY `tunnel`.`t_id`;
--9
SELECT taverne.*, COUNT(n_groupe_fk) FROM `taverne`
LEFT JOIN `groupe` ON `g_taverne_fk` = `t_id`
LEFT JOIN `nain` ON `n_groupe_fk` = `g_id`
GROUP BY t_id;
--10
SELECT taverne.*, t_chambres - COUNT(n_groupe_fk) Chambreslibres FROM `taverne`
LEFT JOIN `groupe` ON `g_taverne_fk` = `t_id`
LEFT JOIN `nain` ON `n_groupe_fk` = `g_id`
GROUP BY t_id;