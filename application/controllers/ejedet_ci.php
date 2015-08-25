<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ejedet_ci extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$data = array('title' => 'Ejecutivo', 'sub_title' => 'Ejecutivo Detalle');
		$this->load->view('templates/header', $data);

		$this->load->view('ejecutivo/detalle');

		$this->load->view('templates/footer');
	}

}

/* End of file ejedet_ci.php */
/* Location: ./application/controllers/ejedet_ci.php */