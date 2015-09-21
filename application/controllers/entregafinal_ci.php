<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entregafinal_ci extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('entregafinal_model');
	}

	public function index()
	{
		if (! $this->session->userdata('objSession')) {
			redirect('login');
		}
		
		$data = array('title' => 'Entrega Final');
		$this->load->view('templates/header', $data);

		$result = $this->entregafinal_model->getEntregaFinal()->result();
		$data = array('stmt' => $result);
		
		$this->load->view('entrega_final/entrega_final', $data);
		
		$this->load->view('templates/footer');
	}

	public function getData_Ajax()
	{
		$result = $this->entregafinal_model->getEntregaFinal()->result();
		echo json_encode($result);
	}
}

/* End of file entregafinal_ci.php */
/* Location: ./application/controllers/entregafinal_ci.php */