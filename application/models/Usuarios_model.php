<?php
class Usuarios_model extends CI_model{
	public $id;
	public $usuario;
	public $clave;
	public function __construct(){
		$this->load->database();
		$this->load->library('session');
	}
	public function login($usuario, $password){
		$query = $this->db->get_where('usuarios', ['usuario' => $usuario, 'clave' => $password]);
		if($query->num_rows() == 1){
			$row = $query->row();
			$data = [
				'user_data'=> [
					'usuario' => $row->usuario
				]
			];
			$this->session->set_userdata($data);
			return true;
		}
		$this->session->unset_userdata('user_data');
		return false;
	}
}