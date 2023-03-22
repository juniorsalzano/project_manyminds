<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedor extends CI_Controller {

	function __construct() {
		parent::__construct();
		permission();
  }

	public function novo(){
		$data['title'] = 'Cadastro de fornecedores - Manyminds';
		$this->reloadNovo($data);
	}

	public function reloadNovo($data){

		$this->load->model('usuario_model');
		$data['fornecedores'] = $this->usuario_model->listaFornecedores('T');
		$data['title'] = 'Cadastro de fornecedores - Manyminds';
		$this->load->view('templates/header'   				    ,$data);
		$this->load->view('templates/nav-top'  				    ,$data);
		$this->load->view('pages/form-cadastro-fornecedor',$data);
		$this->load->view('templates/footer'  				    ,$data);
		$this->load->view('templates/js'      				    ,$data);
	}

	public function cadastrar(){
		$usuario = array();
		$this->load->model('usuario_model');
		$data['erro'] = '';

		if (!isset($_POST['email'])) {
			$data['erro'] = $data['erro'].'Email não informado.<br>';	
		} else {
			if ($this->usuario_model->getEmail($_POST['email'])){
				$data['erro'] = $data['erro'].'Email '.$_POST['email'].' já cadastrado.<br>';
			}
		}
	
		if (!isset($_POST['nome'])) {
			$data['erro'] = $data['erro'].'Nome não informado.<br>';	
		}

		if (!isset($_POST['dataNascimento'])) {
			$data['erro'] = $data['erro'].'Data de nascimento não informado.<br>';	
		}

		if (!isset($_POST['senha'])) {
			$data['erro'] = $data['erro'].'Data de nascimento não informado.<br>';	
		}

		if ($data['erro'] != '') {
      $this->reloadNovo($data);
		} else {
			$usuario['email'] 					= $_POST['email'];
			$usuario['nome']  					= $_POST['nome'];
			$usuario['dataNascimento']  = $_POST['dataNascimento'];
			$usuario['senha']           = md5($_POST['senha']);
			$usuario['tipo']            = 'F';
			$usuario['situacao']        = 'A';
 			$data['mensagem'] = "Cadastrado com sucesso!";
			$this->usuario_model->cadastrar($usuario);
			$this->reloadNovo($data);
		}
	}

	public function updateStatus($id){
		$this->load->model('usuario_model');
		$forn = $this->usuario_model->getUsuario($id);
		$data['id'] = $id;
		if($forn['situacao'] == 'A') {
			$data['situacao'] = 'C';
		}else {
			$data['situacao'] = 'A';
		}

		$this->usuario_model->update($data);

		$this->reloadNovo($data);
	}
}
