<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"></h1>
  </div>

  <div class="col-md-12">

    <h5>Cadastro de produtos</h5>
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

      
    <form action="<?php echo base_url()?>produto/cadastrar" method="post">

      <div class="col-md-6">
        <div class="form-group">
          <label for="codigo">Codigo</label>
          <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código do produto" value="" required>
        </div>
      </div>
      
      <div class="col-md-6">
        <div class="form-group">
          <label for="descricao">Descrição</label>
          <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" value="" required>
        </div>
      </div>


      <div class="col-md-6">
        <div class="form-group">
          <label for="numero">Fornecedor</label>
          <select id="fornecedor" name="fornecedor" class="form-control">
          <option>---Selecione---</option>
          <?php foreach($lista_fornecedores as $forn) {?>
          <option value="<?php echo $forn['id']?>"><?php echo $forn['nome']?></option>
          <?php }?>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i>Cadastrar</button>
      </div>
    </form>
  </div>
  

  <div class="col-md-12" style="margin-top:50px;">
    <div class="row">

    <?php if (count($produtos) > 0) {?>

      <h4 class="mb-3">Produtos cadastrados </h4>
      <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Código</th>
          <th scope="col">Descrição</th>
          <th scope="col">Fornecedor</th>
          <th scope="col">Situação</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($produtos as $prod) {?>
          <tr>
            <td><?php echo $prod['codigo'];?></td>
            <td><?php echo $prod['descricao'];?></td>
            <td><?php echo $prod['usuarioId'];?></td>
            <td><?php echo ($prod['situacao'] == 'A') ? 'Ativo' : 'Inativo';?></td>
            <td>

              <a href="#" class="btn btn-primary btn-sm btn-warning">
                <i class="fas fa-pencil-alt"></i>
              </a>

              <a href="#" class="btn btn-primary btn-sm btn-danger">
                <i class="fas fa-trash-alt"></i>
              </a> 
              
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <?php }?>
    </div>
  </div>


</main>

