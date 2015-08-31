
/* LoadModule rewrite_module modules/mod_rewrite.so */

/* ******************************************************************** */
/* 							   INSIGNIAS								*/
/* ******************************************************************** */

CREATE VIEW v_insignia_platino AS
SELECT MBI.userid, MB.name AS platino, MB.courseid FROM mdl_badge_issued MBI 
INNER JOIN mdl_badge MB ON (MB.id = MBI.badgeid AND MB.name like '%platino%');
/* SELECT * FROM v_insignia_platino; */

CREATE VIEW v_insignia_oro AS
SELECT MBI.userid, MB.name AS oro, MB.courseid FROM mdl_badge_issued MBI 
INNER JOIN mdl_badge MB ON (MB.id = MBI.badgeid AND MB.name like '%oro%');
/* SELECT * FROM v_insignia_oro; */

CREATE VIEW v_insignia_plata AS
SELECT MBI.userid, MB.name AS plata, MB.courseid FROM mdl_badge_issued MBI 
INNER JOIN mdl_badge MB ON (MB.id = MBI.badgeid AND MB.name like '%plata%');
/* SELECT * FROM v_insignia_plata; */

CREATE VIEW v_insignia_bronce AS
SELECT MBI.userid, MB.name AS bronce, MB.courseid FROM mdl_badge_issued MBI 
INNER JOIN mdl_badge MB ON (MB.id = MBI.badgeid AND MB.name like '%bronce%');
/* SELECT * FROM v_insignia_bronce; */

CREATE VIEW v_insignia_birrete AS
SELECT MBI.userid, MB.name AS birrete, MB.courseid FROM mdl_badge_issued MBI 
INNER JOIN mdl_badge MB ON (MB.id = MBI.badgeid AND MB.name like '%birrete%');
/*SELECT * FROM v_insignia_birrete; */

CREATE VIEW v_insignia_mouse AS
SELECT MBI.userid, MB.name AS mouse, MB.courseid FROM mdl_badge_issued MBI 
INNER JOIN mdl_badge MB ON (MB.id = MBI.badgeid AND MB.name like '%mouse%');
/*SELECT * FROM v_insignia_mouse; */

CREATE VIEW v_total_insignias AS 
SELECT MBI.userid, MB.courseid, COUNT(MBI.badgeid) AS total FROM mdl_course MC 
INNER JOIN mdl_badge MB ON (MB.courseid = MC.id) 
INNER JOIN  mdl_badge_issued MBI ON (MBI.badgeid = MB.id) 
GROUP BY MBI.userid;
/*SELECT * FROM v_total_insignias; */

CREATE VIEW v_insignias AS
SELECT CONCAT(MU.firstname,' ', MU.lastname) AS NomComp, MU.email AS Email 
	, IDC.data AS Correo2, MU.phone1 AS Tel1, MU.phone2 AS Tel2, IDE.data AS Estado, IDCT.data AS CentTrab 
    , IDNV.data AS NivelCT, SUM(MGG.finalgrade *  MGI.aggregationcoef) AS CalifObt 
    , MC.fullname AS Diplomado, FROM_UNIXTIME(MC.startdate) AS FechaApertura, IFNULL(qTotal.total, 0) AS tTotal 
    , IFNULL(qBRONCE.bronce, 'NO') as Bronce, IFNULL(qPLATA.plata, 'NO') as Plata, IFNULL(qORO.oro, 'NO') as Oro 
    , IFNULL(qPLATINO.platino, 'NO') as Platino, IFNULL(qBIRRETE.birrete, 'NO') as Birrete, IFNULL(qMOUSE.mouse, 'NO') as Mouse 
FROM mdl_role  MR 
INNER JOIN mdl_role_assignments MRASS ON (MRASS.roleid = MR.id) 
INNER JOIN mdl_user MU ON (MRASS.userid = MU.id ) 
INNER JOIN mdl_user_info_data IDC ON (IDC.userid = MU.id AND IDC.fieldid = 7) 
INNER JOIN mdl_user_info_data IDE ON (IDE.userid = MU.id AND IDE.fieldid = 10) 
INNER JOIN mdl_user_info_data IDCT ON (MU.id = IDCT.userid AND IDCT.fieldid  = 18) 
INNER JOIN mdl_user_info_data IDNV ON (MU.id = IDNV.userid AND IDNV.fieldid  = 24) 
INNER JOIN mdl_grade_grades MGG ON (MGG.userid = MU.id) 
INNER JOIN mdl_grade_items MGI ON (MGI.id = MGG.itemid) 
INNER JOIN mdl_course MC ON (MC.id = MGI.courseid) 
LEFT JOIN  v_insignia_platino qPLATINO ON (qPLATINO.userid =mu.id AND qPLATINO.courseid = MC.id )
LEFT JOIN  v_insignia_oro qORO ON (qORO.userid =mu.id AND qORO.courseid = MC.id )
LEFT JOIN  v_insignia_plata qPLATA ON (qPLATA.userid =mu.id AND qPLATA.courseid = MC.id )
LEFT JOIN  v_insignia_bronce qBRONCE ON (qBRONCE.userid =mu.id AND qBRONCE.courseid = MC.id )
LEFT JOIN  v_insignia_birrete qBIRRETE ON (qBIRRETE.userid =mu.id)
LEFT JOIN  v_insignia_mouse qMOUSE ON (qMOUSE.userid =mu.id)
LEFT JOIN v_total_insignias qTotal ON (qTotal.userid =mu.id AND qTotal.courseid = MC.id)
WHERE MRASS.roleid = 5 AND MGI.itemtype = 'mod' 
GROUP BY MGG.userid ORDER BY MGG.userid;
/* SELECT * FROM v_insignias; */



