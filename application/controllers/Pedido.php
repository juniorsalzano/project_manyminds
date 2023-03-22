<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller {

	function __construct() {
		parent::__construct();
		permission();
  }

	public function index(){
		$data['title'] = 'Cadastro de pedidos - Manyminds';
		$this->reloadPedido($data);
	}

	private function reloadPedido($data){
		$data['title'] = 'Cadastro de pedidos - Manyminds';

		$this->load->model('usuario_model');
		$data['lista_fornecedores'] = $this->usuario_model->listaFornecedores('A');

		$this->load->model('produto_model');
		$data['lista_produtos'] = $this->produto_model->lista('A');

		$this->load->view('templates/header'   				 ,$data);
		$this->load->view('templates/nav-top'  				 ,$data);
		$this->load->view('pages/form-pedido-cadastro', $data);
		$this->load->view('templates/footer'  				 ,$data);
		$this->load->view('templates/js'      				 ,$data);
	}

	public function cadastrar(){
		$pedido = array();
		$this->load->model('pedido_model');
		$data['erro'] = '';
	
		if (!isset($_POST['descricao'])) {
			$data['erro'] = $data['erro'].'Descrição do pedido não informado.<br>';	
		}

		if (!isset($_POST['fornecedor'])) {
			$data['erro'] = $data['erro'].'Fornecedor para o pedido não informado.<br>';	
		}

		if (!isset($_POST['produto'])) {
			$data['erro'] = $data['erro'].'Produto do pedido não informado.<br>';	
		}

		if ((!isset($_POST['quantidade'])) && ($_POST['quantidade'] > 0)) {
			$data['erro'] = $data['erro'].'A quantidade do produto precisa ser maior que 0.<br>';	
		}
		
		if ($data['erro'] != '') {
			$this->reloadPedido($data);
		} else {
			$vCodigoPedido = rand();
			$pedido['descricao'] 			 = $_POST['descricao'];
			$pedido['fornecedorId']    = $_POST['fornecedor'];
			$pedido['produtoId']       = $_POST['produto'];
			$pedido['quantidade']      = $_POST['quantidade'];
			$pedido['situacao']        = 'P';
			$pedido['dataPedido']      = Date('d/m/y');
			$pedido['codigo']          = $vCodigoPedido;

 			$data['mensagem'] = "Cadastrado com sucesso! Codigo do pedido: ".$vCodigoPedido;
			$vPedidoId = $this->pedido_model->cadastrar($pedido);

			$colaboradorPedido['usuarioId'] = $_SESSION['id_logado'];
			$colaboradorPedido['pedidoId']  = $vPedidoId;
			$this->load->model('colaboradorpedido_model');
			$this->colaboradorpedido_model->cadastrar($colaboradorPedido);

			$this->reloadPedido($data);
		}
	}

}
