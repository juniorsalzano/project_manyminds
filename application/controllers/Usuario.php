<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct() {
		parent::__construct();
		permission();
  }

	public function signup(){
		$data['title'] = "Novo usuário - Manyminds";
		$this->load->view('pages/signup',$data);
	}

	public function dados() {
		$data['title'] = 'Dados do usuário - Manyminds';
		$data['dadosUsuario'] = $_SESSION['logged_user'];

		if($data['dadosUsuario']['tipo'] == 'C'){
			$data['descTipoUsuario'] = 'Colaborador';
		} else {
			$data['descTipoUsuario'] = 'Fornecedor';
		}

		if ($data['dadosUsuario']['situacao'] == 'A') {
			$data['descSituacaoUsuario'] = 'Ativo';
		} else {
			$data['descSituacaoUsuario'] = 'Inativo';
		}

		$this->load->model('usuarioEndereco_model');
		$data['enderecos'] = $this->usuarioEndereco_model->getUsuarioEndereco($_SESSION['id_logado']);		

		$this->load->view('templates/header'  ,$data);
		$this->load->view('templates/nav-top' ,$data);
		$this->load->view('pages/dadosusuario',$data);
		$this->load->view('templates/footer'  ,$data);
		$this->load->view('templates/js'      ,$data);
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

		if ((!isset($_POST['tipo']) || ($_POST['tipo'] == ''))) {
			$data['erro'] = $data['erro'].'Tipo do usuário não informado.<br>';	
		}
		
		if ($data['erro'] != '') {
			$this->load->view('pages/signup',$data);
		} else {
			$usuario['email'] 					= $_POST['email'];
			$usuario['nome']  					= $_POST['nome'];
			$usuario['dataNascimento']  = $_POST['dataNascimento'];
			$usuario['senha']           = md5($_POST['senha']);
			$usuario['tipo']            = $_POST['tipo'];
			$usuario['situacao']        = 'A';
 			$data['mensagem'] = "Cadastrado com sucesso!";
			$this->usuario_model->cadastrar($usuario);
			$this->load->view('pages/login',$data);
		}
	}

	public function novo(){
		$data['title'] = 'Cadastro de fornecedores - Manyminds';
		$this->load->view('templates/header'   				 ,$data);
		$this->load->view('templates/nav-top'  				 ,$data);
		$this->load->view('pages/form-cadastro-usuario',$data);
		$this->load->view('templates/footer'  				 ,$data);
		$this->load->view('templates/js'      				 ,$data);
	}
}
