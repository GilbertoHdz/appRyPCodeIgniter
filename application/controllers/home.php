<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index()
	{
		$data = array('title' => 'Home');
		$this->load->view('templates/header', $data);
		
		$this->load->view('home');
		
		$this->load->view('templates/footer');
	}

	public function xmlHome()
	{
		echo $this->personal_model->getUsuarios()->result();
	}

	public function csv()
	{
		$array = array(
			array('Last Name', 'First Name', 'Gender'),
			array('Furtado', 'Nelly', 'female'),
			array('Twain', 'Shania', 'female'),
			array('Farmer', 'Mylene', 'female')
		);
		 
		$this->load->helper('csv');
		echo array_to_csv($array);
	}

	public function report()
	{
		print($url);
	    $this->load->dbutil();
	    $this->load->helper('download');
	    
	    /* get the object   */
	    $query = $this->personal_model->getUsuarios();

	    /*  pass it to db utility function  */
	    $new_report = $this->dbutil->csv_from_result($query);
	    
	    /*  Now use it to write file. write_file helper function will do it */
	    write_file('files/cvs_files/csv_test.csv',$new_report);
	    
	    /*  Done  */

	    $data = file_get_contents('files/cvs_files/csv_test.csv'); // Read the file's contents
		$name = 'test.cvs';
		force_download($name, $data); 
	}

	    //funcion que ejecuta la descarga del csv
    public function downloadCsv()
    {
        //si existe el directorio
        if(is_dir("./files/cvs_files"))
        {
            //ruta completa al archivo
            $route = base_url("files/cvs_files/csv_test.csv"); 
            print($route);
            //nombre del archivo
            $filename = "csv_test.csv"; 
            //si existe el archivo empezamos la descarga del csv
            if(file_exists("./files/cvs_files/".$filename))
            {
                header("Cache-Control: public"); 
                header("Content-Description: File Transfer"); 
                header('Content-disposition: attachment; filename='.basename($route)); 
                header("Content-Type: application/cvs"); 
                header("Content-Transfer-Encoding: binary"); 
                header('Content-Length: '. filesize($route)); 
                readfile($route);
            }
        }    
    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */