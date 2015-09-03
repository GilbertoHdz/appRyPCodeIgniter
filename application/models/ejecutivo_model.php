<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ejecutivo_model extends CI_Model {

	public function getCursos($item)
	{
		$query = "
			SELECT DISTINCT courseid FROM mdl_grade_items
			WHERE id IN (" . $item . ") ORDER BY courseid;
		";

		$consulta = $this->db->query($query);
		if($consulta->num_rows()>0)
		{
			return $consulta;
		}
	}

	public function getEjecutivoBase($item)
	{
		$query = "
				SELECT MG.courseid, MG.id groupid, SUBSTRING(name, 1, 7) grupo, MG.name grupo_pre, QS.convenio,
				    SUM(QS.total) AS ttInscritos, FROM_UNIXTIME(MC.startdate) AS FechaApertura, MC.fullname AS diplomado
				 FROM mdl_groups MG
				 INNER JOIN mdl_course MC ON (MC.id = MG.courseid)
				 INNER JOIN (SELECT COUNT(GM.userid) total, GM.groupid, UID.data AS convenio
						    FROM mdl_groups_members GM
				            INNER JOIN mdl_user_info_data UID ON (UID.userid = GM.userid AND UID.fieldid = 20)
				            GROUP BY GM.groupid , UID.data
				            ) QS ON (QS.groupid = MG.id)
				 WHERE MG.courseid NOT IN (1 , 4, 11) AND MG.courseid = " . $item ."
				 GROUP BY MG.courseid, QS.Convenio, MG.id;
			";

		$consulta = $this->db->query($query);
		if($consulta->num_rows()>0)
		{
			return $consulta;
		}
		
	}


	public function getEjecutivo($curso, $item)
	{
		$query = "
			SELECT MGG.userid, SUM(MGG.finalgrade * MGI.aggregationcoef) AS calificacion,
			 CASE WHEN (ID.data='BAJA POR SOLICITUD') THEN 'BAJA POR SOLICITUD'
				WHEN (ID.data='BAJA POR INACTIVIDAD') THEN 'BAJA POR INACTIVIDAD'
				WHEN (SUM(MGG.finalgrade * MGI.aggregationcoef)) < 60 THEN 'EN RIESGO (1-59)'
				WHEN (SUM(MGG.finalgrade * MGI.aggregationcoef) >= 60 AND SUM(MGG.finalgrade * MGI.aggregationcoef) < 70 ) THEN 'EN RIESGO (60-69)'
				WHEN (SUM(MGG.finalgrade * MGI.aggregationcoef) >= 70 AND SUM(MGG.finalgrade * MGI.aggregationcoef) < 80 ) THEN 'AL CORRIENTE (70-79)'
				WHEN (SUM(MGG.finalgrade * MGI.aggregationcoef) >= 80 AND SUM(MGG.finalgrade * MGI.aggregationcoef) < 100 ) THEN 'AL CORRIENTE (80-100)'
				ELSE 'BAJA POR INACTIVIDAD' END AS status,
			 CASE WHEN (ID.data='BAJA POR SOLICITUD') THEN 1
				WHEN (ID.data='BAJA POR INACTIVIDAD') THEN 2
				WHEN (SUM(MGG.finalgrade * MGI.aggregationcoef)) < 60 THEN 3
				WHEN (SUM(MGG.finalgrade * MGI.aggregationcoef) >= 60 AND SUM(MGG.finalgrade * MGI.aggregationcoef) < 70 ) THEN 4
				WHEN (SUM(MGG.finalgrade * MGI.aggregationcoef) >= 70 AND SUM(MGG.finalgrade * MGI.aggregationcoef) < 80 ) THEN 5
				WHEN (SUM(MGG.finalgrade * MGI.aggregationcoef) >= 80 AND SUM(MGG.finalgrade * MGI.aggregationcoef) < 100 ) THEN 6
				ELSE 2 END AS tipo_prefijo, ROUND(SUM(MGI.aggregationcoef*100), 2) avance, IDP.data as pago, MGI.courseid
			 FROM mdl_grade_grades MGG
			 INNER JOIN mdl_grade_items MGI ON (MGI.id = MGG.itemid)
			 INNER JOIN mdl_user_info_data ID ON (ID.userid = MGG.userid AND ID.fieldid  = 1)
			 INNER JOIN mdl_user_info_data IDP ON (IDP.userid = MGG.userid AND IDP.fieldid  = 22)
			 WHERE MGI.courseid = ". $curso ." AND MGG.itemid IN (" . $item . ")
			 GROUP BY MGG.userid
			 ORDER BY courseid, tipo_prefijo;
		";

		$consulta = $this->db->query($query);
		if($consulta->num_rows()>0)
		{
			return $consulta;
		}
	}

}

/* End of file ejecutivo_model.php */
/* Location: ./application/models/ejecutivo_model.php */