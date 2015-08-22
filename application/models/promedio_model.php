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


}

/* End of file promedio_model.php */
/* Location: ./application/models/promedio_model.php */