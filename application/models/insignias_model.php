<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insignias_model extends CI_Model {

	public function getInsignias()
	{
		return $this->db->get('v_insignias');
	}
}

/* End of file insignias_model.php */
/* Location: ./application/models/insignias_model.php */