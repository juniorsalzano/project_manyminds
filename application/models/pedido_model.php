<?php

class Pedido_model extends CI_Model{

  public function getPedido($pPedidoId){
    $this->db->where("id",$pPedidoId);
    $ped = $this->db->get("pedido")->row_array();
    return $ped;
  }
  
  public function cadastrar($pPedido){
		$this->db->insert('pedido',$pPedido);
    return $this->db->insert_id();
  }

  public function lista($pStatus){
    if ($_SESSION['tipoOperador'] == 'F') {
      $this->db->where('fornecedorId',$_SESSION['id_logado']);
    }

    $pedidos = $this->db->get("pedido")->result_array();
    $pedResult = array();
    $vCount = 0;

    $this->load->model('usuario_model');
    $this->load->model('produto_model');
    $this->load->model('colaboradorpedido_model');
    foreach($pedidos as $ped) {
      $pedResult[$vCount]['id']                    = $ped['id'];
      $pedResult[$vCount]['fornecedorId']          = $ped['fornecedorId'];
      $pedResult[$vCount]['fornecedorDescricao']   = $this->usuario_model->retornaNomeUsuario($ped['fornecedorId']);
      $pedResult[$vCount]['produtoId']             = $ped['produtoId'];
      $pedResult[$vCount]['produtoDescricao']      = $this->produto_model->retornaDescricaoProduto($ped['produtoId']);
      $pedResult[$vCount]['codigo']                = $ped['codigo'];
      $pedResult[$vCount]['descricao']             = $ped['descricao'];
      $pedResult[$vCount]['situacao']              = $ped['situacao'];
      $pedResult[$vCount]['dataPedido']            = $ped['dataPedido'];
      $pedResult[$vCount]['quantidade']            = $ped['quantidade'];
      $pedResult[$vCount]['colaborador']           = $this->colaboradorpedido_model->retornaNomeColaborador($ped['id']);

      if ($pedResult[$vCount]['situacao'] == 'F') {
        $pedResult[$vCount]['situacaoDescricao'] = 'Finalizado';
      } else {
        $pedResult[$vCount]['situacaoDescricao'] = 'Pendente';
      }

      $vCount++;
    }
    return $pedResult;
  }

  public function update($pPedido){
    $this->db->where('id',$pPedido['id']);
    return $this->db->update('pedido',$pPedido);
  }

}


?>