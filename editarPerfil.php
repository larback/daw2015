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
<form action="sEditarPerfil.php" method="post">
<fieldset>
	<legend><h2>Cadastro de usuário</h2></legend>
	<?php
	if (isset($retorno)) {
		echo "<div>$retorno</div>";
	}
	?>
	<div class="divCadastro">
		<label for="nome" class="labelCadastro">Nome</label>
		<input type="text" name="nome" id="nome" placeholder="Nome completo" required value="<?php if (isset($_POST['nome'])) echo $_POST['nome']; else echo $_SESSION['sNome'];?>" />
	</div>
	<div class="divCadastro">
		<label for="email" class="labelCadastro">Email</label>
		<input type="text" name="email" id="email" placeholder="email@servidor" required value="<?php if (isset($_POST['email'])) echo $_POST['email']; else echo $_SESSION['sEmail'];?>" />
	</div>
	<div class="divCadastro">
		<label for="login" class="labelCadastro">Login</label>
		<input type="text" name="login" id="login" placeholder="Login" required value="<?=$_SESSION['sNome'];?>" readonly />
	</div>
	<div class="divCadastro">
		<label for="senha" class="labelCadastro">Estado</label>
		<select name="estado" id="estado" onchange="carregarCidadesU(this.value);"/>
		<?php
			if (!isset($_POST['estado'])) {
				$uf = $geral->getEstadoByCity($_SESSION['sCidade']);
			} else
				$uf=$_POST['estado'];
			$estados = $geral->getUF();
			foreach($estados as $estado) {
				if ($estado['idEstado']==$uf)
					$extra = "selected";
				else
					$extra = "";
				echo "<option value='".$estado['idEstado']."' $extra >".utf8_encode($estado['nomeEstado'])."</option>";
			}
		?>
		</select>
	</div>
	<div class="divCadastro">
		<label for="cidade" class="labelCadastro">Cidade</label>
		<select name="cidade" id="cidade">
			<?php
				if (!isset($_POST['estado']))
					$cidades = $geral->getCidadesByUF($uf);
				else
					$cidades = $geral->getCidadesByUF($_POST['estado']);
					
				foreach($cidades as $cidade) {
					if ($cidade['idCidade']==$_SESSION['sCidade'])
						$extra = "selected";
					else
						$extra = "";
					echo "<option value='$cidade[0]' $extra >".utf8_encode($cidade[1])."</option>";
				}
			?>
		</select>
	</div>
	<div class="divCadastro">
		<label for="descricao" class="labelCadastro">Descrição</label>
		<textarea name="descricao" id="descricao"><?php if (isset($_POST['descricao'])) echo $_POST['descricao']; else echo $_SESSION['sDescricao'];?></textarea>
	</div>
	<div class="divCadastro">
		<label for="novaSenha" class="labelCadastro">Nova Senha</label>
		<input type="password" name="novaSenha" id="novaSenha" placeholder="" value="<?php if (isset($_POST['confSenha'])) echo $_POST['confSenha']; ?>" />
		<div class="avisoPequeno">*Se não desejar alterar a senha, deixe em branco.</div>
	</div>
	<div class="divCadastro">
		<label for="cnovaSenha" class="labelCadastro">Confirme</label>
		<input type="password" name="cnovaSenha" id="cnovaSenha" placeholder="" value="<?php if (isset($_POST['confSenha'])) echo $_POST['confSenha']; ?>" />
	</div>
	<button type="submit">Salvar alterações</button>
</fieldset>
</form>
</div>
