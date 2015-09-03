<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informacion_model extends CI_Model {

	public function getUsuarios()
	{
		return $this->db->get('mdl_user');
	}

	public function ajaxUsuario($city, $name)
	{
		$query = "
			SELECT DISTINCT MU.id, CONCAT(MU.firstname, ' ', MU.lastname) nombre
			FROM mdl_user MU
			INNER JOIN mdl_grade_grades MGG ON (MU.id = MGG.userid)
			WHERE CONCAT(MU.firstname, ' ', MU.lastname) LIKE '%" . $name . "%'
			LIMIT 20;
		";

		$consulta = $this->db->query($query);
		if($consulta->num_rows()>0)
		{
			return $consulta;
		}
	}

	public function detalle_alumno($id='')
	{
		$query = "
			SELECT MGG.userid, ROUND(IFNULL(MGG.finalgrade, 0), 2) calificacion, MGG.itemid, MGI.courseid
				, MGI.itemname actividad, MGI.aggregationcoef, MGI.categoryid, MC.fullname
			    , ROUND((IFNULL(MGG.finalgrade, 0) * MGI.aggregationcoef), 2) avance
			FROM mdl_grade_grades MGG
			INNER JOIN mdl_grade_items MGI ON (MGG.itemid = MGI.id)
			INNER JOIN mdl_course MC ON (MGI.courseid = MC.id)
			WHERE MGG.userid = " . $id . " AND MGI.courseid NOT IN (2, 3, 11) AND MGI.categoryid <> 'null' 
			ORDER BY MGG.userid, MGI.courseid, MGG.itemid;
		";

		$consulta = $this->db->query($query);
		if($consulta->num_rows()>0)
		{
			return $consulta;
		}

	}

}

/* End of file informacion_model.php */
/* Location: ./application/models/informacion_model.php */