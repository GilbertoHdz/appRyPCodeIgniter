<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal_model extends CI_Model {

	public function getUsuarios()
	{
		return $this->db->get('mdl_user');
	}

	public function getUsuario($id='')
	{
		$result = $this->db->query("SELECT * FROM mdl_user WHERE id = '" . $id . "' LIMIT 1");
		return $result->row();
	}

}

/* End of file personal_model.php */
/* Location: ./application/models/personal_model.php */

?>