/* ******************************************************************** */
/* 								APERTURA								*/
/* ******************************************************************** */

CREATE VIEW apertura_detalle AS
SELECT UIDED.data AS Estado, UIDO.data AS Convenio 
   , MC.fullname AS Diplomado, UIDNC.data AS CtroTrabajo 
 FROM mdl_user MU 
 INNER JOIN mdl_user_info_data UIDED ON (UIDED.userid = MU.id AND UIDED.fieldid = 10) 
 INNER JOIN mdl_user_info_data UIDO ON (UIDO.userid = MU.id AND UIDO.fieldid = 20) 
 INNER JOIN mdl_user_info_data UIDNC ON (UIDNC.userid = MU.id AND UIDNC.fieldid = 24) 
 INNER JOIN mdl_grade_grades MGG ON (MGG.userid = MU.id) 
 INNER JOIN mdl_grade_items MGI ON (MGI.id = MGG.itemid) 
 INNER JOIN mdl_course MC ON (MC.id = MGI.courseid)
GROUP BY MC.fullname, UIDO.data, UIDED.data, UIDNC.data;

/* SELECT * FROM apertura_detalle; */

CREATE VIEW apertura_general AS
SELECT COUNT(MGG.userid) Cantidad, UIDED.data AS Estado 
, CASE WHEN (MC.fullname LIKE '%Grupo A%' || MC.fullname LIKE '%Grupo B%') THEN 'Grupo A y B 1' 
       WHEN (MC.fullname LIKE '%Grupo C%' || MC.fullname LIKE '%Grupo D%') THEN 'Grupo C y D 2' 
	   WHEN (MC.fullname LIKE '%Grupo E%' || MC.fullname LIKE '%Grupo F%') THEN 'Grupo E y F 3' 
	   WHEN (MC.fullname LIKE '%Grupo G%' || MC.fullname LIKE '%Grupo H%') THEN 'Grupo G y H 4' 
	   WHEN (MC.fullname LIKE '%Grupo M%' || MC.fullname LIKE '%Grupo N%') THEN 'Grupo M y N 5' 
	   WHEN (MC.fullname LIKE '%Grupo O%' || MC.fullname LIKE '%Grupo P%') THEN 'Grupo O y P 6' 
  ELSE 'Grupo No Encontrado' END AS GrupoApertura
  , UIDNC.data AS CtroTrabajo 
FROM mdl_user MU 
INNER JOIN mdl_user_info_data UIDED ON (UIDED.userid = MU.id AND UIDED.fieldid = 10) 
INNER JOIN mdl_user_info_data UIDNC ON (UIDNC.userid = MU.id AND UIDNC.fieldid = 24) 
INNER JOIN mdl_grade_grades MGG ON (MGG.userid = MU.id) 
INNER JOIN mdl_grade_items MGI ON (MGI.id = MGG.itemid) 
INNER JOIN mdl_course MC ON (MC.id = MGI.courseid) 
GROUP BY MGG.userid, GrupoApertura;

/* SELECT * FROM apertura_general; */



/* ******************************************************************** */
/* 							ITEMS COMBO LIST							*/
/* ******************************************************************** */


CREATE VIEW v_cursos AS
SELECT  SUBSTRING(name,1,7) AS grupo, courseid AS id_curso
FROM mdl_groups
WHERE CHAR_LENGTH(SUBSTRING(name, 1, 7)) = 7  AND NOT courseid IN (1,4,11)
GROUP BY courseid , SUBSTRING(name,1,7)
ORDER BY courseid;

CREATE VIEW v_item_curso AS
SELECT GI.id AS itemid, GI.itemname, GI.courseid AS id_curso
FROM mdl_grade_items GI 
WHERE GI.itemtype = 'mod'
ORDER BY GI.courseid, GI.id;



/* ******************************************************************** */
/* 								PROMEDIOS 								*/
/* ******************************************************************** */

