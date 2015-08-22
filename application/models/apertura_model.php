<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apertura_model extends CI_Model {

	public function getAperturaGeneral()
	{
		return $this->db->get('apertura_general');
	}

	public function getAperturaDetalle()
	{
		return $this->db->get('apertura_detalle');
	}

}

/* End of file apertura.php */
/* Location: ./application/models/apertura.php */