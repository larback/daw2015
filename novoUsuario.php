<?php
include_once("includes.inc.php");
$login = $_POST['login'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cidade = $_POST['cidade'];
$descricao = $_POST['descricao'];
$erro = "";
if ($geral->loginLiberado($login)) {
	if ($geral->novoUsuario($nome,$login,$senha,$cidade,$descricao,$email)){
		$permissoes = array("jpeg", "jpg", "image/jpeg", "image/jpg");
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
				$pathCompleto = $dirUploads.$login.".".$extensao;
				if(move_uploaded_file($_FILES["foto"]["tmp_name"], $pathCompleto))
					$geral->confirmaFoto($login,$pathCompleto);
				else
					$erro = "Problemas ao armazenar o arquivo. Tente novamente.";
			}
		}
		else
		{
			$erro = "Arquivo inválido - A imagem deve ser um arquivo JPG.";
		}
		if ($erro == "")
			echo "Cadastro efetuado com sucesso.<br /><br />Para acessar o sistema, efetue <a href='index.php'>Login</a>";
		else
			echo "Seu cadastro foi efetuado com sucesso, entretanto, não foi possível enviar sua foto. Assim que possível, edite seu cadastro e reenvie a imagem. <br /><br />Ao tentar salvar o arquivo, nossos servidores retornaram a seguinte mensagem: $erro<br /><br />Para acessar o sistema, efetue <a href='index.php'>Login</a>";
	}else
		echo "Ocorreu um erro interno e o cadastro não pode ser realizado, tente novamente em alguns segundos.";
}else{
	echo "O usuário selecionado já está sendo utilizado. Informe outro.";
	include "cadastro.php";
}
?>
