<?php
include_once("includes.inc.php");
//se já estiver logado... vá para a principal
if ( (isset($_SESSION['sRegistro'])) && ($_SESSION['sRegistro']==true)) 
	header("Location: ./principal.php");


if (isset($_COOKIE['cLastUser'])) 
	$lastUser = $_COOKIE['cLastUser'];
else
	$lastUser = "";
if (isset($_COOKIE['cYearbook'])){
	if ($geral->logar($_COOKIE['cLastUser'],$_COOKIE['cYearbook'],'a')){
		//renovo os cookies
		setcookie("cYearbook", $_SESSION['sSenha'], time()+3600*24*30);
		setcookie("cLastUser", $_SESSION['sLogin'], time()+3600*24*30);
		include_once("principal.php");
		die();
	}
}
?>
<div class="hidden-xs col-md-4" >
	<div class="inicio_mensagem">
	Aqui você encontra todos os envolvidos nesta importante etapa da sua formação. Mantenha viva a lembrança da sua pós graduação. Faça já seu <a href="cadastro.php">cadastro</a>. <br />
	<figure class="centroSimples">
		<img src="./imagens/pucminas_virtual.jpg" alt="Logomarca pucminas virtual" />
	</figure>
	</div>
</div>
<div class="col-md-8 col-xs-12">
	<div class="inicio_login">
		<form action="registro.php" method="post">
			<fieldset class="fieldsetLogin">
			<legend>Controle de acesso</legend>
			<?php
			if(isset($retorno)) echo "<div id='retorno'>$retorno</div>";
			?>
				<label for="login" class="labelLogin">Login</label>
				<input type="text" name="login" id="login" placeholder="login" required class="textoMedio" value="<?=$lastUser;?>" />
				<label for="senha" class="labelLogin">Senha</label>
				<input type="password" name="senha" placeholder="*****" id="senha" required class="textoMedio" />
				<div id="manter">
					<input type="checkbox" name="manterConectado" id="manterConectado" class="remember" <?php if(isset($_POST['manterConectado'])) echo " checked ";?>/><label for="manterConectado">Manter conectado</label>
				</div>
				<div  class="btLogin">
					<button type="submit">Logar</button>
				</div>
				<?php
				$participantes = $geral->getAllParticipantesWithFoto();
				foreach ($participantes as $participante) 
					echo "<a href=\"profile.php?user=".$participante['login']."\"><figure class=\"miniaturas\"><img src=\"imagem.php?img=".$participante['arquivoFoto']."\" alt='".$participante['login']."' /></figure></a>";
				?>
			</fieldset>
		</form>
	</div>
</div>			
<?php
include_once("rodape.php");
?>
		</section>
		
	</body>
	
</html>
