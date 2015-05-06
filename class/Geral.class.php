<?php
class Geral {
	const USUARIO = 'baff934a17beef';
	const SENHA = 'cb785761';
	const BANCO = 'formandos2015';
	const PORTA = '3306'; 
	const HOST = 'br-cdbr-azure-south-a.cloudapp.net';
	public function conexao() {
		try {
			$con = new PDO("mysql:host=".self::HOST.";port=".self::PORTA.";dbname=".self::BANCO, self::USUARIO, self::SENHA,  array(PDO::ATTR_PERSISTENT => true));
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
			return $con;
		} catch (PDOExcecption $i) {
			print "Erro: <code>" . $i->getMessage() . "</code>";
			return null;
		}
	}
	public function getParticipante($login) {
		try {
			$con = $this->conexao();
			$st = $con->prepare("select * from participantes where login=?");
			$st->execute(array($login));
			return $st->fetch();
		} catch(PDOException $i) {
			return null;
		}
	}
	public function getAllParticipantes($exceto = "") {
		try {
			$con = $this->conexao();
			$st = $con->prepare("select * from participantes where login<>?");
			$st->execute(array($exceto));
			return $st->fetchAll();
		} catch(PDOException $i) {
			return null;
		}
	}
	public function getAllParticipantesByName($q) {
		try {
			$con = $this->conexao();
			$st = $con->prepare("select * from participantes where nomeCompleto like ?");
			$st->execute(array("%".$q."%"));
			if ($st)
				return $st->fetchAll();
			else {
				print_r($st->errorInfo());
				return false;
			}
		} catch(PDOException $i) {
			return null;
		}
	}
	public function getAllParticipantesWithFoto() {
		try {
			$con = $this->conexao();
			$st = $con->prepare("select * from participantes where arquivoFoto<>''");
			$st->execute();
			return $st->fetchAll();
		} catch(PDOException $i) {
			return null;
		}
	}
	public function getUF() {
		try {
			$con = $this->conexao();
			$st = $con->prepare("select * from estados");
			$st->execute();
			return $st->fetchAll();
		} catch(PDOException $i) {
			return null;
		}
	}
	public function getCidadesByUF($uf) {
		try {
			$con = $this->conexao();
			$st = $con->prepare("select idCidade,nomeCidade from cidades where idEstado=:estado");
			$st->bindParam(':estado',$uf,PDO::PARAM_STR,2);
			$st->execute();
			return $st->fetchAll();
		} catch(PDOException $i) {
			return null;
		}
	}
	public function getCidadeName($codCidade) {
		try {
			$con = $this->conexao();
			$st = $con->prepare("select idCidade,nomeCidade, sigaEstado from cidades inner join estados on cidades.idEstado=estados.idEstado where idCidade=:idCidade;");
			$st->bindParam(':idCidade',$codCidade);
			$st->execute();
			$rs = $st->fetch();
			return utf8_encode($rs['nomeCidade']) . " - " . $rs['sigaEstado'];
		} catch(PDOException $i) {
			return null;
		}
	}
	public function getEstadoByCity($cidade) {
		try {
			$con = $this->conexao();
			$st = $con->prepare("select estados.idEstado from cidades inner join estados on cidades.idEstado=estados.idEstado where idCidade=?");
			$st->execute(array($cidade));
			$rs = $st->fetch();
			return $rs['idEstado'];
		} catch(PDOException $i) {
			return null;
		}
	}
	public function loginLiberado($login){
		$con = $this->conexao();
		$st = $con->prepare("select count(*) from participantes where login=?");
		$st->execute(array($login));
		$rs = $st->fetch();
		if ($rs[0]>=1)
			return false;
		else
			return true;
	}
	public function novoUsuario($nome,$login,$senha,$cidade,$descricao,$email) {
		try {
			$con = $this->conexao();
			$st = $con->prepare("insert into participantes (login,senha,nomeCompleto,cidade,email,descricao) values (?,MD5(?),?,?,?,?)");
			$st->execute(array($login,$senha,$nome,$cidade,$email,$descricao));
			if (!$st){
				print_r($st->errorInfo());
				return false;
			}
			else
				return true;
		} catch(PDOException $i) {
			return false;
		}
	}
	public function atualizar($nome,$login,$cidade,$descricao,$email,$novaSenha,$cnovaSenha) {
		try {
			$con = $this->conexao();
			$sql="update participantes set nomeCompleto=:no, cidade=:ci, email=:em, descricao=:de ";
			if (($novaSenha!="") && ($novaSenha==$cnovaSenha))
				$sql .=",senha=:md5(se) ";
			$sql.= "where login=:lo";
			
			$st = $con->prepare($sql);
			$st->bindParam('no',$nome);
			$st->bindParam('ci',$cidade);
			$st->bindParam('em',$email);
			$st->bindParam('de',$descricao);
			if (($novaSenha!="") && ($novaSenha==$cnovaSenha))
				$st->bindParam('se',$senha);
			$st->bindParam('lo',$login);
			$st->execute();
			if (!$st){
				print_r($st->errorInfo());
				return false;
			}
			else
				return true;
		} catch(PDOException $i) {
			return false;
		}
	}
	public function confirmaFoto($login,$pathCompleto) {
		try{
			$con = $this->conexao();
			$st = $con->prepare("update participantes set arquivoFoto=? where login=?");
			$st->execute(array($pathCompleto,$login));
		} catch(PDOException $i) {
			return false;
		}
	}
	public function logar($login,$senha,$origem) {
		try {
			$sql = "";
			if ($origem=='u')
				$sql = "select * from participantes where login=? and senha=md5(?)";
			else
				$sql = "select * from participantes where login=? and senha=?";
			$con = $this->conexao();
			$st = $con->prepare($sql);
			$st->execute(array($login,$senha));
			if ($st->rowCount()==1) {
				$rs = $st->fetchAll();
				$_SESSION['sRegistro']=true;
				$_SESSION['sNome']=$rs[0]['nomeCompleto'];
				$_SESSION['sLogin']=$rs[0]['login'];
				$_SESSION['sSenha']=$rs[0]['senha'];
				$_SESSION['sArquivoFoto']=$rs[0]['arquivoFoto'];
				$_SESSION['sCidade']=$rs[0]['cidade'];
				$_SESSION['sEmail']=$rs[0]['email'];
				$_SESSION['sDescricao']=$rs[0]['descricao'];
				return true;
			} else {
				//Se o cara errar a senha, elimino o cookie de autologin
				setcookie("cYearbook", null, time()-3600);
				unset($_COOKIE['cYearbook']);
				$_SESSION['sRegistro']=false;
				return false;
			}
		} catch(PDOException $i) {
			return false;
		}
	}
}

