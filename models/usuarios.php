<?php
class Usuarios extends model {
    
    public function verificarLogin() {       
      //print_r($_SESSION);exit;		
		if(!isset($_SESSION['lgsocial']) || (isset($_SESSION['lgsocial']) && empty($_SESSION['lgsocial']))) {
			header("Location: ".BASE."login");
			exit;
		}
		if(isset($_POST['lgsocial']) && !empty($_POST['lgsocial'])) {
			header("Location: ".BASE);
			exit;
		}
	}

	public function logar($email, $senha) {

		$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
		//print_r($sql);exit;
		
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			
			$sql = $sql->fetch();
      $u = new Usuarios();           
			
			$_SESSION['lgsocial'] = $sql['id'];
		
			header("Location: ".BASE);
			exit;
			
		} else {
			return "E-mail e/ou senha errados!";
		}
	}

	public function cadastrar($nome, $email, $senha, $sexo) {

		$sql = "SELECT * FROM usuarios WHERE email = '$email'";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() == 0) {

			$sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = MD5('$senha'), sexo = '$sexo'";
			
			$sql = $this->db->query($sql);
			
			$id = $this->db->lastInsertId();//Loga o usuario cadastrado
			$_SESSION['lgsocial'] = $id;

			header("Location: ".BASE);

		} else {
			return "E-mail já está cadastrado!";
		}
	}

	public function getNome($id) {
		$sql = "SELECT nome FROM usuarios WHERE id = '$id'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();

			return $sql['nome'];
		} else {
			return '';
		}
	}

	public function getDados($id) {
		$array = array();
		$sql = "SELECT * FROM usuarios WHERE id = '$id'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		} 
		return $array;
	}

	public function updatePerfil($array = array()) {
		if(count($array) > 0) {
			$sql = "UPDATE usuarios SET ";

			$campos = array();
			foreach($array as $campo => $valor) {
				$campos[] = $campo." = '".$valor."'";
			}

			$sql .= implode(', ', $campos);
			$sql .= " WHERE id = '".($_SESSION['lgsocial'])."'";

			$this->db->query($sql);
		}
	}
}