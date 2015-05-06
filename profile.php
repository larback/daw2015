<?php
include_once("includes.inc.php");
include_once("permissao.inc.php");
?>
<div id="about">
	<?php
		include_once("painel.php");
	?>
</div>
<div id="mainForm">
	<?php
		$participante = $geral->getParticipante($_GET['user']);
		// cookie com o último visualizado
		if (!isset($_COOKIE['cP']))
			setcookie("cP", $_GET['user'], time()+3600*24*30);
		else{
			$vcP = explode("|",$_COOKIE["cP"]);
			foreach($vcP as $id=>$valor){
				if ($valor==$_GET['user']){
					unset($vcP[$id]); 
				}
			}
			array_unshift($vcP, $_GET['user']);
			$sVcP = implode("|",$vcP);
			setcookie("cP",$sVcP, time()+3600*24*30);
		}
		
		if ($participante['arquivoFoto']!="")
			$foto=$participante['arquivoFoto'];
		else
			$foto = "./imagens/fotoPerfilPadrao.jpg";
	?>
		<figure class="profileImagem" ><img src="imagem.php?img=<?=$foto;?>&w=250&h=250" alt="<?=$participante['login'];?>" /></figure>
		<h1><?=$participante['nomeCompleto'];?></h1>
		<p><?=$participante['email'];?></p>
		<p><?=$geral->getCidadeName($participante['cidade']);?></p>
		<p>Descrição: <?=nl2br($participante['descricao']);?></p>
		<p>Voltar para o <a href="principal.php">Yearbook</a></p>
		
</div>
