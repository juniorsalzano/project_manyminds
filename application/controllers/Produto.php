<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

	function __construct() {
		parent::__construct();
		//permission();
  }

	public function index(){
		$data['title'] = 'Cadastro de produtos - Manyminds';
		$this->reloadProduto($data);
	}

	public function reloadProduto($data){

		$data['title'] = 'Cadastro de produtos - Manyminds';
		
		$this->load->model('usuario_model');
		$data['lista_fornecedores'] = $this->usuario_model->listaFornecedores('A');
		
		$this->load->model('produto_model');
		$data['produtos'] = $this->produto_model->lista('T');		
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

		$vFornecedorId = 0;
		if($_SESSION['tipoOperador'] == 'F') {
			$vFornecedorId = $_SESSION['id_logado'];
		} else {
			$vFornecedorId = isset($_POST['fornecedor']) ? $_POST['fornecedor'] : 0;
		}

		if ( $vFornecedorId == 0 ) {
			$data['erro'] = $data['erro'].'Fornecedor não informado.<br>';	
		} 

		if (!isset($_POST['descricao'])) {
			$data['erro'] = $data['erro'].'Descrição não informado.<br>';	
		}

		if (!isset($_POST['codigo'])) {
			$data['erro'] = $data['erro'].'Código não informado.<br>';	
		} 

		if($data['erro'] == '') {
			if ($this->produto_model->getCodigoFornecedor($_POST['codigo'],$vFornecedorId)) {
				$data['erro'] = $data['erro'].'Código '.$_POST['codigo']. ' já cadastrado para este fornecedor. <br>';
			}
		}

		if ($data['erro'] != '') {
			$this->reloadProduto($data);
		} else {
			$produto['usuarioId']  = $vFornecedorId;
			$produto['codigo']  	 = $_POST['codigo'];
			$produto['descricao']  = $_POST['descricao'];
			$produto['situacao']   = 'A';
			$this->produto_model->cadastrar($produto);
			$data['mensagem'] = "Cadastrado com sucesso!";
			$this->reloadProduto($data);
		}
	}

	public function updatestatus($id){
		$this->load->model('produto_model');
		$forn = $this->produto_model->getProduto($id);
		$data['id'] = $id;
		if($forn['situacao'] == 'A') {
			$data['situacao'] = 'C';
		}else {
			$data['situacao'] = 'A';
		}

		$this->produto_model->update($data);

		$this->reloadProduto($data);
	}
}
