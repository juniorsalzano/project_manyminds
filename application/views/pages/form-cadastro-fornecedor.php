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
  

  <div class="col-md-12" style="margin-top:50px;">
    <div class="row">

    <?php if (count($fornecedores) > 0) {?>

      <h4 class="mb-3">Fornecedores cadastrados </h4>
      <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Data de nascimento</th>
          <th scope="col">Situação</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($fornecedores as $fornec) {?>
          <tr>
            <td><?php echo $fornec['nome'];?></td>
            <td><?php echo $fornec['email'];?></td>
            <td><?php echo $fornec['dataNascimento'];?></td>
            <td><?php echo ($fornec['situacao'] == 'A') ? 'Ativo' : 'Inativo';?></td>
            <td>

              <?php if ($fornec['situacao'] == 'C') {?>
              <a href="javascript:updateStatusFornecedor('<?php echo base_url().'fornecedor/updatestatus/'.$fornec['id']?>');" class="btn btn-primary btn-sm btn-success">
                <i class="fas fa-thumbs-up"></i> Ativar
              </a> 
              <?php } else {?>

              <a href="javascript:updateStatusFornecedor('<?php echo base_url().'fornecedor/updatestatus/'.$fornec['id']?>');" class="btn btn-primary btn-sm btn-danger">
                <i class="fas fa-thumbs-down"></i> Inativar
              </a> 
              <?php }?>
              
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <?php }?>
    </div>
  </div>
</main>

<script>
  function updateStatusFornecedor(url) {
    if(confirm('Deseja realmente alterar a situação desse fornecedor ?')){
      window.location.href = url;
    } 
  }

</script>

