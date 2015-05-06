<?php
if ( (!isset($_SESSION['sRegistro'])) || ($_SESSION['sRegistro']!=true)) {
	$retorno = "Favor efetuar login.";
	include "index.php";
	die();
}
?>
