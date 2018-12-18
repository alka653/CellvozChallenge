<?php
class Datosclien_model extends CI_model{
	public $idcliente;
	public $edad;
	public $area;
	public $saldo;
	public function __construct(){
		$this->load->database();
	}
	public function find($idcliente){
		return $this->db->get_where('datosclien', ['idcliente' => $idcliente])->result_array();
	}
	public function byEdad($edad){
		$data = [];
		$this->db->select('idcliente');
		$this->db->from('datosclien');
		$this->db->where('edad >=', $edad);
		foreach($this->db->get()->result_array() as $cliente){
			array_push($data, $cliente['idcliente']);
		}
		return $data;
	}
}