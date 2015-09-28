Select mu.username,mc.id as curso,
	no_matriculacion.cantidad_matriculaciones,
	(CASE WHEN mue.status='0' THEN 'NO' ELSE'SI' END) as suspendido,
    (CASE WHEN mid3.data = '1' THEN 'SI' ELSE 'NO' END) as estadopago,
	(CASE WHEN mid.data='BAJA DEFINITIVA' THEN 'SI' ELSE 'NO' END) as bajaDef,
	mid2.data as convenio,mid4.data as entidadct,
	UPPER(CONCAT(firstname,' ',lastname))as nombre_completo,
	firstname,lastname,
	email,phone1,phone2,
	SUBSTRING(mc.fullname,1,position('(' in fullname)-1) as Diplomado,
	mid6.data as matricula, mid7.data as folio,
	(CASE WHEN mid8.data = '1' THEN 'SI' ELSE 'NO' END) as impreso,
	mid9.data as clavect,
	case when mc.id=9 then 'Curso A'
		when mc.id=10 then 'Curso B'
		when mc.id=15 then 'Curso C'
		when mc.id=14 then 'Curso D'
		when mc.id=16 then 'Curso E'
		when mc.id=17 then 'Curso F'
		when mc.id=19 then 'Curso G'
		when mc.id=18 then 'Curso H'
		when mc.id=21 then 'Curso M'
		when mc.id=22 then 'Curso N'
		when mc.id=25 then 'Curso P'
		when mc.id=24 then 'Curso Q'
		when mc.id=26 then 'Curso R'
		when mc.id=27 then 'Curso S'
		else '' end as cursoactual,
	trunc((mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+mgg5.cal_ponderada+mgg6.cal_ponderada
	+mgg72.cal_ponderada),2) as tema1,
	trunc((+mgg8.cal_ponderada+mgg9.cal_ponderada+mgg10.cal_ponderada+mgg11.cal_ponderada+mgg12.cal_ponderada
	+mgg13.cal_ponderada+mgg142.cal_ponderada),2) as tema2,
	trunc((mgg15.cal_ponderada+mgg16.cal_ponderada+mgg17.cal_ponderada+mgg18.cal_ponderada
	+mgg19.cal_ponderada+mgg20.cal_ponderada+mgg212.cal_ponderada),2) as tema3,
	trunc(((mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+mgg5.cal_ponderada+mgg6.cal_ponderada
	+mgg72.cal_ponderada+mgg8.cal_ponderada+mgg9.cal_ponderada+mgg10.cal_ponderada+mgg11.cal_ponderada+mgg12.cal_ponderada
	+mgg13.cal_ponderada+mgg142.cal_ponderada+mgg15.cal_ponderada+mgg16.cal_ponderada+mgg17.cal_ponderada+mgg18.cal_ponderada
	+mgg19.cal_ponderada+mgg20.cal_ponderada+mgg212.cal_ponderada) ),2) as Final,
	(CASE WHEN remedial.id_usuario is null THEN 'NO' ELSE 'SI' END) as pertenece_remedial,
	trunc(rem.calificacion,2) as calificacion_curso_remedial,
	mid10.data as email_alt,
	mid11.data as nombrect, mid12.data as nivelct,
	mid13.data as munct, mid14.data as localct
	FROM mdl_user mu
	INNER JOIN mdl_groups_members mgm on mgm.userid=mu.id
	INNER JOIN mdl_groups mg on mg.id=mgm.groupid
	INNER JOIN mdl_course mc ON mc.id=mg.courseid
	INNER JOIN mdl_user_enrolments mue on mue.userid=mu.id
	INNER JOIN mdl_enrol men on men.courseid=mg.courseid and men.id=mue.enrolid
	inner join (
		select count(mu.id) as cantidad_matriculaciones,mu.id as id_usuario
		from mdl_user mu
		INNER JOIN mdl_user_enrolments mue on mue.userid=mu.id
		inner join mdl_enrol me on me.id=mue.enrolid and  not me.courseid in (28,29)
		where username like'%unete1%' 
		group by mu.id
	)no_matriculacion on no_matriculacion.id_usuario=mu.id
	LEFT JOIN mdl_user_lastaccess mul ON mul.userid=mgm.userid AND mul.courseid=mg.courseid
	LEFT JOIN mdl_user_info_data mid on mid.userid=mu.id AND mid.fieldid=1
	LEFT JOIN mdl_user_info_data mid2 on mid2.userid=mu.id AND mid2.fieldid=20
	LEFT JOIN mdl_user_info_data mid3 on mid3.userid=mu.id AND mid3.fieldid=22
	LEFT JOIN mdl_user_info_data mid4 on mid4.userid=mu.id AND mid4.fieldid=27
	LEFT JOIN mdl_user_info_data mid5 on mid5.userid=mu.id AND mid5.fieldid=10
	LEFT JOIN mdl_user_info_data mid6 on mid6.userid=mu.id AND mid6.fieldid=8
	LEFT JOIN mdl_user_info_data mid7 on mid7.userid=mu.id AND mid7.fieldid=43
	LEFT JOIN mdl_user_info_data mid8 on mid8.userid=mu.id AND mid8.fieldid=44
	LEFT JOIN mdl_user_info_data mid9 on mid9.userid=mu.id AND mid9.fieldid=17
	LEFT JOIN mdl_user_info_data mid10 on mid10.userid=mu.id AND mid10.fieldid=7
	LEFT JOIN mdl_user_info_data mid11 on mid11.userid=mu.id AND mid11.fieldid=18
	LEFT JOIN mdl_user_info_data mid12 on mid12.userid=mu.id AND mid12.fieldid=24
	LEFT JOIN mdl_user_info_data mid13 on mid13.userid=mu.id AND mid13.fieldid=28
	LEFT JOIN mdl_user_info_data mid14 on mid14.userid=mu.id AND mid14.fieldid=30
	LEFT JOIN (
		select mue.userid as id_usuario from mdl_user_enrolments mue
		inner join mdl_enrol me on me.id=mue.enrolid
		where courseid in (28,29) order by mue.userid
	)remedial on remedial.id_usuario=mu.id
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (149,164,225,210,311,334,512,490,538,560)  
	) mgg1 on mgg1.userid=mu.id AND mgg1.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade, COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (150,165,226,211,312,335,513,491,539,561) 
	) mgg2 on mgg2.userid=mu.id AND mgg2.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (151,166,227,212,313,336,514,492,540,562) 
	) mgg3 on mgg3.userid=mu.id AND mgg3.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (152,167,228,213,314,337,515,493,541,563) 
	) mgg4 on mgg4.userid=mu.id AND mgg4.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (153,168,229,214,315,338,516,494,542,564) 
	) mgg5 on mgg5.userid=mu.id AND mgg5.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (154,169,230,215,316,339,517,495,543,565) 
	) mgg6 on mgg6.userid=mu.id AND mgg6.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.11) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (155,170,231,216,317,340,518,496,544,566) 
	) mgg72 on mgg72.userid=mu.id AND mgg72.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (156,171,232,488,318,341,519,497,545,567) 
	) mgg8 on mgg8.userid=mu.id AND mgg8.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (157,172,233,218,319,342,520,498,546,568) 
	) mgg9 on mgg9.userid=mu.id AND mgg9.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (158,173,235,219,321,343,522,499,547,569) 
	) mgg10 on mgg10.userid=mu.id AND mgg10.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (159,174,236,220,322,344,523,500,548,570) 
	) mgg11 on mgg11.userid=mu.id AND mgg11.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (160,175,237,221,323,345,524,501,549,571) 
	) mgg12 on mgg12.userid=mu.id AND mgg12.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (161,266,238,222,324,346,525,502,550,572)
	) mgg13 on mgg13.userid=mu.id AND mgg13.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.11) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (162,177,272,280,325,347,526,503,551,573) 
	) mgg142 on mgg142.userid=mu.id AND mgg142.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (258,265,273,282,326,348,527,504,552,574) 
	) mgg15 on mgg15.userid=mu.id AND mgg15.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (259,270,274,283,327,349,528,505,553,575) 
	) mgg16 on mgg16.userid=mu.id AND mgg16.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (261,268,275,284,328,350,529,506,554,576) 
	) mgg17 on mgg17.userid=mu.id AND mgg17.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (263,176,277,286,329,351,530,507,555,577) 
	) mgg18 on mgg18.userid=mu.id AND mgg18.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (262,269,276,285,330,353,531,508,556,578) 
	) mgg19 on mgg19.userid=mu.id AND mgg19.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.035) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (264,271,278,287,331,352,532,509,557,579) 
	) mgg20 on mgg20.userid=mu.id AND mgg20.courseid=mg.courseid
	LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,COALESCE(finalgrade,0,finalgrade*.15) as cal_ponderada
			   from mdl_grade_grades mgg
			   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
			   where itemid in (260,267,279,281,332,354,533,510,558,580) 
	)  mgg212 on mgg212.userid=mu.id AND mgg212.courseid=mg.courseid
	LEFT JOIN (select mu.id,me.courseid,finalgrade as calificacion
           from mdl_user mu
		   inner join mdl_user_enrolments mue on mue.userid=mu.id
		   inner join mdl_enrol me on me.id=mue.enrolid and me.courseid in (28,29)
		   left join mdl_grade_grades mgg on mgg.userid=mu.id and itemid in (593,594)
           where mu.username like '%unete1%'
	) rem on rem.id=mu.id 
	where username like '%unete1%'
	and mg.courseid in(16,17,18,19,21,22,24,25,26,27) and not mg.id=229
	order by cursoactual,matricula