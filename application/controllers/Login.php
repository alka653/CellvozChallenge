<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model([
			'usuarios_model'
		]);
	}
	public function index(){
		if($this->input->post()){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			if($this->usuarios_model->login($username, $password)){
				redirect('/dashboard');
			}else{
				$this->form_validation->set_message('verifica','Contraseña incorrecta');
				redirect('/');
			}
		}else{
			echo $this->blade->view()->make('login/form')->render();
		}
    }
}