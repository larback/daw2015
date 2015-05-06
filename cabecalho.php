<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" href="estilo.css" />
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
		<script src="geral.js"></script>
		<title>
			Desenvolvimento de Sistemas para Web - 2014 - Pós Graduação - Puc Minas
		</title>
		<meta charset="UTF-8" />
	</head>
	<body>
     <div class="container-fluid">
		 <div class="row">
    <section id="corpo">
		<div class="hidden-xs" >
			<header id="cabecalho">
				<?php
				if ( (isset($_SESSION['sRegistro'])) && ($_SESSION['sRegistro']==true)) {
				?>
				<p id="cadastro">Bem vindo(a) <?=$_SESSION['sLogin'];?>. Para encerrar a utilização do sistema, clique em <a class="discreto" href="logout.php">Sair.</a> </p>
				<?php
				} else {
				?>
				<p id="cadastro">Faz parte desta turma? <a class="discreto" href="cadastro.php">Cadastre-se.</a></p>
				<?php
				}
				?>
				<h1>Desenvolvimento de Sistemas para Web - 2014 <br /> Pós Graduação - Puc Minas</h1>
			</header>
		</div>
		<div class="visible-xs-* hidden-lg hidden-md hidden-sm">
		<header id="cabecalhoPequeno">
			<figure>
				<img src="./imagens/pucminas_virtual.jpg" alt="Logomarca PUC MINAS Virtual" />
			</figure>
				<?php
				if ( (isset($_SESSION['sRegistro'])) && ($_SESSION['sRegistro']==true)) {
				?>
				<p id="cadastro">Bem vindo(a) <?=$_SESSION['sLogin'];?>. Para encerrar a utilização do sistema, clique em <a class="discreto" href="logout.php">Sair.</a> </p>
				<?php
				} else { 
				?>
				<p id="cadastro">Faz parte desta turma? <a class="discreto" href="cadastro.php">Cadastre-se.</a></p>
				<?php
				}
				?>
				<h1>Desenvolvimento de Sistemas para Web - 2014 <br /> Pós Graduação - Puc Minas</h1>
			</header>
		</div>
