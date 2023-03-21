<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"></h1>
  </div>

  <div class="col-md-12">
      
    <form action="<?php echo base_url()?>usuario/<?php echo $_SESSION['id_logado']?>/endereco/cadastrar" method="post">

      <div class="col-md-6">
        <div class="form-group">
          <label for="cep">CEP</label>
          <input type="text" class="form-control" name="cep" id="cep" placeholder="CEP" value="" maxlength="9" required>
        </div>
      </div>
      
      <div class="col-md-6">
        <div class="form-group">
          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço" value="" required>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="numero">Número</label>
          <input type="text" class="form-control" name="numero" id="numero" placeholder="numero" value="" required>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="numero">Número</label>
          <select id="estado" name="estado" class="form-control">
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
          </select>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="cidade">Cidade</label>
          <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" value="" required>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" value="" required>
        </div>
      </div>

      <div class="col-md-6">
          <button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Save</button>
          <a href="<?php echo base_url()?>usuario/dados/<?php echo $_SESSION['id_logado']?>" class="btn btn-primary btn-xs"><i class="fas fa-undo"></i> Voltar</a>
        </div>
      </div>
    </form>
  </div>

</main>

