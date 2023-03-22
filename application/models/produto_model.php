<?php

class Produto_model extends CI_Model{
  
  public function cadastrar($pProduto){
		$this->db->insert('produto',$pProduto);
  }

  public function lista(){
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

  public function getCodigoFornecedor($pCodigo, $pFornecedor){
    $this->db->where("codigo"   ,$pCodigo);
    $this->db->where("usuarioId",$pFornecedor);
    $prod = $this->db->get("produto")->row_array();
    return $prod;
  }

  public function update($pProduto){
    $this->db->where('id',$pProduto['id']);
    return $this->db->update('produto',$pProduto);
  }

  public function getProduto($id){
    $this->db->where("id",$id);
    $prod = $this->db->get("produto")->row_array();
    return $prod;
  }
}


?>