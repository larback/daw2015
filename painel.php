<?php
if ($_SESSION['sArquivoFoto']!="")
						$foto=$_SESSION['sArquivoFoto'];
					else
						$foto = "./imagens/fotoPerfilPadrao.jpg";
?>
<figure class="centroSimples">
	<img id="imagemP" src="imagemPerfil.php?img=<?=$foto;?>" alt="Foto de <?=$_SESSION['sNome'];?>" />
</figure>
<div id="abNome"><?=$_SESSION['sNome'];?></div>
<div id="abEmail"><?=$_SESSION['sEmail'];?></div>
	<nav id="menuP">
	<a class="menuProfile" href="editarPerfil.php">Editar meu perfil</a>
	<a class="menuProfile" href="alterarImagem.php">Alterar minha imagem</a>
	<a class="menuProfile" href="logout.php">Encerrar </a>
	</nav>
	<a href="principal.php">
	<figure class="centroSimples">
		<img src="./imagens/pucminas_virtual.jpg" alt="Logomarca pucminas virtual" />
		<figcaption>Yearbook</figcaption>
	</figure>
	</a>
	
	<h2 id="fTitulo">Procurando alguém?</h2>
	<div class="fCampos">
	<label for="fNome">Nome</label>
	<input type="text" name="fNome" id="fNome" />
	</div>
	<div id="fButton">
	<button type="button" onclick="pesquisar();">Pesquisar</button>
	<br /><br />
	</div>
