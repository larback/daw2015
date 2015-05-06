<?php
include_once("includes.inc.php");
$login = $_POST['login'];
$senha = $_POST['senha'];
// sempre salvo o útlimo usuario informado em um cookie
setcookie("cLastUser", $login, time()+3600*24*30);
if ($geral->logar($login,$senha,'u')){
	if (isset($_POST['manterConectado'])) {
		setcookie("cYearbook", $_SESSION['sSenha'], time()+3600*24*30);
	}
	include_once("principal.php");
}else{
	$retorno = "Usuário ou senha inválidos. Verifique.";
	include "index.php";
}
?>
