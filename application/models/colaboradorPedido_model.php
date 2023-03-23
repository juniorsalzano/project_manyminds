<?php

class ColaboradorPedido_model extends CI_Model{
  
  public function cadastrar($pPedido){
		$this->db->insert('colaborador_pedido',$pPedido);
  }

  public function retornaNomeColaborador($pPedidoId){
    $this->db->where('pedidoId',$pPedidoId);
    $ped = $this->db->get("colaborador_pedido")->row_array();

    $this->load->model('usuario_model');
    $usuario = $this->usuario_model->getUsuario($ped['usuarioId']);
    $nome = $usuario['nome'];
    return $nome;
  }
}


?>