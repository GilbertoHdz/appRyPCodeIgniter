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
		
		$data = array('title' => 'Admin');
		$this->load->view('templates/header', $data);

		$data = array('users' => $this->usuario_model->get_users());
		$this->load->view('crud/usuario',$data);

		$this->load->view('templates/footer');
	}
 
 
 	//función para eliminar usuarios
    public function delete_user()
    {
        
        //comprobamos si es una petición ajax y existe la variable post id
        if($this->input->is_ajax_request() && $this->input->post('id'))
        {
 
        	$id = $this->input->post('id');
 
			$this->crud_model->delete_user($id);
 
        }
 
    }
 
 	//con esta función añadimos y editamos usuarios dependiendo 
 	//si llega la variable post id, en ese caso editamos
    public function multi_user()
    {
 
    	//comprobamos si es una petición ajax
    	if($this->input->is_ajax_request())
        {
 
        	$this->form_validation->set_rules('email', 'email', 'trim|min_length[4]|required|max_length[100]|valid_email|xss_clean');
            $this->form_validation->set_rules('nombre', 'nombre', 'trim|min_length[2]|required|max_length[60]|xss_clean');
 
            $this->form_validation->set_message('required','El %s es obligatorio');
            $this->form_validation->set_message('valid_email','El %s no es válido');
            $this->form_validation->set_message('max_length', 'El %s no puede tener más de %s carácteres');
            $this->form_validation->set_message('min_length', 'El %s no puede tener menos de %s carácteres');
 
            if($this->form_validation->run() == FALSE)
            {
 
            	//de esta forma devolvemos los errores de formularios
            	//con ajax desde codeigniter, aunque con php es lo mismo
            	$errors = array(
				    'nombre' => form_error('nombre'),
				    'email' => form_error('email'),
				    'respuesta' => 'error'
				);
            	//y lo devolvemos así para parsearlo con JSON.parse
				echo json_encode($errors);
 
				return FALSE;
 
            }else{
 
            	$nombre = $this->input->post('nombre');
	        	$email = $this->input->post('email');
 
	        	//si estamos editando
            	if($this->input->post('id'))
            	{
 
            		$id = $this->input->post('id');
            		$this->crud_model->edit_user($id,$nombre,$email);
 
            	//si estamos agregando un usuario
            	}else{
 
            		$this->crud_model->new_user($nombre,$email);
 
            	}
	        	
	        	//en cualquier caso damos ok porque todo ha salido bien
	        	//habría que hacer la comprobación de la respuesta del modelo
 
	        	$response = array(
				    'respuesta'	=>	'ok'
				);
            	
				echo json_encode($response);
 
            }
 
        }
        
    }
 
}

/* End of file usuario_ci.php */
/* Location: ./application/controllers/usuario_ci.php */