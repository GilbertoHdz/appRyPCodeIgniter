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
		if (! $this->session->userdata('objSession')) {
			redirect('login');
		}
		
		$data = array('title' => 'Promedio Grupo', 'sub_title' => 'Promedio Grupo');
		$this->load->view('templates/header', $data);

		$cursos = $this->promedio_model->getCursos()->result();

		$data = array('cursos' => json_encode($cursos));
		$this->load->view('promedio/grupo', $data);

		$this->load->view('templates/footer');
	}

	public function get_itemcursos($item)
	{
		//$item = $_POST['termino'];
		
		$result = $this->promedio_model->getItemsPorCursos($item)->result();
		echo json_encode($result);
	}

	public function getPromedioGeneral()
	{
		$item = $_POST['termino'];
		$result = $this->promedio_model->getPromedio($item)->result();
		echo json_encode($result);
	}

	

}

/* End of file promgrupo_ci.php */
/* Location: ./application/controllers/promgrupo_ci.php */