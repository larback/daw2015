<?php
include_once("includes.inc.php");
include_once("permissao.inc.php");
?>
 <div class="col-md-4">
	<div id="about">
	<?php
		include_once("painel.php");
	?>
	</div>
</div>
 <div class="col-md-8">
<div id="mainForm">
<?php
	$lastView="";
	if (!isset($_GET['q'])) {
				$participantes = $geral->getAllParticipantes();
	} else {
				$participantes = $geral->getallParticipantesByName($_GET['q']);
	}
				if (count($participantes)==0)
					echo "Nenhum participante foi encontrado para a pesquisa informada.<br />Volte ao Yearbook completo clicando <a href='principal.php'>aqui</a>";
				
				// Primeiro imprimo os registros que estão armazenados no cookie... na ordem em foram acessados.
				// Imprimo e retiro do vetor...
				if (isset($_COOKIE['cP'])) {
					$vcP = explode ("|",$_COOKIE['cP']);
					foreach ($vcP as $id => $valor ){
						foreach($participantes as $idP => $participante) {
							if ($participante['login']==$valor){
								if ($participante['arquivoFoto']!="")
									$foto=$participante['arquivoFoto'];
								else
									$foto = "./imagens/fotoPerfilPadrao.jpg";
								echo "<a href='profile.php?user=".$participante['login']."'>";
								echo "<figure class=\"album\"><img class=\"fAlbum\" src=\"imagemAlbum.php?img=$foto\" alt='".$participante['login']."' />";
								echo "<figcaption>".$participante['nomeCompleto']."</figcaption></figure></a>";
								unset($participantes[$idP]);
							}
						}
					}
				}
				// Imprimo os que não foram acessados ainda (e portanto, não estão no cookie)
				foreach ($participantes as $participante) {
					if ($participante['arquivoFoto']!="")
						$foto=$participante['arquivoFoto'];
					else
						$foto = "./imagens/fotoPerfilPadrao.jpg";
					echo "<a href='profile.php?user=".$participante['login']."'>";
					echo "<figure class=\"album\"><img class=\"fAlbum\" src=\"imagemAlbum.php?img=$foto\" alt='".$participante['login']."' />";
					echo "<figcaption>".$participante['nomeCompleto']."</figcaption></figure></a>";
				}
				?>
</div>
</div>
<?php
require_once("rodape.php");
?>
