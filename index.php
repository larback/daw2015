<<<<<<< HEAD
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

<div class="alert alert-danger fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Fechar</span></button>
      <h4>Seja bem vindo!</h4>
      <p>Aqui você encontra todos os alunos do curso de especialização em <i>Desenvolvimento de sistemas para web</i> da PUC Minas. Se você faz parte desta turma e ainda não se cadastrou, <a href='cadastro.php'>cadastre-se</a> agora mesmo!</p>
      
</div>


	 <?php
    $participantes = $geral->getAllParticipantes();
					foreach ($participantes as $participante) {
						echo "<div class=\"col-sm-6 col-md-4 col-lg-3\">";
						if ($participante['arquivoFoto']!="")
							$foto=$participante['arquivoFoto'];
						else
							$foto = "./imagens/fotoPerfilPadrao.jpg";
						echo "<a href='profile.php?user=".$participante['login']."'>";
						echo "<figure ><img src=\"imagemAlbum.php?img=$foto\" alt='".$participante['login']."' />";
						echo "<figcaption>".$participante['nomeCompleto']."</figcaption></figure></a>";
						echo "</div>";
					}
	?>
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
=======

>>>>>>> 2b1ef551391ab76816b8fc26bafc7580bd879ee1