CREATE VIEW v_alumno_detalle AS
SELECT DISTINCT MU.id userid, MU.username AS Usuario, IDPW.data AS Contrasenia, IDCV.data AS Convenio, CONCAT(MU.firstname,' ', MU.lastname) AS NombComp 
	, MU.email AS CorreoE, MU.phone1, MU.phone2, IDE.data AS Estado, IDCVCT.data AS ClvCentroTrabajo, IDCT.data AS CentroTrabajo 
    , IDNVCT.data AS NvlCentroTrabajo, DATEDIFF(now(),FROM_UNIXTIME(ULAC.timeaccess)) as DiasSinIngresar 
    , IF(MU.lastaccess=0,'NO','SI') as IngresoPlataforma, IF(IDEDPG.data=0,'NO','SI') AS EstPago, MG.name AS Grupo 
    , MC.fullname AS Diplomado, 
	CASE WHEN (MC.fullname LIKE '%Grupo A%' || MC.fullname LIKE '%Grupo B%') THEN 'Grupo A y B 1' 
	 WHEN (MC.fullname LIKE '%Grupo C%' || MC.fullname LIKE '%Grupo D%') THEN 'Grupo C y D 2' 
	 WHEN (MC.fullname LIKE '%Grupo E%' || MC.fullname LIKE '%Grupo F%') THEN 'Grupo E y F 3' 
	 WHEN (MC.fullname LIKE '%Grupo G%' || MC.fullname LIKE '%Grupo H%') THEN 'Grupo G y H 4' 
	 WHEN (MC.fullname LIKE '%Grupo M%' || MC.fullname LIKE '%Grupo N%') THEN 'Grupo M y N 5' 
	 WHEN (MC.fullname LIKE '%Grupo O%' || MC.fullname LIKE '%Grupo P%') THEN 'Grupo O y P 6' 
	 ELSE 'Grupo No Encontrado' END AS GrupoApertura, FROM_UNIXTIME(MC.startdate) AS FechaApertura
FROM mdl_user MU
INNER JOIN mdl_user_info_data IDPW ON (IDPW.userid = MU.id AND IDPW.fieldid  = 23) 
INNER JOIN mdl_user_info_data IDCV ON (IDCV.userid = MU.id AND IDCV.fieldid = 20) 
INNER JOIN mdl_user_info_data IDE ON (IDE.userid = MU.id AND IDE.fieldid = 10) 
INNER JOIN mdl_user_info_data IDCVCT ON (IDCVCT.userid = MU.id AND IDCVCT.fieldid  = 17) 
INNER JOIN mdl_user_info_data IDCT ON (IDCT.userid = MU.id AND IDCT.fieldid  = 18) 
INNER JOIN mdl_user_info_data IDNVCT ON (IDNVCT.userid = MU.id AND IDNVCT.fieldid  = 24) 
INNER JOIN mdl_user_info_data IDEDPG ON (IDEDPG.userid = MU.id AND IDEDPG.fieldid  = 22) 
INNER JOIN mdl_grade_grades MGG ON (MGG.userid = MU.id) 
INNER JOIN mdl_grade_items MGI ON (MGI.id = MGG.itemid) 
INNER JOIN mdl_course MC ON (MC.id = MGI.courseid) 
INNER JOIN mdl_user_lastaccess ULAC ON (ULAC.userid = MU.id AND ULAC.courseid = MC.id) 
INNER JOIN mdl_groups MG ON (MG.courseid = MC.id) 
INNER JOIN mdl_groups_members MGM ON (MGM.groupid = MG.id AND MGM.userid = MU.id)
ORDER BY MG.name;


CREATE VIEW v_alumno_avance AS
SELECT MGG.itemid, MGG.userid, MGI.courseid, (MGI.aggregationcoef * 100) avance, 
(ROUND(MGG.finalgrade,2) * ROUND(MGI.aggregationcoef,2)) AS calificacion 
FROM mdl_grade_grades MGG 
INNER JOIN mdl_grade_items MGI ON (MGI.id = MGG.itemid) 
INNER JOIN mdl_user_info_data ID ON (ID.userid = MGG.userid AND ID.fieldid = 1);




/* ******************************************************************** */
/* 							AMINISTRADOR 								*/
/* ******************************************************************** */


CREATE TABLE `diplomado`.`usuarios` (
  `id_usuarios` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `apellidos` VARCHAR(60) NOT NULL COMMENT '',
  `password` VARCHAR(200) NOT NULL COMMENT '',
  `username` VARCHAR(200) NOT NULL COMMENT '',
  `tipo` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id_usuarios`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;

INSERT INTO `diplomado`.`usuarios`
(`id_usuarios`, `nombre`, `apellidos`, `password`, `username`, `tipo`)
VALUES (0, "Administrador", "El que administra", "21232f297a57a5a743894a0e4a801fc3", "admin", "admin");


/*
USUARIO: admin
PASSWORD: admin
 */
 









