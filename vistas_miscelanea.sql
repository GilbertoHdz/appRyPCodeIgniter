CREATE TABLE usuarios (
  id_usuarios SERIAL  PRIMARY KEY,
  nombre VARCHAR(45) NOT NULL,
  apellidos VARCHAR(60) NOT NULL,
  password VARCHAR(200) NOT NULL,
  username VARCHAR(200) NOT NULL,
  tipo VARCHAR(45) NOT NULL);

INSERT INTO usuarios
(nombre, apellidos, password, username, tipo)
VALUES ('Administrador', 'El que administra', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin');


CREATE VIEW apertura_detalle AS
    SELECT 
        uided.data AS Estado,
        uido.data AS Convenio,
        mc.fullname AS Diplomado,
        uidnc.data AS CtroTrabajo
    FROM
        ((((((mdl_user mu
        JOIN mdl_user_info_data uided ON (((uided.userid = mu.id)
            AND (uided.fieldid = 10))))
        JOIN mdl_user_info_data uido ON (((uido.userid = mu.id)
            AND (uido.fieldid = 20))))
        JOIN mdl_user_info_data uidnc ON (((uidnc.userid = mu.id)
            AND (uidnc.fieldid = 24))))
        JOIN mdl_grade_grades mgg ON ((mgg.userid = mu.id)))
        JOIN mdl_grade_items mgi ON ((mgi.id = mgg.itemid)))
        JOIN mdl_course mc ON ((mc.id = mgi.courseid)))
    GROUP BY mc.fullname , uido.data , uided.data , uidnc.data;

CREATE VIEW apertura_general AS
    SELECT COUNT(mgg.userid) AS Cantidad, uided.data AS Estado,
        (CASE WHEN ((mc.fullname LIKE '%Grupo A%') OR (mc.fullname LIKE '%Grupo B%'))
					THEN 'Grupo A y B 1'
            WHEN ((mc.fullname LIKE '%Grupo C%') OR (mc.fullname LIKE '%Grupo D%'))
				THEN 'Grupo C y D 2'
            WHEN ((mc.fullname LIKE '%Grupo E%') OR (mc.fullname LIKE '%Grupo F%'))
				THEN 'Grupo E y F 3'
            WHEN ((mc.fullname LIKE '%Grupo G%') OR (mc.fullname LIKE '%Grupo H%'))
				THEN 'Grupo G y H 4'
            WHEN ((mc.fullname LIKE '%Grupo M%') OR (mc.fullname LIKE '%Grupo N%'))
				THEN 'Grupo M y N 5'
            WHEN((mc.fullname LIKE '%Grupo O%') OR (mc.fullname LIKE '%Grupo P%'))
				THEN 'Grupo O y P 6'
            ELSE 'Grupo No Encontrado'
        END) AS GrupoApertura,
        uidnc.data AS CtroTrabajo
    FROM mdl_user mu
        JOIN mdl_user_info_data uided ON (uided.userid = mu.id  AND uided.fieldid = 10)
        JOIN mdl_user_info_data uidnc ON (uidnc.userid = mu.id AND uidnc.fieldid = 24)
        JOIN mdl_grade_grades mgg ON (mgg.userid = mu.id)
        JOIN mdl_grade_items mgi ON (mgi.id = mgg.itemid)
        JOIN mdl_course mc ON (mc.id = mgi.courseid)
    GROUP BY mgg.userid , GrupoApertura, Estado, CtroTrabajo;


CREATE VIEW v_alumno_avance AS
    SELECT 
        mgg.itemid AS itemid,
        mgg.userid AS userid,
        mgi.courseid AS courseid,
        (mgi.aggregationcoef * 100) AS avance,
        (ROUND(mgg.finalgrade, 2) * ROUND(mgi.aggregationcoef, 2)) AS calificacion
    FROM
        mdl_grade_grades mgg
        JOIN mdl_grade_items mgi ON (mgi.id = mgg.itemid)
        JOIN mdl_user_info_data id ON (id.userid = mgg.userid  AND id.fieldid = 1);


CREATE VIEW v_alumno_detalle AS
    SELECT DISTINCT
        mu.id AS userid,
        mu.username AS Usuario,
        idpw.data AS Contrasenia,
        idcv.data AS Convenio,
        CONCAT(mu.firstname, ' ', mu.lastname) AS NombComp,
        mu.email AS CorreoE,
        mu.phone1 AS phone1,
        mu.phone2 AS phone2,
        ide.data AS Estado,
        idcvct.data AS ClvCentroTrabajo,
        idct.data AS CentroTrabajo,
        idnvct.data AS NvlCentroTrabajo,
        (now() - to_timestamp(ulac.timeaccess)) AS DiasSinIngresar,
        (case when mu.lastaccess = '0' then 'NO' else 'SI' end) AS IngresoPlataforma,
        (case when idedpg.data = '0' then 'NO' else 'SI' end) AS EstPago,
        mg.name AS Grupo,
        mc.fullname AS Diplomado,
        (CASE
            WHEN ((mc.fullname LIKE '%Grupo A%') OR (mc.fullname LIKE '%Grupo B%'))
				THEN 'Grupo A y B 1'
            WHEN ((mc.fullname LIKE '%Grupo C%') OR (mc.fullname LIKE '%Grupo D%'))
				THEN 'Grupo C y D 2'
            WHEN ((mc.fullname LIKE '%Grupo E%') OR (mc.fullname LIKE '%Grupo F%'))
				THEN 'Grupo E y F 3'
            WHEN ((mc.fullname LIKE '%Grupo G%') OR (mc.fullname LIKE '%Grupo H%'))
				THEN 'Grupo G y H 4'
            WHEN ((mc.fullname LIKE '%Grupo M%') OR (mc.fullname LIKE '%Grupo N%'))
				THEN 'Grupo M y N 5'
            WHEN ((mc.fullname LIKE '%Grupo O%') OR (mc.fullname LIKE '%Grupo P%'))
				THEN 'Grupo O y P 6'
            ELSE 'Grupo No Encontrado'
        END) AS GrupoApertura,
        to_timestamp(mc.startdate) AS FechaApertura
    FROM mdl_user mu
        JOIN mdl_user_info_data idpw ON (idpw.userid = mu.id AND idpw.fieldid = 23)
        JOIN mdl_user_info_data idcv ON (idcv.userid = mu.id AND idcv.fieldid = 20)
        JOIN mdl_user_info_data ide ON (ide.userid = mu.id AND ide.fieldid = 10)
        JOIN mdl_user_info_data idcvct ON (idcvct.userid = mu.id AND idcvct.fieldid = 17)
        JOIN mdl_user_info_data idct ON (idct.userid = mu.id AND idct.fieldid = 18)
        JOIN mdl_user_info_data idnvct ON (idnvct.userid = mu.id AND idnvct.fieldid = 24)
        JOIN mdl_user_info_data idedpg ON (idedpg.userid = mu.id AND idedpg.fieldid = 22)
        JOIN mdl_grade_grades mgg ON (mgg.userid = mu.id)
        JOIN mdl_grade_items mgi ON (mgi.id = mgg.itemid)
        JOIN mdl_course mc ON (mc.id = mgi.courseid)
        JOIN mdl_user_lastaccess ulac ON (ulac.userid = mu.id AND ulac.courseid = mc.id)
        JOIN mdl_groups mg ON (mg.courseid = mc.id)
        JOIN mdl_groups_members mgm ON (mgm.groupid = mg.id AND mgm.userid = mu.id)
    ORDER BY mg.name;
	
	
	
CREATE VIEW v_cursos AS
    SELECT 
        SUBSTR(mdl_groups.name, 1, 7) AS grupo,
        mdl_groups.courseid AS id_curso
    FROM mdl_groups
    WHERE ((CHAR_LENGTH(SUBSTR(mdl_groups.name, 1, 7)) = 7) AND (mdl_groups.courseid NOT IN (1 , 4, 11)))
    GROUP BY mdl_groups.courseid , SUBSTR(mdl_groups.name, 1, 7)
    ORDER BY mdl_groups.courseid;


CREATE VIEW v_get_cursos AS
    SELECT SUBSTR(mdl_groups.name, 1, 7) AS grupo, mdl_groups.courseid AS id_curso
    FROM mdl_groups
    WHERE
        ((CHAR_LENGTH(SUBSTR(mdl_groups.name, 1, 7)) = 7) AND (mdl_groups.courseid NOT IN (1 , 4, 11)))
    GROUP BY SUBSTR(mdl_groups.name, 1, 7), id_curso
    ORDER BY SUBSTR(mdl_groups.name, 1, 7);
	

CREATE VIEW v_insignia_birrete AS
    SELECT mbi.userid AS userid, mb.name AS birrete, mb.courseid AS courseid
    FROM mdl_badge_issued mbi
    JOIN mdl_badge mb ON (mb.id = mbi.badgeid AND mb.name LIKE '%birrete%');



CREATE VIEW v_insignia_bronce AS
    SELECT 
        mbi.userid AS userid,
        mb.name AS bronce,
        mb.courseid AS courseid
    FROM mdl_badge_issued mbi 
    JOIN mdl_badge mb ON (mb.id = mbi.badgeid AND mb.name LIKE '%bronce%');



CREATE VIEW v_insignia_mouse AS
    SELECT mbi.userid AS userid, mb.name AS mouse, mb.courseid AS courseid
    FROM mdl_badge_issued mbi
    JOIN mdl_badge mb ON (mb.id = mbi.badgeid AND mb.name LIKE '%mouse%');



CREATE VIEW v_insignia_oro AS
    SELECT mbi.userid AS userid, mb.name AS oro, mb.courseid AS courseid
    FROM mdl_badge_issued mbi
    JOIN mdl_badge mb ON (mb.id = mbi.badgeid AND mb.name LIKE '%oro%');



CREATE VIEW v_insignia_plata AS
    SELECT mbi.userid AS userid, mb.name AS plata, mb.courseid AS courseid
    FROM mdl_badge_issued mbi 
    JOIN mdl_badge mb ON (mb.id = mbi.badgeid AND mb.name LIKE '%plata%');



CREATE VIEW v_insignia_platino AS
    SELECT 
        mbi.userid AS userid,
        mb.name AS platino,
        mb.courseid AS courseid
    FROM mdl_badge_issued mbi
    JOIN mdl_badge mb ON (mb.id = mbi.badgeid AND mb.name LIKE '%platino%');

CREATE VIEW v_total_insignias AS
    SELECT mbi.userid AS userid, mb.courseid AS courseid, COUNT(mbi.badgeid) AS total
    FROM mdl_course mc
    JOIN mdl_badge mb ON (mb.courseid = mc.id)
    JOIN mdl_badge_issued mbi ON (mbi.badgeid = mb.id)
    GROUP BY mbi.userid, courseid;

CREATE VIEW v_insignias AS
    SELECT 
        CONCAT(mu.firstname, ' ', mu.lastname) AS NomComp,
        mu.email AS Email,
        idc.data AS Correo2,
        mu.phone1 AS Tel1,
        mu.phone2 AS Tel2,
        ide.data AS Estado,
        idct.data AS CentTrab,
        idnv.data AS NivelCT,
        SUM((mgg.finalgrade * mgi.aggregationcoef)) AS CalifObt,
        mc.fullname AS Diplomado,
        to_timestamp(mc.startdate) AS FechaApertura,
        COALESCE(qtotal.total, 0) AS tTotal,
        COALESCE(qbronce.bronce, 'NO') AS Bronce,
        COALESCE(qplata.plata, 'NO') AS Plata,
        COALESCE(qoro.oro, 'NO') AS Oro,
        COALESCE(qplatino.platino, 'NO') AS Platino,
        COALESCE(qbirrete.birrete, 'NO') AS Birrete,
        COALESCE(qmouse.mouse, 'NO') AS Mouse
    FROM mdl_role mr
        JOIN mdl_role_assignments mrass ON (mrass.roleid = mr.id)
        JOIN mdl_user mu ON (mrass.userid = mu.id)
        JOIN mdl_user_info_data idc ON (idc.userid = mu.id AND idc.fieldid = 7)
        JOIN mdl_user_info_data ide ON (ide.userid = mu.id AND ide.fieldid = 10)
        JOIN mdl_user_info_data idct ON (mu.id = idct.userid AND idct.fieldid = 18)
        JOIN mdl_user_info_data idnv ON (mu.id = idnv.userid AND idnv.fieldid = 24)
        JOIN mdl_grade_grades mgg ON (mgg.userid = mu.id)
        JOIN mdl_grade_items mgi ON (mgi.id = mgg.itemid)
        JOIN mdl_course mc ON (mc.id = mgi.courseid)
        LEFT JOIN v_insignia_platino qplatino ON (qplatino.userid = mu.id  AND qplatino.courseid = mc.id)
        LEFT JOIN v_insignia_oro qoro ON (qoro.userid = mu.id AND qoro.courseid = mc.id)
        LEFT JOIN v_insignia_plata qplata ON (qplata.userid = mu.id AND qplata.courseid = mc.id)
        LEFT JOIN v_insignia_bronce qbronce ON (qbronce.userid = mu.id AND qbronce.courseid = mc.id)
        LEFT JOIN v_insignia_birrete qbirrete ON (qbirrete.userid = mu.id)
        LEFT JOIN v_insignia_mouse qmouse ON (qmouse.userid = mu.id)
        LEFT JOIN v_total_insignias qtotal ON (qtotal.userid = mu.id AND qtotal.courseid = mc.id)
    WHERE  ((mrass.roleid = 5) AND (mgi.itemtype = 'mod'))
    GROUP BY mgg.userid, NomComp, Email, Correo2, Tel1, Tel2, Estado, CentTrab, NivelCT
	,Diplomado, FechaApertura, tTotal, Bronce, Plata, Oro, Platino, Birrete, Mouse
    ORDER BY mgg.userid;



CREATE VIEW v_item_curso AS
    SELECT 
        gi.id AS itemid,
        gi.itemname AS itemname,
        gi.courseid AS id_curso
    FROM mdl_grade_items gi
    WHERE  (gi.itemtype = 'mod')
    ORDER BY gi.courseid , gi.id;

	






















