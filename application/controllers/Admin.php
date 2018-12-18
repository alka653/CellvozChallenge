<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model([
			'clientes_model',
			'datosclien_model'
		]);
	}
	public function index(){
		if(is_logged_in()){
			$clientes = $this->clientes_model->get($this->input->get());
			echo $this->blade->view()->make('admin/index', [
				'clientes' => $clientes,
				'cliente_find' => new Datosclien_model()
			])->render();
		}else{
			redirect('/');
		}
	}
}