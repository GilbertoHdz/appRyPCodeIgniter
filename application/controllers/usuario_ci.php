<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_ci extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->model('usuario_model');
	}

	public function index()
	{

		if (! $this->session->userdata('objSession')) {
			redirect('login');
		}

		$user = $this->session->userdata('objSession');
		if (element('tipo', $user) != 'admin') {
			redirect('home');
		}

		$data = array('title' => 'Admin');
		$this->load->view('templates/header', $data);

		$data = array('users' => $this->usuario_model->get_users());
		$this->load->view('crud/usuario',$data);

		$this->load->view('templates/footer');
	}

	public function getUsuario()
	{
		$id = $_POST['id'];
		if (isset($id)) {
			$item = $this->usuario_model->get_user($id);
			echo json_encode($item);
		}
	}

	public function mult_user()
	{
		$item = $_POST['termino'];
		//echo element('Nomb', $item);

		if (isset($_POST['id'])) {
			$this->usuario_model->edit_user($_POST['id'], $item);
		}else{
			$this->usuario_model->new_user($item);
		}
	}
 
 
 	//función para eliminar usuarios
    public function eliminar_user()
    {
    	$id = $_POST['id'];
        if(isset($id)){
        	$this->usuario_model->delete_user($id);
        }
    }
}

/* End of file usuario_ci.php */
/* Location: ./application/controllers/usuario_ci.php */