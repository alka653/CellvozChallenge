<?php
class Clientes_model extends CI_model{
	public $id;
	public $fecha;
	public $nombre;
	public function __construct(){
		$this->load->database();
		$this->load->model([
			'datosclien_model'
		]);
	}
	public function get($query = []){
		$this->db->select('*');
		if(array_key_exists('desde', $query)){
			if($query['desde'] != ''){
				$this->db->where('fecha >=', $query['desde']);
			}
		}
		if(array_key_exists('hasta', $query)){
			if($query['hasta'] != ''){
				$this->db->where('fecha <=', $query['hasta']);
			}
		}
		if(array_key_exists('edad', $query)){
			$this->db->where_in('id', $this->datosclien_model->byEdad($query['edad']));
		}
		return $this->db->get('clientes')->result_array();
	}
}