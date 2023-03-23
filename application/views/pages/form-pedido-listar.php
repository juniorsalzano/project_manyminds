<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"></h1>
  </div>

  <div class="col-md-12" style="margin-top:50px;">
    <div class="row">

    <?php if (count($pedidos) > 0) {?>

      <h4 class="mb-3">Lista de pedidos</h4>
      <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Colaborador</th>
          <th scope="col">Fornecedor</th>
          <th scope="col">Produto</th>
          <th scope="col">Código do pedido</th>
          <th scope="col">Descrição</th>
          <th scope="col">Quantidade</th>
          <th scope="col">Situação</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($pedidos as $ped) {?>
          <tr>
            <td><?php echo $ped['colaborador'];?></td>
            <td><?php echo $ped['fornecedorDescricao'];?></td>
            <td><?php echo $ped['produtoDescricao'];?></td>
            <td><?php echo $ped['codigo'];?></td>
            <td><?php echo $ped['descricao'];?></td>
            <td><?php echo $ped['quantidade'];?></td>
            <td><?php echo $ped['situacaoDescricao'];?></td>
            <td>

              <?php if ($ped['situacao'] == 'P') {?>
              <a href="javascript:updateStatusPedido('<?php echo base_url().'pedido/updatestatus/'.$ped['id']?>');" class="btn btn-primary btn-sm btn-primary">
                <i class="fas fa-thumbs-up"></i> Finalizar pedido
              </a> 
              <?php } else { ?>
                <a href="#" class="btn btn-primary btn-sm btn-success">
                <i class="fas fa-thumbs-up"></i> Pedido finalizado
              </a> 
              <?php }?>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <?php } else {?>
        <h5>Não foi registrado nenhum pedido no momento.</h5>
      <?php }?>
    </div>
  </div>
</main>

<script>
  function updateStatusPedido(url) {
    if(confirm('Deseja realmente finalizar esse pedido ?')){
      window.location.href = url;
    } 
  }

</script>

