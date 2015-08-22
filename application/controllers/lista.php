<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lista extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$data = array('title' => 'Lista');
		$this->load->view('templates/header', $data);
		
		$result = $this->personal_model->getUsuarios()->result();
		$data = array('consulta' => $result	);
		$this->load->view('lista', $data);

		$this->load->view('templates/footer');
	}

	public function listaJson($value='')
	{
		$result = $this->personal_model->getUsuarios()->result();
		//print_r($result);
		echo json_encode($result);
	}

}

/* End of file lista.php */
/* Location: ./application/controllers/lista.php */