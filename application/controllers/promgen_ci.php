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
		if (! $this->session->userdata('objSession')) {
			redirect('login');
		}
		
		$data = array('title' => 'Promedio General', 'sub_title' => 'Promedio General');
		$this->load->view('templates/header', $data);

		$cursos = $this->promedio_model->getCursos()->result();

		$data = array('cursos' => json_encode($cursos));
		$this->load->view('promedio/general', $data);

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

	public function get_ajax()
	{
		$result = $this->promedio_model->getCursos()->result();
		echo json_encode($result);
	}

}

/* End of file promgen_ci.php */
/* Location: ./application/controllers/promgen_ci.php */