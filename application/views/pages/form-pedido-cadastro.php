<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"></h1>
  </div>

  <div class="col-md-12">

    <h5>Cadastro de pedidos</h5>
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

    <form action="<?php echo base_url()?>pedido/cadastrar" method="post">

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
        <div class="form-group">
          <label for="numero">Produto</label>
          <select id="produto" name="produto" class="form-control">
          <option>---Selecione---</option>
          <?php foreach($lista_produtos as $prod) {?>
          <option value="<?php echo $prod['id']?>"><?php echo $prod['descricao']?></option>
          <?php }?>
          </select>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="quantidade">Quantidade</label>
          <input type="number" class="form-control" name="quantidade" id="quantidade" placeholder="Quantidade do produto" min="1" value="" required>
        </div>
      </div>

      <div class="col-md-6">
        <button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i>Cadastrar</button>
      </div>
    </form>
  </div>
  
</main>
