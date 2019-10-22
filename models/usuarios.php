<?php
class Usuarios extends model {

	public function verificarLogin() {//Verifica se tem usuario logado ou não!
		
		//print_r($_SESSION);
		//exit;
		
		//Se não existir a sessão ou existir e estiver vazia redireciona para o login
		if(!isset($_SESSION['lgsocial']) || (isset($_SESSION['lgsocial']) && empty($_SESSION['lgsocial']))) {
			header("Location: ".BASE."login");
			exit;
		}
		
		/*if(isset($_SESSION['lgsocial']) && !empty($_SESSION['lgsocial'])) {
			return true;
		} else {
			return false;
		}*/
	}

	public function logar($email, $senha) {

		$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
		
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();
                        
			$_SESSION['lgsocial'] = $sql['id'];
		
			header("Location :".BASE);
			exit;
			
		} else {
			return "E-mail e/ou senha errados!";
		}
	}

	public function cadastrar($nome, $email, $senha, $sexo) {

		$sql = $this->db->query("SELECT * FROM usuarios WHERE email = '$email'");
		
		if($sql->rowCount() == 0) {

			$sql = $this->db->query("INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = MD5('$senha'), sexo = '$sexo'");
			
			$id = $this->db->lastInsertId();//Loga o usuario cadastrado
			$_SESSION['lgsocial'] = $id;

			header("Location: ".BASE);

		} else {
			return "E-mail já está cadastrado!";
		}
	}

}