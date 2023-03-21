
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title><?= $title ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      .form-signin input[type="password"] {
        margin-bottom: 0px !important;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.4/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  


  <body class="text-center">  
  <form class="form-signin" method="post" action="<?php echo base_url()?>cadastrar">
  
  <img class="mb-4" src="<?php echo base_url() ?>application/assets/img/manyminds.png" alt="" width="300" height="100">
	<h1 class="h3 mb-3 font-weight-normal">Por favor, inscreva-se</h1>

  <?php if (isset($erro)){ ?>
  <div class="alert alert-danger" role="alert">
    <?php echo $erro?>
  </div>
  <?php }?>

	<label for="inputNome" class="sr-only">Nome</label>
	<input type="text" name="nome" id="inputNome" class="form-control" placeholder="Seu nome" required autofocus>

	<label for="inputDaTaNascimento" class="sr-only">Data de nascimento</label>
	<input type="date" name="dataNascimento" id="inputDaTaNascimento" class="form-control" placeholder="Data de nascimento" required autofocus>
	
  <label for="inputEmail" class="sr-only">Email</label>
	<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
	

  <label for="inputSenha" class="sr-only">Senha</label>
	<input type="password" name="senha" id="inputSenha" class="form-control" placeholder="Senha" required>



  <label for="tipo" class="sr-only">Tipo usuário</label>
  <select class="form-control" name="tipo" id="tipo">
    <option value="">---Selecione---</option>
    <option value="C">Colaborador</option>
    <option value="F">Fornecedor</option>
  </select>

	<p>
		<a href="<?php base_url()?>store">Já tem uma conta?</a>
	</p>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
</form>

</body>
</html>
