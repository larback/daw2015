<?php
include_once("includes.inc.php");
include_once("permissao.inc.php");
$atualizacao = $geral->atualizar($_POST['nome'],$_POST['login'],$_POST['cidade'],$_POST['descricao'],$_POST['email'],$_POST['novaSenha'],$_POST['cnovaSenha']);
if ($atualizacao) {
	$retorno = "Cadastro atualizado com sucesso.";
	if ($_POST['novaSenha']!=$_POST['cnovaSenha'])
		$retorno.="<br />A nova senha não foi confirmada corretamente e por isso não foi atualizada.";
	if ($_POST['novaSenha']=="")
		$retorno.="<br />A senha não foi alterada.";
}else
	$retorno = "Ocorreu um erro na atualização. Tente novamente em alguns instantes.";

$retorno.="<br /><br />";
include "editarPerfil.php";
?>
