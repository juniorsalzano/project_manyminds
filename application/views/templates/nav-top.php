<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">

    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?php echo base_url()?>">
      <b>Manyminds - Sistemas <img src="<?php echo base_url() ?>application/assets/img/manyminds.png" alt="" width="130" height="32"></b>
    </a>
  
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="<?php echo base_url()?>login/logout">Sair</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>usuario/dados/"<?php echo $_SESSION['logged_user']['id']?>>
              <span data-feather="file"></span>
              <img src="<?php echo base_url() ?>application/assets/img/dadosusuario.png" alt="" width="32" height="32">Meus dados
            </a>
          </li>

          <?php if ($_SESSION['tipoOperador'] == 'C') {?>
					<li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>fornecedor/cadastro/novo">
              <span data-feather="file"></span>
              <img src="<?php echo base_url() ?>application/assets/img/cadastrofornecedor.png" alt="" width="32" height="32">Cadastro de fornecedores
            </a>
          </li>
          <?php }?>


          <li class="nav-item">
            <a class="nav-link" href="">
              <span data-feather="shopping-cart"></span>
              <img src="<?php echo base_url() ?>application/assets/img/cadastroprodutos.png" alt="" width="32" height="32">Cadastro de Produtos
            </a>
					</li>

          <?php if ($_SESSION['tipoOperador'] == 'C') {?>
					<li class="nav-item">
            <a class="nav-link" href="">
              <span data-feather="shopping-cart"></span>
              <img src="<?php echo base_url() ?>application/assets/img/novo-pedido.png" alt="" width="32" height="32">Novo Pedidos
            </a>
          </li>
          <?php }?>
          
          <li class="nav-item">
            <a class="nav-link" href="">
              <span data-feather="shopping-cart"></span>
              <img src="<?php echo base_url() ?>application/assets/img/listar-pedido.png" alt="" width="32" height="32">Lista de pedidos
            </a>
          </li>
        </ul>
      </div>
    </nav>
