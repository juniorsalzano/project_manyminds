<?php

class Usuario_model extends CI_Model{
  
  public function cadastrar($pUsuario){
    $this->load->model("usuario_model");
		$this->db->insert('usuario',$pUsuario);
  }

  public function login($pEmail, $pSenha){

    $this->db->where("email",$pEmail);
    $this->db->where("senha",$pSenha);
    $user = $this->db->get("usuario")->row_array();
    return $user;

  }

  public function getEmail($pEmail){
    $this->db->where("email",$pEmail);
    $user = $this->db->get("usuario")->row_array();
    return $user;
  }

  public function getUsuario($pUsuarioId){
    $this->db->where("id",$pUsuarioId);
    $user = $this->db->get("usuario")->row_array();
    return $user;
  }
}


?>