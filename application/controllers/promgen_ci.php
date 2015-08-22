<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promgen_ci extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('promedio_model');
	}

	public function index()
	{
		$data = array('title' => 'Promedio', 'sub_title' => 'Promedio General');
		$this->load->view('templates/header', $data);

		//$general = $this->apertura_model->getAperturaGeneral()->result();
		//$data['general'] = $general;
		$this->load->view('promedio/general');

		$this->load->view('templates/footer');
	}

	public function get_ajax()
	{
		$this->load->helper('form');

		$data['cursos'] = $this->promedio_model->getCursos();

	}

}

/* End of file promgen_ci.php */
/* Location: ./application/controllers/promgen_ci.php */