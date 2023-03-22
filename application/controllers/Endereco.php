<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endereco extends CI_Controller {

	function __construct() {
		parent::__construct();
		permission();
  }

	private function reload($data){
		$data['dados_endereco'] = array();
		$data['title'] = 'Cadastrar endereço - Manyminds';

		$this->load->view('templates/header'   ,$data);
		$this->load->view('templates/nav-top'  ,$data);
		$this->load->view('pages/form-endereco',$data);
		$this->load->view('templates/footer'   ,$data);
		$this->load->view('templates/js'       ,$data);
	}

	public function index()
	{
		$data = array();
		$this->reload($data);
	}

	public function cadastrar(){
		$endereco = array();
		$data['erro'] = '';

		if (!isset($_POST['endereco'])) {
			$data['erro'] = $data['erro'].'Endereço não informado.<br>';	
		} 

		if (!isset($_POST['cep'])) {
			$data['erro'] = $data['erro'].'CEP não informado.<br>';	
		}

		if (!isset($_POST['numero'])) {
			$data['erro'] = $data['erro'].'Número não informado.<br>';	
		}

		if (!isset($_POST['cidade'])) {
			$data['erro'] = $data['erro'].'Cidade não informado.<br>';	
		}

		if (!isset($_POST['bairro'])) {
			$data['erro'] = $data['erro'].'Bairro não informado.<br>';	
		}

		if (!isset($_POST['estado'])) {
			$data['erro'] = $data['erro'].'Estado não informado.<br>';	
		}

		if ($data['erro'] != '') {
			$this->reload($data);
		} else {
			$this->load->model('usuarioEndereco_model');
			$endereco['endereco']  = $_POST['endereco'];
			$endereco['cep']  		 = $_POST['cep'];
			$endereco['numero']    = $_POST['numero'];
			$endereco['cidade']    = $_POST['cidade'];
			$endereco['bairro']    = $_POST['bairro'];
			$endereco['uf']        = $_POST['estado'];
			$endereco['usuarioId'] = $_SESSION['id_logado'];
			$this->usuarioEndereco_model->cadastrar($endereco);
			redirect('usuario/dados/'.$_SESSION['id_logado']);
		}
	}

	public function editar($pId){
		$data['title'] = 'Editar endereço - Manyminds';

		$this->load->model('usuarioEndereco_model');
		$data['dados_endereco'] = $this->usuarioEndereco_model->get($pId);

		$this->load->view('templates/header'   ,$data);
		$this->load->view('templates/nav-top'  ,$data);
		$this->load->view('pages/form-endereco-edit',$data);
		$this->load->view('templates/footer'   ,$data);
		$this->load->view('templates/js'       ,$data);
	}

	public function update($pEndereco){
		$this->load->model('usuarioEndereco_model');
		$this->usuarioEndereco_model->update($pEndereco);
		redirect('usuario/dados/'.$_SESSION['id_logado']);
	}

	public function deletar($pId){
		$this->load->model('usuarioEndereco_model');
		$this->usuarioEndereco_model->destroy($pId);
		redirect('usuario/dados/'.$_SESSION['id_logado']);
	}

}
