--1
SELECT `m_contenu` FROM `message` JOIN `user` ON `m_id` = `u_id` LIMIT 10;
--2
SELECT `u_prenom`,`u_nom`,`u_date_naissance`  FROM `user` ORDER BY `u_date_naissance`;
--3
SELECT `u_nom`, `u_date_inscription` FROM `user` ORDER BY `u_date_inscription` DESC LIMIT 5;
--4
SELECT `u_nom`,`m_contenu`, `m_date` FROM `message` JOIN `user` ON `m_auteur_fk` = `u_id` JOIN `rang` ON `u_rang_fk` = `r_id` ORDER BY `m_date` DESC LIMIT 20;
--5
SELECT `m_id`, `u_date_naissance` FROM `message` JOIN `user` ON `m_auteur_fk` = `u_id` JOIN `rang` ON `u_rang_fk` = `r_id` WHERE `r_id`= 2 AND `u_date_naissance` < '2000-01-01' ORDER BY `m_date` DESC LIMIT 5;
--6
SELECT `m_contenu`, `u_login`, `m_conversation_fk` FROM `message` JOIN `user` ON `m_auteur_fk` = `u_id` WHERE `u_date_naissance` BETWEEN '1988-01-01' AND '2000-01-01' ORDER BY `m_date` DESC LIMIT 10;
--7
SELECT `c_id`, `m_contenu`, `m_date`, `u_prenom`, `u_nom` FROM `conversation` JOIN `message` ON `c_id` = `m_conversation_fk` JOIN `user` ON `m_auteur_fk` = `u_id`;
--8
SELECT `m_conversation_fk` FROM `message` LEFT JOIN `user` ON `m_auteur_fk` = `u_id` JOIN `conversation` ON `m_conversation_fk` = `c_id` WHERE `m_date` BETWEEN '2010-12-31' AND '2016-01-01' AND `m_auteur_fk` = 10 GROUP BY `m_conversation_fk`;
--9
SELECT `m_auteur_fk`, `u_login` 
FROM `user` 
JOIN `message` ON `u_id` = `m_auteur_fk` 
JOIN `conversation` ON `c_id` = `m_conversation_fk`
GROUP BY `m_auteur_fk`
ORDER BY `u_login`;
--10
SELECT `m_auteur_fk`,`m_conversation_fk`,COUNT(DISTINCT `m_id`) 
FROM `user` 
JOIN `message` ON `m_auteur_fk` = `u_id` 
JOIN `conversation` ON `c_id` = `m_conversation_fk`
GROUP BY `c_id`,`u_id`
ORDER BY `m_auteur_fk`;
--11
SELECT `m_id`, `m_contenu`, `m_date`, `m_auteur_fk`, `m_conversation_fk`, `c_id`, `c_date`, `c_termine`
FROM `message`
JOIN `conversation` ON `c_id` = `m_conversation_fk`
WHERE `m_date` < `c_date`
ORDER BY `m_conversation_fk`;
--12
SELECT `u_login`, `u_prenom`, `u_nom`
FROM `user`
LEFT JOIN `message` ON `m_auteur_fk` = `u_id` 
JOIN `conversation` ON `c_id` = `m_conversation_fk`
WHERE `m_auteur_fk` IS NULL
AND `c_termine` = 0;
--13
SELECT `m_id`, `m_contenu`, `m_date`, `m_auteur_fk`, `m_conversation_fk`, `u_id`, `u_prenom`, `u_nom`, `u_date_naissance`, `u_date_inscription`, `u_rang_fk`, `r_id`, `r_libelle`, `c_id`, `c_date`, `c_termine`
FROM `message`
JOIN `user` ON `m_auteur_fk` = `u_id`
JOIN `rang` ON `r_id` = `u_rang_fk`
JOIN `conversation` ON `c_id` = `m_conversation_fk`
WHERE `r_id` = 2
AND `u_date_inscription` BETWEEN '2010-01-01' AND '2010-12-30'
AND `c_termine` = 0;

--14
SELECT `m_id`, `m_contenu`, `m_date`, `m_auteur_fk`, `m_conversation_fk`, `u_id`, `u_login`, `u_prenom`, `u_nom`, `u_date_naissance`, `u_date_inscription`, `u_rang_fk`, `r_id`, `r_libelle`
FROM `message`
JOIN `user` ON `m_auteur_fk` = `u_id`
JOIN `rang` ON `r_id` = `u_rang_fk`
WHERE `r_libelle` = "none"
AND `u_date_naissance` > '2000-07-13'
AND `m_contenu` LIKE '%o%_%o%_%o%'
ORDER BY RAND()
LIMIT 5;

--15 ERREUR
SELECT `m_id`, `m_contenu`, `m_date`, `m_auteur_fk`, `m_conversation_fk`
FROM `message`
LEFT JOIN `user` ON `u_id` = `m_auteur_fk`
JOIN `conversation` ON `c_id` = `m_conversation_fk`
WHERE `m_auteur_fk` IS NULL
HAVING MAX(m_date) ;