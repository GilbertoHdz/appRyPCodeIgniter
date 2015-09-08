<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('informacion_model');
	}
	
	public function index()
	{
		if (! $this->session->userdata('objSession')) {
			redirect('login');
		}
		
		$data = array('title' => 'Inicio');
		$this->load->view('templates/header', $data);

		$user = $this->session->userdata('objSession');

		$data = array('user'   => element('username', $user),
					  'tipo'   => element('tipo', $user),
					  'nombre' => element('nombre', $user)
					  );

		$this->load->view('home', $data);
		
		$this->load->view('templates/footer');
	}

	public function get_ajax()
	{
		$name  = $_POST['name'];

		$result = $this->informacion_model->ajaxUsuario($name)->result();

		echo json_encode($result);
	}

	public function get_detalle()
	{
		$id  = $_POST['id'];

		$result = $this->informacion_model->detalle_alumno($id)->result();

		echo json_encode($result);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */