<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Segdocente_ci extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('segdocente_model');
	}

	public function index()
	{
		if (! $this->session->userdata('objSession')) {
			redirect('login');
		}
		
		$data = array('title' => 'Seguimiento Docente');
		$this->load->view('templates/header', $data);

		$result = $this->segdocente_model->getSegDocente()->result();
		$data = array('stmt' => $result);

		$this->load->view('segdocente/segdocente', $data);
		
		$this->load->view('templates/footer');
	}

	public function segDocente_Ajax()
	{
		$result = $this->segdocente_model->getSegDocente()->result();
		echo json_encode($result);
	}

}

/* End of file segdocente_ci.php */
/* Location: ./application/controllers/segdocente_ci.php */