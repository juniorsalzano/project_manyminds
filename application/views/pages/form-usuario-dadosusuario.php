<div class="container">
      <div class="py-5 text-center">
      </div>

      <div class="row">

        <div class="col-md-8 order-md-1">
          <h4 class="mb-3"><?php echo $dadosUsuario['nome'];?> </h4>
          <h4 class="mb-3">Situação: <?php echo $descSituacaoUsuario;?> </h4>
          <form class="needs-validation" novalidate>
          
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
            <th scope="col"></th>
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
              <td>

                <a href="<?php echo base_url()?>usuario/endereco/editar/<?php echo $end['id'];?>" class="btn btn-primary btn-sm btn-warning">
                  <i class="fas fa-pencil-alt"></i>
                </a>

                <a href="javascript:goDelete('<?php echo base_url().'usuario/endereco/deletar/'.$end['id']?>');" class="btn btn-primary btn-sm btn-danger">
                  <i class="fas fa-trash-alt"></i>
                </a> 
                
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php }?>

    </div>
<script>
  function goDelete(url) {
    if(confirm('Deseja realmente excluir esse endereço ?')){
      window.location.href = url;
    } 
  }

</script>
