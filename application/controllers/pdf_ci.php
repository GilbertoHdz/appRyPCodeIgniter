<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pdf_ci extends CI_Controller 
{
 
    public function __construct()
    {
        parent::__construct();
        $this->load->library('html2pdf');
        $this->load->model('personal_model');
    }
 
    private function createFolder()
    {
        if(!is_dir("./files"))
        {
            mkdir("./files", 0777);
            mkdir("./files/pdfs", 0777);
        }
    }


    public function index()
    {
        if (! $this->session->userdata('objSession')) {
            redirect('login');
        }
        
        $data = array('title' => 'Diplomas');
        $this->load->view('templates/header', $data);

        //$fila = $this->personal_model->getAllUsuarios()->result();

        //print($fila->Title);
        //$data = array('contenido' => $fila);
        $this->load->view('diplomas/diplomas');

        $this->load->view('templates/footer');
    }


    public function send_diploma()
    {
        $item = $_POST['termino'];

        if (isset($_POST['id'])) {
            $this->personal_model->reEnvio($_POST['id'], $item);
        }else{
            $this->personal_model->addEnvio($item);
        }
    }

 
    public function get_Diploma()
    {
        $config = array();
        $config['useragent']           = "CodeIgniter";
        //$config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']            = "smtp";
        $config['smtp_host']           = "ssl://smtp.googlemail.com";
        $config['smtp_port']           = "465";

        $config['smtp_user']           = "killer.krazydevil@gmail.com";
        $config['smtp_pass']           = "Velero1406";

        $config['mailtype'] = 'html';
        $config['charset']  = 'utf-8';
        $config['newline']  = "\r\n";
        $config['wordwrap'] = TRUE;



        $this->load->library('email');
        $this->email->initialize($config);
        $this->load->helper('path');


        $id = $_POST['id'];
        
        //establecemos la carpeta en la que queremos guardar los pdfs,
        //si no existen las creamos y damos permisos
        $this->createFolder();
 
        //importante el slash del final o no funcionará correctamente
        $this->html2pdf->folder('./files/pdfs/');
        
        //establecemos el nombre del archivo
        $this->html2pdf->filename('Diploma.pdf');
        
        //establecemos el tipo de papel
        $this->html2pdf->paper('Letter', 'landscape');
        
        //datos que queremos enviar a la vista, lo mismo de siempre
        
        $fila = $this->personal_model->getUsuario($id);


        $imgPDF = set_realpath('vendor/img') . 'Ambientes4.jpg';

        $data = array(
            'title'     => 'Datos personal en pdf',
            'contenido' => $fila,
            'imag' => $imgPDF
        );
        

        //hacemos que coja la vista como datos a imprimir
        //importante utf8_decode para mostrar bien las tildes, ñ y demás
        $this->html2pdf->html(utf8_decode($this->load->view('diplomas/pdf', $data, true)));

        
        //si el pdf se guarda correctamente lo mostramos en pantalla
        if($this->html2pdf->create('save'))
        {

            $this->email->from('killer.krazydevil@gmail.com', 'Test From');
            $this->email->to('ghernandez.9002@gmail.com');
            
            $this->email->subject('Email PDF Test');

            $this->email->message("<div style='width: 50% 50%;' align='center'>
                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                        <tr>
                                        <td align='center' valign='top' style=''>
                                            <table width='600' border='0' cellspacing='0' cellpadding='0'>
                                                <tr>
                                                    <td width='20' align='left' valign='top' 
                                                        style='background-color:#F5F5F5;'>&nbsp;</td>
                                                    <td align='center' valign='top' 
                                                        style='background-color:#F5F5F5; color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:14px;'><br>
                                                        <br><br>
                                                        <div style='color:#030369; font-family:Georgia, Times New Roman, Times, serif; font-size:24px;'>
                                                            Laboratorio Nacional de la Informatica Avanzada
                                                            LANIA A.C<br>
                                                        </div>
                                                        <br>
                                                        <div style='color:#000000; font-style: oblique; font-family:Arial, Helvetica, sans-serif; font-size:16px;'>
                                                            <p><b>De parte de UNETE te felicitamos por </b><br>
                                                                  haber concluido satisfactoriamente nuestro curso</p>
                                                        </div>
                                                        <br>
                                                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                          <tr>
                                                            <td align='center' valign='middle'>
                                                                <hr style='height: 3px; background-color:#030369; border: 0 none;'>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td height='30' align='center' valign='middle'>
                                                                <div style='color:#030369; font-style: oblique; font-size:18px; font-family: Comic Sans MS, Cursive;'>Descripción diplomado</div>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td align='center' valign='middle'>
                                                                <hr style='height: 3px; background-color:#030369; border: 0 none;'>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                        <br>
                                                        <div style='color:#000000; font-style: oblique; font-family:Arial, Helvetica, sans-serif; font-size:16px;'>
                                                            <p><b>Te damos un fuerte abrazo!</b><br>
                                                                  Descarga tu Diploma adjunto</p>
                                                        </div>
                                                        <br><br>
                                                        <div style='color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:14px;'><b>Dirección Lania</b> <br>
                                                          Contacto <br>
                                                          Telefono: (123) 456-789 <br>
                                                          Email: email@email.com <br>
                                                          Sitio Web: http://www.lania.mx/
                                                        </div>
                                                        <br><br>
                                                    </td>
                                                    <td width='20' align='left' valign='top' 
                                                        style='background-color:#F5F5F5;'>&nbsp;</td>
                                                </tr>
                                            </table>
                                        </td>
                                        </tr>
                                    </table>
                                    </div>");

            //$this->email->attach($path);
            $path = set_realpath('files/pdfs');
            $this->email->attach($path . 'Diploma.pdf');

            if ($this->email->send())
            {
                echo  "Se envio email";
            }
            else
            {
                echo $this->email->print_debugger();
            }
            
            //echo $path;
            //echo $this->email->print_debugger();
        }
    }

}
/* End of file pdf_ci.php */
/* Location: ./application/controllers/pdf_ci.php */
?>