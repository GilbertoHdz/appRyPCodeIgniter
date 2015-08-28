<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Apertdet_ci extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('apertura_model');
	}

	public function index()
	{
		if (! $this->session->userdata('objSession')) {
			redirect('login');
		}

		$data = array('title' => 'Apertura', 'sub_title' => 'Apertuda Detalle');
		$this->load->view('templates/header', $data);

		$detalle = $this->apertura_model->getAperturaDetalle()->result();
		$data['detalle'] = $detalle;

		$this->load->view('apertura/detalle', $data);

		$this->load->view('templates/footer');

	}
}

/* End of file apertura.php */
/* Location: ./application/controllers/apertura.php */