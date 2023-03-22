<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"></h1>
  </div>

  <div class="col-md-12">
  <h5>Cadastro de fornecedores</h5>
    <?php if ((isset($erro)) && ($erro != '')){ ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $erro?>
    </div>
    <?php }?>

    <?php if (isset($mensagem)){ ?>
    <div class="alert alert-success" role="alert">
      <?php echo $mensagem?>
    </div>
    <?php }?>

      
    <form action="<?php echo base_url()?>fornecedor/cadastrar" method="post">

      <div class="col-md-6">
        <div class="form-group">
          <label for="cep">Nome</label>
          <input type="text" class="form-control" name="nome" id="nome" placeholder="Seu nome" value="" required>
        </div>
      </div>
      
      <div class="col-md-6">
        <div class="form-group">
          <label for="dataNascimento">Data de nascimento</label>
          <input type="date" class="form-control" name="dataNascimento" id="dataNascimento"  value="" required>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="" required>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="cidade">Senha</label>
          <input type="password" class="form-control" name="senha" id="senha" value="" required>
        </div>
      </div>

      <div class="col-md-6">
        <button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i>Cadastrar</button>
      </div>
    </form>
  </div>

</main>

