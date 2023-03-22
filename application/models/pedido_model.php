<?php

class Pedido_model extends CI_Model{
  
  public function cadastrar($pPedido){
		$this->db->insert('pedido',$pPedido);
    return $this->db->insert_id();
  }

  public function lista($pStatus){
    if ($pStatus != 'T') {
      $this->db->where('situacao',$pStatus);
    }
    $produtos = $this->db->get("produto")->result_array();
    $prodResult = array();
    $vCount = 0;

    $this->load->model('usuario_model');
    foreach($produtos as $prod) {
      $prodResult[$vCount]['id']          = $prod['id'];
      $prodResult[$vCount]['usuarioId']   = $prod['usuarioId'];
      $prodResult[$vCount]['usuarioNome'] = $this->usuario_model->retornaNomeUsuario($prod['usuarioId']);
      $prodResult[$vCount]['codigo']      = $prod['codigo'];
      $prodResult[$vCount]['descricao']   = $prod['descricao'];
      $prodResult[$vCount]['situacao']    = $prod['situacao'];
      $vCount++;
    }
    return $prodResult;
  }

  public function update($pProduto){
    $this->db->where('id',$pProduto['id']);
    return $this->db->update('produto',$pProduto);
  }

}


?>