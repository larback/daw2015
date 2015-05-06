<?php
include_once("includes.inc.php");
?>
<form action="novoUsuario.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="1000000" >
	<figure id="vDireita" style="float:right;">
		<img src="./imagens/pucminas_virtual.jpg" alt="Logomarca pucminas virtual" />
	</figure>	
<fieldset>
	<legend><h2>Cadastro de usuário</h2></legend>
	<div class="divCadastro">
		<label for="nome" class="labelCadastro">Nome</label>
		<input type="text" name="nome" id="nome" placeholder="Nome completo" required value="<?php if (isset($_POST['nome'])) echo $_POST['nome']; ?>" />
	</div>
	<div class="divCadastro">
		<label for="email" class="labelCadastro">Email</label>
		<input type="text" name="email" id="email" placeholder="email@servidor" required value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" />
	</div>
	<div class="divCadastro">
		<label for="login" class="labelCadastro">Login</label>
		<input type="text" name="login" id="login" placeholder="Login" required value="<?php if (isset($_POST['login'])) echo $_POST['login']; ?>" />
	</div>
	<div class="divCadastro">
		<label for="senha" class="labelCadastro">Senha</label>
		<input type="password" name="senha" id="senha" placeholder="******" required value="<?php if (isset($_POST['senha'])) echo $_POST['senha']; ?>" />
	</div>
	<div class="divCadastro">
		<label for="confSenha" class="labelCadastro">Confirme</label>
		<input type="password" name="confSenha" id="confSenha" placeholder="******" required value="<?php if (isset($_POST['confSenha'])) echo $_POST['confSenha']; ?>" />
	</div>
	<div class="divCadastro">
		<label for="senha" class="labelCadastro">Estado</label>
		<select name="estado" id="estado" onchange="carregarCidades(this.value);"/>
			<option value=0>Selecione</option>
		<?php
			$estados = $geral->getUF();
			foreach($estados as $estado) {
				if ((isset($_POST['estado'])) && ($_POST['estado']==$estado['idEstado'])) 
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
			if (isset($_POST['estado'])) {
				$estado = $_POST['estado'];
				$cidades = $geral->getCidadesByUF($estado);
				foreach($cidades as $cidade) 
					echo "<option value='$cidade[0]'>".utf8_encode($cidade[1])."</option>";
			} else
				echo "<option value=0>Selecione um estado</option>";
			?>
		</select>
	</div>
	<div class="divCadastro">
		<label for="descricao" class="labelCadastro">Descrição</label>
		<textarea name="descricao" id="descricao"></textarea>
	</div>
	<div class="divCadastro">
		<label for="foto" class="labelCadastro">Foto</label>
		<input type="file" name="foto" id="foto" />
	</div>
	<div class="divCadastro" style="padding-left:100px;">
		<button type="button" onclick="novoUsuario();" style="width:100px;">Salvar</button>
	</div>
</fieldset>
