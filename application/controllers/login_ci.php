<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_ci extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('objSession')) {
			redirect('home');
			
		}

		if (isset($_POST['password'])) {
			if ($this->usuario_model->login($_POST['username'], md5($_POST['password']))) {

				$data = $this->usuario_model->login($_POST['username'], md5($_POST['password']))->result();
				
				$data = array('username' => $data[0]->username, 
							  'tipo' 	 => $data[0]->tipo,
							  'nombre' => $data[0]->nombre,);

				$this->session->set_userdata('objSession', $data);

				redirect('home');
			} else {
				$data['error'] = true;
				$this->load->view('login', $data);
			}
		}else{
			$data['error'] = false;
			$this->load->view('login', $data);
		}

	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}



}

/* End of file login_ci.php */
/* Location: ./application/controllers/login_ci.php */




