<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ejedet_ci extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ejecutivo_model');
		$this->load->model('promedio_model');
	}

	public function index()
	{
		if (! $this->session->userdata('objSession')) {
			redirect('login');
		}
		
		$data = array('title' => 'Ejecutivo', 'sub_title' => 'Ejecutivo Detalle');
		$this->load->view('templates/header', $data);

		$cursos = $this->promedio_model->getCursos()->result();
		$data = array('cursos' => json_encode($cursos));

		$this->load->view('ejecutivo/detalle', $data);

		$this->load->view('templates/footer');
	}

	public function get_Detalle()

	{
		//$item = '87,88,89,90,93,94,125,127,128,133,134,139,140,143,191,192,197,198,199,200,201,
		//		112,113,114,115,116,117,136,144,145,181,182,195,196,239,245,246,250,251,255,256,257';
		
		$item  = $_POST['termino'];

		$arr = array();
		$elem = array();
		
		$result = $this->ejecutivo_model->getCursos($item)->result();

		foreach ($result as $value) {

			$pago = 0;
			$noPago =0;

			$b_soli = 0;
			$b_inac = 0;
			$r1059 = 0;
			$r6069 = 0;
			$c7079 = 0;
			$c80100 = 0;
			$acreditaron = 0;
			$no_acreditaron = 0;
			$egresados =0;
			$avance = 0;

			$result = $this->ejecutivo_model->getEjecutivo($value->courseid, $item)->result();

			foreach ($result as $value) {
				if ($value->pago) { $pago++; } else { $noPago++; }
				$avance = $value->avance;

				switch ($value->tipo_prefijo) {
					case 1:
						$b_soli++;
						break;
					case 2:
						$b_inac++;
						break;
					case 3:
						$r1059++;
						$no_acreditaron++;
						break;
					case 4:
						$r6069++;
						$acreditaron++;
						break;
					case 5:
						$c7079++;
						$acreditaron++;
						break;
					case 6:
						$c80100++;
						$acreditaron++;
						break;
					default:
						break;
				}
			}

			$egresados = $acreditaron + $no_acreditaron;

			$elem['avance'] = $avance;
			$elem['b_soli'] = $b_soli;
			$elem['b_inac'] = $b_inac;
			$elem['r1059'] = $r1059;
			$elem['r6069'] = $r6069;
			$elem['c7079'] = $c7079;
			$elem['c80100'] = $c80100;

			$elem['acreditaron'] = $acreditaron;
			$elem['no_acreditaron'] = $no_acreditaron;
			$elem['egresados'] = $egresados;
			$elem['pago'] = $pago;
			$elem['no_pago'] = $noPago;

			$query = $this->ejecutivo_model->getEjecutivoBase($value->courseid)->result();

			$grupo = "";
			$convenio ="";
			$total_inscritos = 0;
			$fecha_apert = "";
			$diplomado = "";
			foreach ($query as $value) {
				$total_inscritos += $value->ttInscritos;
				$grupo = $value->grupo;
				$convenio = $value->convenio;
				$fecha_apert = $value->FechaApertura;
				$diplomado = $value->diplomado;;

			}

			$elem['grupo'] = $grupo;
			$elem['convenio'] = $convenio;
			$elem['total_inscritos'] = $total_inscritos;
			$elem['fecha_apert'] = $fecha_apert;
			$elem['diplomado'] = $diplomado;

			$arr[] = $elem;


		}


		echo json_encode($arr);


		//var_dump($result);
		//echo json_encode($arr);
		//var_dump($arr);
		//echo element('userid', $result);
	}

}

/* End of file ejedet_ci.php */
/* Location: ./application/controllers/ejedet_ci.php */