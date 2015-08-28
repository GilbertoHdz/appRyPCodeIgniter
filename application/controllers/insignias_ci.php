<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insignias_ci extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('insignias_model');
	}
	public function index()
	{
		if (! $this->session->userdata('objSession')) {
			redirect('login');
		}
		
		$data = array('title' => 'Insignias', 'sub_title' => 'Insignias');
		$this->load->view('templates/header', $data);

		$insignias = $this->insignias_model->getInsignias()->result();
		$data['insignias'] = $insignias;
		$this->load->view('insignia', $data);

		$this->load->view('templates/footer');
	}

}

/* End of file insignias_ci.php */
/* Location: ./application/controllers/insignias_ci.php */