<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endereco extends CI_Controller {

	function __construct() {
		parent::__construct();
		permission();
  }

	public function index()
	{
		$data['title'] = 'Cadastro de endereços - Manyminds';

		$this->load->view('templates/header'   ,$data);
		$this->load->view('templates/nav-top'  ,$data);
		$this->load->view('pages/form-endereco',$data);
		$this->load->view('templates/footer'   ,$data);
		$this->load->view('templates/js'       ,$data);
	}

	public function cadastrar(){
		echo 'to aqui...';
		exit();
	}

}
