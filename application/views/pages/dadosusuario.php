<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title><?= $title ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
      </div>

      <div class="row">

        <div class="col-md-8 order-md-1">
          <h4 class="mb-3"><?php echo $dadosUsuario['nome'];?> Situação: <?php echo $descSituacaoUsuario;?> </h4>
          <h4 class="mb-3">Situação: <?php echo $descSituacaoUsuario;?> </h4>
          <form class="needs-validation" novalidate>
          <div>
            <?php if ($dadosUsuario['situacao'] == 'C') {?>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Ativar <?php echo $descTipoUsuario;?></button>
            <?php } else {?>
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Inativar <?php echo $descTipoUsuario;?></button>
            <?php }?>
          </div>  
          
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" value="<?php echo $dadosUsuario['email']?>" readonly>
            </div>

            <div class="mb-3">
              <label for="dataNascimento">Data de Nascimento</label>
              <input type="date" class="form-control" id="dataNascimento" namd="dataNascimento" value="<?php echo $dadosUsuario['dataNascimento']?>" readonly>
            </div>

            <div class="mb3">
              <div class="mb-3">
                <label for="tipo">Tipo usuário</label>
                <input type="tipo" class="form-control" name="tipo" id="tipo" value="<?php echo $descTipoUsuario?>" readonly>
              </div>
            </div>
            
          </form>
        </div>
      </div>
            
      <div class="row" style="margin-top:30px; margin-bottom:30px;">
        <div class="col-md-12 order-md-1">
          <a href="<?php echo base_url()?>usuario/endereco" class="link-dark">
            <img src="<?php echo base_url() ?>application/assets/img/novo-pedido.png" alt="" width="36" height="36">Adicionar novo endereço
          </a>
        </div>
      </div>

      <?php if (count($enderecos) > 0) {?>

        <h4 class="mb-3">Endereços do <?php echo $descTipoUsuario;?> </h4>
        <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">CEP</th>
            <th scope="col">Endereço</th>
            <th scope="col">Número</th>
            <th scope="col">Estado</th>
            <th scope="col">Cidade</th>
            <th scope="col">Bairro</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($enderecos as $end) {?>
            <tr>
              <td><?php echo $end['cep'];?></td>
              <td><?php echo $end['endereco'];?></td>
              <td><?php echo $end['numero'];?></td>
              <td><?php echo $end['uf'];?></td>
              <td><?php echo $end['cidade'];?></td>
              <td><?php echo $end['bairro'];?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php }?>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
  </body>
</html>
