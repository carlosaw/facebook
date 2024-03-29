<?php 
class Posts extends model {

  public function addPost($msg, $foto, $id_grupo = '0') {
    $usuario = $_SESSION['lgsocial'];
		$tipo = 'texto';
		$url = '';
		if(count($foto) > 0) {
			$tipos = array('image/jpeg', 'image/jpg', 'image/png');
			if(in_array($foto['type'], $tipos)) {
				$tipo = 'foto';

				$url = md5(time().rand(0,999));
				switch($foto['type']) {
					case 'image/jpeg':
					case 'image/jpg':
						$url .= '.jpg';
						break;
					case 'image/png':
						$url .= '.png';
						break;
				}
				move_uploaded_file($foto['tmp_name'], 'assets/images/posts/'.$url);
			}
    }

    $sql = "INSERT INTO posts SET id_usuario = '$usuario', data_criacao = NOW(), tipo = '$tipo', texto = '$msg', url = '$url', id_grupo = '$id_grupo'";
    $this->db->query($sql);

  }

	public function getFeed($id_grupo = '0') {
		$array = array();

		$r = new Relacionamentos();
		$ids = $r->getIdsFriends($_SESSION['lgsocial']);
		$ids[] = $_SESSION['lgsocial'];

		$sql = "SELECT
		*,
		(select usuarios.nome from usuarios where usuarios.id = posts.id_usuario) as nome,
		(select count(*) from posts_likes where posts_likes.id_post = posts.id) as likes,
		(select count(*) from posts_likes where posts_likes.id_post = posts.id and posts_likes.id_usuario = '".$_SESSION['lgsocial']."') as liked,
		(select count(*) from posts_comentarios where posts_comentarios.id_post = posts.id and posts_comentarios.id_usuario = '".$_SESSION['lgsocial']."') as comentarios
		
		FROM posts
		WHERE id_usuario IN (".implode(',', $ids).") AND id_grupo = '$id_grupo'
		ORDER BY data_criacao DESC";
		$sql = $this->db->query($sql);  

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
			foreach ($array as $post) {
				$post['comentarios'] = $this->buscarComentarios($post['id']);
				$posts[] = $post;
			}
		}
		/*print_r($array);
		exit;*/
		if($array) {
			return $posts;
		} else {
			return $array;
		}
		
	}

	public function isLiked($id, $id_usuario) {
		$sql = "SELECT * FROM posts_likes WHERE id_post = '$id' AND id_usuario = '$id_usuario'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function removeLike($id, $id_usuario) {
		$this->db->query("DELETE FROM posts_likes WHERE id_post = '$id' AND id_usuario = '$id_usuario'");
	}

	public function addLike($id, $id_usuario) {
		$this->db->query("INSERT INTO posts_likes SET id_post = '$id', id_usuario = '$id_usuario'");
	}

	public function addComentario($id, $id_usuario, $txt) {
		
			$sql = "INSERT INTO posts_comentarios SET id_post = '$id', id_usuario = '$id_usuario',
			data_criacao = NOW(), texto = '$txt'";
			$this->db->query($sql);
		
	}

	public function buscarComentarios($id_post) {
		$array = array();
		$sql = "SELECT *,
								 (select usuarios.nome from usuarios where usuarios.id = posts_comentarios.id_usuario) AS nome,
								 texto FROM posts_comentarios WHERE id_post = '$id_post'";
			$sql = $this->db->query($sql);
			$array = $sql->fetchAll();
		return $array;
	 }
	 
}