<?php
include_once("./class/Geral.class.php");
$geral = new Geral();
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto de interfaces para web - Atividade Aberta 05</title>
	<style>
		body {
			padding-bottom: 10px;
		}
	</style>
	<script src="geral.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<div class="container-fluid">
	<div class="row">
		
	<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Barra de navegação</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Pós Graduação - PUC Minas</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="http://www.larback.com.br">Site do autor</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search" action="https://www.google.com.br/search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Pesquisar" required name="q">
        </div>
        <button type="submit" class="btn btn-default">Enviar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
	  <ul class="nav navbar-nav">
        <li><a href="cadastro.php">Cadastre-se</a></li>
      </ul>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Links úteis <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="http://getbootstrap.com/">Bootstrap</a></li>
            <li><a href="http://foundation.zurb.com/">Foundation</a></li>
            <li><a href="http://www.bootply.com/">Bootply</a></li>
            <li class="divider"></li>
            <li><a href="http://www.pucminas.br/">Puc - Minas</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>			
		
		
		
		
		
		
<form action="novoUsuario.php" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
	<input type="hidden" name="MAX_FILE_SIZE" value="1000000" >
<fieldset>
	<legend><h2>Cadastro de usuário</h2></legend>
		<label for="nome" class="col-sm-2 control-label hidden-xs ">Nome</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome completo" required value="<?php if (isset($_POST['nome'])) echo $_POST['nome']; ?>" />
	</div>
		<label for="email" class="col-sm-2 control-label hidden-xs ">Email</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" name="email" id="email" placeholder="email@servidor" required value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" />
	</div>
		<label for="login" class="col-sm-2 control-label hidden-xs ">Login</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" name="login" id="login" placeholder="Login" required value="<?php if (isset($_POST['login'])) echo $_POST['login']; ?>" />
	</div>
		<label for="senha" class="col-sm-2 control-label hidden-xs ">Senha</label>
	<div class="col-sm-10">
		<input type="password" class="form-control" name="senha" id="senha" placeholder="******" required value="<?php if (isset($_POST['senha'])) echo $_POST['senha']; ?>" />
	</div>
		<label for="confSenha" class="col-sm-2 control-label hidden-xs ">Confirme</label>
	<div class="col-sm-10">
		<input type="password"class="form-control" name="confSenha" id="confSenha" placeholder="******" required value="<?php if (isset($_POST['confSenha'])) echo $_POST['confSenha']; ?>" />
	</div>
		<label for="senha" class="col-sm-2 control-label hidden-xs ">Estado</label>
	<div class="col-sm-10">		
		<select name="estado" class="form-control" id="estado" onchange="carregarCidades(this.value);"/>
			<option value=0>Selecione</option>
		<?php
			$estados = $geral->getUF();
			foreach($estados as $estado) {
				if ((isset($_POST['estado'])) && ($_POST['estado']==$estado['idEstado'])) 
					$extra = "selected";
				else
					$extra = "";
				echo "<option value='".$estado['idEstado']."' $extra >".utf8_encode($estado['nomeEstado'])."</option>";
			}
		?>
		</select>
	</div>
		<label for="cidade" class="col-sm-2 control-label hidden-xs ">Cidade</label>
	<div class="col-sm-10">
		<select name="cidade" class="form-control" id="cidade">
			<?php
			if (isset($_POST['estado'])) {
				$estado = $_POST['estado'];
				$cidades = $geral->getCidadesByUF($estado);
				foreach($cidades as $cidade) 
					echo "<option value='$cidade[0]'>".utf8_encode($cidade[1])."</option>";
			} else
				echo "<option value=0>Selecione um estado</option>";
			?>
		</select>
	</div>
		<label for="descricao" class="col-sm-2 control-label">Descrição</label>
	<div class="col-sm-10">	
		<textarea name="descricao" class="form-control" id="descricao"></textarea>
	</div>
		<label for="foto" class="col-sm-2 control-label">Foto</label>
	<div class="col-sm-10">
		<input type="file" name="foto" id="foto" />
	</div>
	<div class="col-sm-10">
		<button type="button" onclick="novoUsuario();" class="btn btn-primary btn-lg">Salvar</button>
	</div>
</fieldset>

	<footer>
	<div class="col-md-12" style="text-align:center;" >
		<figure>
			<img src="./imagens/pucminas_virtual.jpg" alt="Logomarca puc minas" />
		</figure>
    </div>
   </footer>
   </div>
</div>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	
	
  </body>
</html>
