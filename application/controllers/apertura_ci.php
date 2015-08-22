<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Apertura_ci extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('apertura_model');
	}

	public function index()
	{
		$data = array('title' => 'Apertura');
		$this->load->view('templates/header', $data);

		//$general = $this->apertura_model->getAperturaGeneral()->result();
		//$detalle = $this->apertura_model->getAperturaDetalle()->result();

		$this->load->view('apertura');

		$this->load->view('templates/footer');
	}

	public function general()
	{

			//$general = $this->apertura_model->getAperturaGeneral()->result();
			//return $general;
		$data = array('title' => 'Apertura');
		$this->load->view('templates/header', $data);

		$general = $this->apertura_model->getAperturaGeneral()->result();
		$data['general'] = $general;
		return $data;
		$this->load->view('apertura/general', $data);

		$this->load->view('templates/footer');

	}

	public function detalle()
	{

			$detalle = $this->apertura_model->getAperturaDetalle()->result();
			return $detalle;

		
	}

	public function apertura_json()
	{
		$detalle = $this->apertura_model->getAperturaDetalle()->result();
		echo json_encode($detalle);
	}

}

/* End of file apertura.php */
/* Location: ./application/controllers/apertura.php */