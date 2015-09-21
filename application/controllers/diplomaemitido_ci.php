<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diplomaemitido_ci extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('diplomaemitido_model');
	}

	public function index()
	{
		if (! $this->session->userdata('objSession')) {
			redirect('login');
		}
		
		$data = array('title' => 'Diploma Emitido');
		$this->load->view('templates/header', $data);

		$result = $this->diplomaemitido_model->getDataDiploma()->result();
		$data = array('stmt4' => $result);
		
		$this->load->view('diploma_emitido/diplomas_emitidos', $data);
		
		$this->load->view('templates/footer');
	}

	public function getData_Ajax()
	{
		$result = $this->diplomaemitido_model->getDataDiploma()->result();
		echo json_encode($result);
	}


}

/* End of file diplomaemitido_ci.php */
/* Location: ./application/controllers/diplomaemitido_ci.php */