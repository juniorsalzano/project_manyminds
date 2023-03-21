<?php

  function permission(){

    $ci = get_instance();

    $logged_user = $ci->session->userdata('logged_user');

    if(!$logged_user){
      $ci->session->set_flashdata("danger", "Ops!!! Você precisa estar logado para acessar essa pagina.");
      redirect("login");
    }
    return $logged_user;
  }

?>