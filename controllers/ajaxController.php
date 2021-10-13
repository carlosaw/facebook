<?php
class ajaxController extends controller {

	public function __construct() {
		parent::__construct();		
		$u = new Usuarios();
		$u->verificarLogin();		
	}

	public function index() {}

  public function add_friend() {

    if(isset($_POST['id']) && !empty($_POST['id'])) {
      $id = addslashes($_POST['id']);

      $r = new Relacionamentos();
      $r->addFriend($_SESSION['lgsocial'], $id);
    }

  }

  public function aceitar_friend() {

    if(isset($_POST['id']) && !empty($_POST['id'])) {
      $id = addslashes($_POST['id']);

      $r = new Relacionamentos();
      $r->aceitarFriend($_SESSION['lgsocial'], $id);
    }

  }

}