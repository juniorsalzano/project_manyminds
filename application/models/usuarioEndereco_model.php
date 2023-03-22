<?php

class UsuarioEndereco_model extends CI_Model{
  
  public function cadastrar($pEndereco){
    $this->load->model("usuarioEndereco_model");
		$this->db->insert('usuario_endereco',$pEndereco);
  }

  public function update($pEndereco){
    $this->db->where('id',$pendereco['id']);
    return $this->db->update('usuario_endereco',$pEndereco);
  }

  public function destroy($pId){
    $this->db->where('id',$pId);
    return $this->db->delete('usuario_endereco');
  }

  public function getUsuarioEndereco($pUsuarioId){
    $this->db->where("usuarioId",$pUsuarioId);
    $end = $this->db->get("usuario_endereco")->result_array();
    return $end;
  }

  public function get($id){
    $this->db->where("id",$id);
    $end = $this->db->get("usuario_endereco")->row_array();
    return $end;
  }
}


?>