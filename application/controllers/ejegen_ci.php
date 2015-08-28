<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ejegen_ci extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		if (! $this->session->userdata('objSession')) {
			redirect('login');
		}

		$data = array('title' => 'Ejecutivo', 'sub_title' => 'Ejecutivo General');
		$this->load->view('templates/header', $data);

		$this->load->view('ejecutivo/general');

		$this->load->view('templates/footer');
	}

}

/* End of file ejegen_ci.php */
/* Location: ./application/controllers/ejegen_ci.php */