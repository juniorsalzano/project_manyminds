<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

	function __construct() {
		parent::__construct();
		permission();
  }

	public function index(){
		$data['title'] = 'Cadastro de produtos - Manyminds';
		$this->reloadProduto($data);
	}

	public function reloadProduto($data){
		$data['title'] = 'Cadastro de produtos - Manyminds';

		$this->load->model('usuario_model');
		$data['lista_fornecedores'] = $this->usuario_model->listaFornecedores();
		
		$this->load->model('produto_model');
		$data['produtos'] = $this->produto_model->lista();
		
		$this->load->view('templates/header'   				 ,$data);
		$this->load->view('templates/nav-top'  				 ,$data);
		$this->load->view('pages/form-produto-cadastro',$data);
		$this->load->view('templates/footer'  				 ,$data);
		$this->load->view('templates/js'      				 ,$data);
	}

	public function cadastrar(){
		$usuario = array();
		$this->load->model('produto_model');
		$data['erro'] = '';

		if (!isset($_POST['descricao'])) {
			$data['erro'] = $data['erro'].'Descrição não informado.<br>';	
		}

		if (!isset($_POST['codigo'])) {
			$data['erro'] = $data['erro'].'Código não informado.<br>';	
		} 

		if (!isset($_POST['fornecedor'])) {
			$data['erro'] = $data['erro'].'Fornecedor não informado.<br>';	
		}

		if($data['erro'] == '') {
			if ($this->produto_model->getCodigoFornecedor($_POST['codigo'],$_POST['fornecedor'])) {
				$data['erro'] = $data['erro'].'Código '.$_POST['codigo']. ' já cadastrado para este fornecedor. <br>';
			}
		}
		
		if ($data['erro'] != '') {
			$this->reloadProduto($data);
		} else {
			$produto['usuarioId']  = $_POST['fornecedor'];
			$produto['codigo']  	 = $_POST['codigo'];
			$produto['descricao']  = $_POST['descricao'];
			$produto['situacao']        = 'A';
			$this->produto_model->cadastrar($produto);
			$data['mensagem'] = "Cadastrado com sucesso!";
			$this->reloadProduto($data);
		}
	}

}
