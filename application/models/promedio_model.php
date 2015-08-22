<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promedio_model extends CI_Model {

	public function getCursos()
	{
		return $this->db->get('v_get_cursos');
	}

	

}

/* End of file promedio_model.php */
/* Location: ./application/models/promedio_model.php */