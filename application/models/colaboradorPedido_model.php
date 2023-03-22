<?php

class ColaboradorPedido_model extends CI_Model{
  
  public function cadastrar($pPedido){
		$this->db->insert('colaborador_pedido',$pPedido);
  }
}


?>