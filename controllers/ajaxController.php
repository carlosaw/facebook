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

      $u = new Usuarios();
      $u->addFriend($_SESSION['lgsocial'], $id);
    }

  }

}