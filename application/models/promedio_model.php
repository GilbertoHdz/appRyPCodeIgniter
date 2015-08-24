<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promedio_model extends CI_Model {

	public function getCursos()
	{
		return $this->db->get('v_cursos');
	}

	public function getItemsPorCursos($item)
	{

		$consulta = $this->db->query("SELECT * FROM v_item_curso WHERE id_curso = " . $item);
		if($consulta->num_rows()>0)
		{
			return $consulta;
		}

	}


	public function getPromedio()
	{
		$query = "
					SELECT VAD.Usuario, VAD.Contrasenia, VAD.Convenio, VAD.NombComp
			, VAD.CorreoE, VAD.phone1, VAD.phone2, VAD.Estado
			, VAD.ClvCentroTrabajo, VAD.CentroTrabajo, VAD.NvlCentroTrabajo
			, VAD.DiasSinIngresar, VAD.IngresoPlataforma, VAD.EstPago, VAD.Grupo
			, VAD.Diplomado, VAD.GrupoApertura, VAD.FechaApertura 
			, ROUND(SUM(VAA.calificacion),2) AS calificacion
			, ROUND(SUM(VAA.avance),2) avance,
			CASE WHEN (ID.data='BAJA POR SOLICITUD') THEN 'BAJA POR SOLICITUD'
			WHEN (ID.data='BAJA POR INACTIVIDAD') THEN 'BAJA POR INACTIVIDAD'
			WHEN (SUM(VAA.calificacion)) < 60 THEN 'EN RIESGO (1-59)'
			WHEN (SUM(VAA.calificacion) >= 60 AND SUM(VAA.calificacion) < 70 ) THEN 'EN RIESGO (60-69)'
			WHEN (SUM(VAA.calificacion) >= 70 AND SUM(VAA.calificacion) < 80 ) THEN 'AL CORRIENTE (70-79)'
			WHEN (SUM(VAA.calificacion) >= 80 AND SUM(VAA.calificacion) < 100 ) THEN 'AL CORRIENTE (80-100)'
			ELSE 'BAJA POR INACTIVIDAD' END AS EstadoAcademico
			FROM v_alumno_detalle VAD
			LEFT JOIN v_alumno_avance VAA ON (VAA.userid = VAD.userid)
			INNER JOIN mdl_user_info_data ID ON (ID.userid = VAD.userid AND ID.fieldid = 1)
			WHERE VAA.itemid IN (84,85,86,91,92,95,96,126,129,130,131,132,137,138,142,189,190,203,204,205,206,207)
			GROUP BY VAD.userid, VAA.courseid, VAD.DiasSinIngresar, VAD.Grupo
				, VAD.Diplomado, VAD.FechaApertura
			";

		$consulta = $this->db->query($query);
		if($consulta->num_rows()>0)
		{
			return $consulta;
		}
		
	}


}

/* End of file promedio_model.php */
/* Location: ./application/models/promedio_model.php */