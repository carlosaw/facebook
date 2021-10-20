<?php 
class Grupos extends model {

	public function getGrupos() {
    $array = array();

    $sql = "SELECT id, titulo FROM grupos";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
    }
    /*print_r($array);
    exit;*/
    return $array;
	}

  public function criar($titulo) {
    $id_usuario = $_SESSION['lgsocial'];
    // Insere o usuario logado no grupo
    $sql = "INSERT INTO grupos SET id_usuario = '$id_usuario', titulo = '$titulo'";
    $this->db->query($sql);
    $id = $this->db->lastInsertId();

    // Insere o criador do grupo como membro
    $sql = "INSERT INTO grupos_membros SET id_usuario = '$id_usuario', id_grupo = '$id'";
    $this->db->query($sql);
   
    return $id;
    
  }

  public function getInfo($id_grupo) {
    $array = array();

    $sql = "SELECT * FROM grupos WHERE id = '$id_grupo'";
    $sql = $this->db->query($sql) ;

    if($sql->rowCount() > 0) {
      $array = $sql->fetch();
    }

    return $array;
  }
  // Verifica se é membro do grupo
  public function isMembro($id_grupo, $id_usuario) {
    $sql = "SELECT * FROM grupos_membros WHERE id_grupo = '$id_grupo' AND id_usuario = '$id_usuario'";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
  // Pega qtde. de membros do grupo
  public function getQuantMembros($id_grupo) {
    $sql = "SELECT COUNT(*) as c FROM grupos_membros WHERE id_grupo = '$id_grupo'";
    $sql = $this->db->query($sql);
    $sql = $sql->fetch();

    return $sql['c'];
  }
  // Adiciona membro ao grupo
  public function addMembro($id_usuario, $id_grupo) {
    $sql = "INSERT INTO grupos_membros SET id_usuario = '$id_usuario', id_grupo = '$id_grupo'";
    $this->db->query($sql);
  }

}