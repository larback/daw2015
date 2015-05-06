<?php
include_once("includes.inc.php");
include_once("permissao.inc.php");
$erro = "";

		$permissoes = array("gif", "jpeg", "jpg", "png", "image/gif", "image/jpeg", "image/jpg", "image/png");
		$temp = explode(".", basename($_FILES["foto"]["name"]));
		$extensao = end($temp);

		if ((in_array($extensao, $permissoes)) && (in_array($_FILES["foto"]["type"], $permissoes))&& ($_FILES["foto"]["size"] < $_POST["MAX_FILE_SIZE"]))
		{
			if ($_FILES["foto"]["error"] > 0)
			{
				$erro = "Erro no envio, código: " . $_FILES["fileName"]["error"];
			}
			else
			{
				$dirUploads = "./profiles/";
	  
				if(!file_exists ( $dirUploads ))
					mkdir($dirUploads, 0700); 
				$pathCompleto = $dirUploads.$_SESSION['sLogin'].".".$extensao;
				if(move_uploaded_file($_FILES["foto"]["tmp_name"], $pathCompleto))
					$geral->confirmaFoto($_SESSION['sLogin'],$pathCompleto);
				else
					$erro = "Problemas ao armazenar o arquivo. Tente novamente.";
			}
		}
		else
		{
			$erro = "Arquivo inválido";
		}
		if ($erro == ""){
			echo "Foto atualizada com sucesso. <a href='principal.php'>Voltar</a>";
			$_SESSION['sArquivoFoto'] = $pathCompleto;
		}else
			echo "Ocorreu um problema ao atualizar a foto.<br />O erro foi descrito internamente como <i>$erro</i>.<br /><a href='alterarImagem.php'>Tente novamente</a>";
?>
