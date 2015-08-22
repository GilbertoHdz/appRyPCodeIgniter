<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promgrupo_ci extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('promedio_model');
	}

	public function index()
	{
		$data = array('title' => 'Promedio', 'sub_title' => 'Promedio Grupo');
		$this->load->view('templates/header', $data);

		//$general = $this->apertura_model->getAperturaGeneral()->result();
		//$data['general'] = $general;
		$this->load->view('promedio/grupo');

		$this->load->view('templates/footer');
	}

	

}

/* End of file promgrupo_ci.php */
/* Location: ./application/controllers/promgrupo_ci.php */