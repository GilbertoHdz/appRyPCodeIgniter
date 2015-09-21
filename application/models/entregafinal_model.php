<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entregafinal_model extends CI_Model {

	public function getEntregaFinal()
	{
		$query = "select if(isnull(mid41.data),'NO','SI') as aplica_entrega, mid.data as estadoPlataforma,IF(mid3.data=1,'SI','NO') as CONFIRMACION_INFORMACION,
					 no_matriculacion.cantidad_matriculaciones,mu.username,
					mid2.data as CONTRASENIA,if(mue.status=0,'NO','SI') as suspendido,
					mid4.data as origen_inscripcion,
					mu.id,concat(mu.firstname,' ', mu.lastname)as nombre_completo,
					email,firstname as nombres, lastnamephonetic,middlename,
					phone1 as telefono_particular,phone2 as telefono_movil,
					DATEDIFF(now(),FROM_UNIXTIME(timeaccess)) as Dias_Sin_Ingresar_Curso,
					mid5.data as curp,mid6.data as genero,left(mid7.data,1)as estado_civil,
					mid8.data as estado_beca,mid9.data as estado_dom,mid10.data as muni_del, 
					mid11.data as colonia,mid12.data as poblacion, mid13.data as calle_num,
					mid14.data as cp, mid15.data as correo2,mid16.data as tipo_becario,mid17.data as clavect,
					IF(mu.lastaccess=0,'NO','SI') as ingreso_a_SITIO,mc.id as id_curso,
					case
					when mc.id=9 then 'Curso A'
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
					else ''
					end as curso,
					mg.name as grupo,
					mgg1.cal_ponderada as Actividad1_Razonamiento,mgg2.cal_ponderada as Actividad1_Reforzamiento,
					mgg3.cal_ponderada as Actividad2_Razonamiento,mgg4.cal_ponderada as Actividad2_Reforzamiento,
					mgg5.cal_ponderada as Actividad3_Razonamiento,mgg6.cal_ponderada as Actividad3_Reforzamiento,
					if(mgg7.status='submitted','ENTREGADO','sin entregar') as Proyecto_integrador1,
					mgg72.cal_ponderada as Calificacion_producto1,
					mgg8.cal_ponderada as Actividad4_Razonamiento,mgg9.cal_ponderada as Actividad4_Reforzamiento,
					mgg10.cal_ponderada as Actividad5_Razonamiento,mgg11.cal_ponderada as Actividad5_Reforzamiento,
					mgg12.finalgrade as Actividad6_Razonamiento,mgg13.finalgrade as Actividad6_Reforzamiento,
					if(mgg14.status='submitted','ENTREGADO','sin entregar') as Proyecto_integrador2,
					mgg142.finalgrade as Calificacion_producto2,
					mgg15.finalgrade as Actividad7_Razonamiento,mgg16.finalgrade as Actividad7_Reforzamiento,
					mgg17.finalgrade as Actividad8_Razonamiento,mgg18.finalgrade as Actividad8_Reforzamiento,
					mgg19.cal_ponderada as Actividad9_Razonamiento,mgg20.cal_ponderada as Actividad9_Reforzamiento,
					if(mgg21.status='submitted','ENTREGADO','sin entregar') as Proyecto_integrador3,
					mgg212.finalgrade as Calificacion_producto3,
					case 
					when mg.courseid in(9,10,14,15) then (mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+mgg5.cal_ponderada+mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+mgg9.cal_ponderada+mgg10.cal_ponderada+mgg11.cal_ponderada+mgg12.cal_ponderada+mgg13.cal_ponderada+mgg142.cal_ponderada+mgg15.cal_ponderada+mgg16.cal_ponderada+mgg17.cal_ponderada+mgg18.cal_ponderada+mgg19.cal_ponderada+mgg20.cal_ponderada+mgg212.cal_ponderada)
					when mg.courseid in(16,17) then (mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+mgg5.cal_ponderada
					+mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+mgg9.cal_ponderada+mgg10.cal_ponderada
					+mgg11.cal_ponderada+mgg12.cal_ponderada+mgg13.cal_ponderada+mgg142.cal_ponderada
					+mgg15.cal_ponderada+mgg16.cal_ponderada+mgg17.cal_ponderada+mgg18.cal_ponderada)
					when mg.courseid in(19,18) then (mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+mgg5.cal_ponderada+
					mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+mgg9.cal_ponderada+mgg10.cal_ponderada+
					mgg11.cal_ponderada+mgg12.cal_ponderada+mgg13.cal_ponderada)
					when mg.courseid in(21,22) then (mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+
					mgg5.cal_ponderada+mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+
					mgg9.cal_ponderada+mgg10.cal_ponderada+mgg11.cal_ponderada)
					when mg.courseid in(24,25) then (mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada)
					when mg.courseid in(26,27) then (mgg1.cal_ponderada+mgg2.cal_ponderada)
					else 0
					end as Calificacion_Actual,
					case 
					when mg.courseid in(9,10,14,15) then (100-(mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+mgg5.cal_ponderada+mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+mgg9.cal_ponderada+mgg10.cal_ponderada+mgg11.cal_ponderada+mgg12.cal_ponderada+mgg13.cal_ponderada+mgg142.cal_ponderada+mgg15.cal_ponderada+mgg16.cal_ponderada+mgg17.cal_ponderada+mgg18.cal_ponderada+mgg19.cal_ponderada+mgg20.cal_ponderada+mgg212.cal_ponderada))
					when mg.courseid in(16,17) then (78-(mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+mgg5.cal_ponderada
					+mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+mgg9.cal_ponderada+mgg10.cal_ponderada
					+mgg11.cal_ponderada+mgg12.cal_ponderada+mgg13.cal_ponderada+mgg142.cal_ponderada
					+mgg15.cal_ponderada+mgg16.cal_ponderada+mgg17.cal_ponderada+mgg18.cal_ponderada))
					when mg.courseid in(19,18) then (53-(mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+mgg5.cal_ponderada+
					mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+mgg9.cal_ponderada+mgg10.cal_ponderada+
					mgg11.cal_ponderada+mgg12.cal_ponderada+mgg13.cal_ponderada))
					when mg.courseid in(21,22) then (46-(mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+
					mgg5.cal_ponderada+mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+
					mgg9.cal_ponderada+mgg10.cal_ponderada+mgg11.cal_ponderada))
					when mg.courseid in(24,25) then (14-(mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada))
					when mg.courseid in(26,27) then (7-(mgg1.cal_ponderada+mgg2.cal_ponderada))
					else 0
					end as Calificacion_No_Recuperable,
					case 
					when mg.courseid in(9,10,14,15) then (100-(100-(mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+mgg5.cal_ponderada+mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+mgg9.cal_ponderada+mgg10.cal_ponderada+mgg11.cal_ponderada+mgg12.cal_ponderada+mgg13.cal_ponderada+mgg142.cal_ponderada+mgg15.cal_ponderada+mgg16.cal_ponderada+mgg17.cal_ponderada+mgg18.cal_ponderada+mgg19.cal_ponderada+mgg20.cal_ponderada+mgg212.cal_ponderada)))
					when mg.courseid in(16,17) then (100-(78-(mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+mgg5.cal_ponderada+mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+mgg9.cal_ponderada+mgg10.cal_ponderada
					+mgg11.cal_ponderada+mgg12.cal_ponderada+mgg13.cal_ponderada+mgg142.cal_ponderada
					+mgg15.cal_ponderada+mgg16.cal_ponderada+mgg17.cal_ponderada+mgg18.cal_ponderada)))
					when mg.courseid in(19,18) then (100-(53-(mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+mgg5.cal_ponderada+mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+mgg9.cal_ponderada+mgg10.cal_ponderada+
					mgg11.cal_ponderada+mgg12.cal_ponderada+mgg13.cal_ponderada)))
					when mg.courseid in(21,22) then (100-(46-(mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada+
					mgg5.cal_ponderada+mgg6.cal_ponderada+mgg72.cal_ponderada+mgg8.cal_ponderada+
					mgg9.cal_ponderada+mgg10.cal_ponderada+mgg11.cal_ponderada)))
					when mg.courseid in(24,25) then (100-(14-(mgg1.cal_ponderada+mgg2.cal_ponderada+mgg3.cal_ponderada+mgg4.cal_ponderada)))
					when mg.courseid in(26,27) then (100-(7-(mgg1.cal_ponderada+mgg2.cal_ponderada)))
					else 0
					end as Calificacion_Alcanzable
					from mdl_user mu
					INNER JOIN mdl_groups_members mgm on mgm.userid=mu.id
					INNER JOIN mdl_groups mg on mg.id=mgm.groupid
					INNER JOIN mdl_course mc ON mc.id=mg.courseid
					INNER JOIN mdl_user_enrolments mue on mue.userid=mu.id
					inner join mdl_enrol me on me.id=mue.enrolid
					INNER JOIN mdl_enrol men on men.courseid=mg.courseid and men.id=mue.enrolid
					inner join (
					select count(mu.id) as cantidad_matriculaciones,mu.id as id_usuario
					from mdl_user mu
					INNER JOIN mdl_user_enrolments mue on mue.userid=mu.id
					where username like'%unete1%'
					group by mu.id
					)no_matriculacion on no_matriculacion.id_usuario=mu.id
					LEFT JOIN mdl_user_lastaccess mul ON mul.userid=mgm.userid AND mul.courseid=mg.courseid
					LEFT JOIN mdl_user_info_data mid on mid.userid=mu.id AND mid.fieldid=1 
					LEFT JOIN mdl_user_info_data mid2 on mid2.userid=mu.id AND mid2.fieldid=23
					LEFT JOIN mdl_user_info_data mid3 on mid3.userid=mu.id AND mid3.fieldid=36
					LEFT JOIN mdl_user_info_data mid4 on mid4.userid=mu.id AND mid4.fieldid=20
					LEFT JOIN mdl_user_info_data mid5 on mid5.userid=mu.id AND mid5.fieldid=3
					LEFT JOIN mdl_user_info_data mid6 on mid6.userid=mu.id AND mid6.fieldid=5
					LEFT JOIN mdl_user_info_data mid7 on mid7.userid=mu.id AND mid7.fieldid=6
					LEFT JOIN mdl_user_info_data mid8 on mid8.userid=mu.id AND mid8.fieldid=27
					LEFT JOIN mdl_user_info_data mid9 on mid9.userid=mu.id AND mid9.fieldid=10
					LEFT JOIN mdl_user_info_data mid10 on mid10.userid=mu.id AND mid10.fieldid=11
					LEFT JOIN mdl_user_info_data mid11 on mid11.userid=mu.id AND mid11.fieldid=12
					LEFT JOIN mdl_user_info_data mid12 on mid12.userid=mu.id AND mid12.fieldid=13
					LEFT JOIN mdl_user_info_data mid13 on mid13.userid=mu.id AND mid13.fieldid=14
					LEFT JOIN mdl_user_info_data mid14 on mid14.userid=mu.id AND mid14.fieldid=15
					LEFT JOIN mdl_user_info_data mid15 on mid15.userid=mu.id AND mid15.fieldid=7
					LEFT JOIN mdl_user_info_data mid16 on mid16.userid=mu.id AND mid16.fieldid=16
					LEFT JOIN mdl_user_info_data mid17 on mid17.userid=mu.id AND mid17.fieldid=17
					LEFT JOIN mdl_user_info_data mid41 on mid41.userid=mu.id AND mid41.fieldid=41
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (85,87,112,119,149,164,225,210,311,334,512,490,538,560) 
					) mgg1 on mgg1.userid=mu.id AND mgg1.courseid=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (86,88,113,120,150,165,226,211,312,335,513,491,539,561)
					) mgg2 on mgg2.userid=mu.id AND mgg2.courseid=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (92,90,121,114,151,166,227,212,313,336,514,492,540,562) 
					) mgg3 on mgg3.userid=mu.id AND mgg3.courseid=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (91,89,115,122,152,167,228,213,314,337,515,493,541,563)
					) mgg4 on mgg4.userid=mu.id AND mgg4.courseid=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (95,93,116,123,153,168,229,214,315,338,516,494,542,564)
					) mgg5 on mgg5.userid=mu.id AND mgg5.courseid=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (96,94,117,124,154,169,230,215,316,339,517,495,543,565) 
					) mgg6 on mgg6.userid=mu.id AND mgg6.courseid=mg.courseid
					LEFT JOIN (select course,mas.* 
								from mdl_assign_submission mas
								inner join mdl_assign  ma on ma.id=mas.assignment
								where assignment in(44,43,45,46,49,51,56,55,70,73,98,95,101,104)
					) mgg7 ON mgg7.userid=mu.id AND mgg7.course=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.11) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (126,125,136,135,155,170,231,216,317,340,518,496,544,566)
					) mgg72 on mgg72.userid=mu.id AND mgg72.courseid=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (127,129,144,146,156,171,232,488,318,341,519,497,545,567)
					) mgg8 on mgg8.userid=mu.id AND mgg8.courseid=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (128,130,147,145,157,172,233,218,319,342,520,498,546,568)
					) mgg9 on mgg9.userid=mu.id AND mgg9.courseid=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (134,132,179,181,158,173,235,219,321,343,522,499,547,569)
					) mgg10 on mgg10.userid=mu.id AND mgg10.courseid=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade is null,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (133,131,180,182,159,174,236,220,322,344,523,500,548,570)
					) mgg11 on mgg11.userid=mu.id AND mgg11.courseid=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (137,139,193,195,160,175,237,221,323,345,524,501,549,571)
					) mgg12 on mgg12.userid=mu.id AND mgg12.courseid=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (138,140,194,196,161,266,238,222,324,346,525,502,550,572)
					) mgg13 on mgg13.userid=mu.id AND mgg13.courseid=mg.courseid
					LEFT JOIN (select course,mas.* 
								from mdl_assign_submission mas
								inner join mdl_assign  ma on ma.id=mas.assignment
								where assignment in(47,48,58,57,50,52,63,65,71,74,99,96,102,105)
					) mgg14 ON mgg14.userid=mu.id AND mgg14.course=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.11) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (142,143,240,239,162,177,272,280,325,347,526,503,551,573)
					)  mgg142 on mgg142.userid=mu.id AND mgg142.courseid=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (189,191,243,245,258,265,273,282,326,348,527,504,552,574)
					) mgg15 on mgg15.userid=mu.id AND mgg15.courseid=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (190,192,244,246,259,270,274,283,327,349,528,505,553,575)
					) mgg16 on mgg16.userid=mu.id AND mgg16.courseid=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (203,197,248,250,261,268,275,284,328,350,529,506,554,576)
					) mgg17 on mgg17.userid=mu.id AND mgg17.courseid=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (204,198,249,255,263,176,277,286,329,351,530,507,555,577)
					) mgg18 on mgg18.userid=mu.id AND mgg18.courseid=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (205,199,252,256,262,269,276,285,330,353,531,508,556,578)
					) mgg19 on mgg19.userid=mu.id AND mgg19.courseid=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.035) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (206,200,253,251,264,271,278,287,331,352,532,509,557,579)
					) mgg20 on mgg20.userid=mu.id AND mgg20.courseid=mg.courseid
					LEFT JOIN (select course,mas.* 
								from mdl_assign_submission mas
								inner join mdl_assign  ma on ma.id=mas.assignment
								where assignment in(54,53,59,60,61,62,64,66,72,75,100,97,103,106)
					) mgg21 ON mgg21.userid=mu.id AND mgg21.course=mg.courseid
					LEFT JOIN (select mgg.userid,mgi.courseid,finalgrade,IF(finalgrade IS NULL,0,finalgrade*.15) as cal_ponderada
							   from mdl_grade_grades mgg
							   inner join mdl_grade_items mgi on mgi.id=mgg.itemid
							   where itemid in (207,201,254,257,260,267,279,281,332,354,533,510,558,580)
					)  mgg212 on mgg212.userid=mu.id AND mgg212.courseid=mg.courseid
					where username like'%unete1%'  and not mg.id=229 
					order by curso,mu.username";

		$consulta = $this->db->query($query);
		if($consulta->num_rows()>0)
		{
			return $consulta;
		}
	}

}

/* End of file entregafinal_model.php */
/* Location: ./application/models/entregafinal_model.php */