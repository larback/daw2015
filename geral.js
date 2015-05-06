function pesquisar(){
	window.location.href='principal.php?q='+document.getElementById("fNome").value;
}
function carregarCidades(){
	document.forms[0].action = 'cadastro.php';
	document.forms[0].submit();
}

function carregarCidadesU() {
	document.forms[0].action = 'editarPerfil.php';
	document.forms[0].submit();
}

function novoUsuario() {
	if (document.getElementById("nome").value=="") {
		window.alert("Favor informar o nome");
		return false;
	}
	if (document.getElementById("email").value=="") {
		window.alert("Favor informar o email");
		return false;
	}
	if (document.getElementById("login").value=="") {
		window.alert("Favor informar o login");
		return false;
	}
	if (document.getElementById("senha").value=="") {
		window.alert("Favor informar uma senha");
		return false;
	}
	
	if (document.getElementById("senha").value!=document.getElementById("confSenha").value) {
		window.alert("A senha não foi confirmada corretamente. Verifique.");
		return false;
	}
	if (document.getElementById("estado").value==0) {
		window.alert("Selecione um estado");
		return false;
	}

	document.forms[0].action = 'novoUsuario.php';
	document.forms[0].submit();
}
