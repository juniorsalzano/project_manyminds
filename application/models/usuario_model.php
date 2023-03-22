<?php

class Usuario_model extends CI_Model{
  
  public function cadastrar($pUsuario){
		$this->db->insert('usuario',$pUsuario);
  }

  public function login($pEmail, $pSenha){

    $this->db->where("email",$pEmail);
    $this->db->where("senha",$pSenha);
    $user = $this->db->get("usuario")->row_array();
    return $user;

  }

  public function update($pUsuario){
    $this->db->where('id',$pUsuario['id']);
    return $this->db->update('usuario',$pUsuario);
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

  public function listaFornecedores($pSituacao){
    $this->db->where("tipo"    ,'F');
    if ($pSituacao != 'T') {
      $this->db->where('situacao',$pSituacao);
    }
    $forn = $this->db->get("usuario")->result_array();
    return $forn;
  }

  public function retornaNomeUsuario($pUsuarioId){
    $this->db->where("id",$pUsuarioId);
    $user = $this->db->get("usuario")->row_array();
    return $user['nome'];
  }
}


?>