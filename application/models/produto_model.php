<?php

class Produto_model extends CI_Model{
  
  public function cadastrar($pProduto){
		$this->db->insert('produto',$pProduto);
  }

  public function lista(){
    $forn = $this->db->get("produto")->result_array();
    return $forn;
  }

  public function getCodigoFornecedor($pCodigo, $pFornecedor){
    $this->db->where("codigo"   ,$pCodigo);
    $this->db->where("usuarioId",$pFornecedor);
    $prod = $this->db->get("produto")->row_array();
    return $prod;
  }
}


?>