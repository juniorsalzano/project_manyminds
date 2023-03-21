<?php

class UsuarioEndereco_model extends CI_Model{
  
  public function getUsuarioEndereco($pUsuarioId){
    $this->db->where("usuarioId",$pUsuarioId);
    $end = $this->db->get("usuario_endereco")->result_array();
    return $end;
  }
}


?>