<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal_model extends CI_Model {

	public function getUsuarios()
	{
		return $this->db->get('mdl_user');
	}

	public function getAllUsuarios()
	{
		$query = "
			SELECT DISTINCT MU.id, CONCAT(MU.firstname, ' ', MU.lastname) nombre
				, MU.email
			FROM mdl_user MU
			INNER JOIN mdl_grade_grades MGG ON (MU.id = MGG.userid);
		";

		$consulta = $this->db->query($query);
		if($consulta->num_rows()>0)
		{
			return $consulta;
		}
	}


	public function getUsuario($id='')
	{
		$result = $this->db->query("SELECT * FROM mdl_user WHERE id = '" . $id . "' LIMIT 1");
		return $result->row();
	}

	public function addEnvio($data)
	{
        $data = array(
            'id_usuario'    =>      element('idusuario', $obj),
            'email'         =>      element('email', $obj),
            'f_envio1'      =>      date('Y-m-d'),
            'f_envio2'      =>      date('Y-m-d')
        );

        $this->db->insert('diploma_enviado', $data);
	}

	public function reEnvio($id, $obj)
	{
 
		$data = array(
            'f_envio2'  =>   date('Y-m-d')
        );
 
		$this->db->where('id', $id);
		$this->db->update('diploma_enviado',$data);
 
	}

}

/* End of file personal_model.php */
/* Location: ./application/models/personal_model.php */

?>