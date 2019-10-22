<?php
class Core {

	public function run() {
		//echo "URL: ".$_GET['url'];
		/*1 = controller
		2 = action
		3,4,5... = parâmetros*/
		$url = '/';
		if(isset($_GET['url'])) {
			$url .= $_GET['url'];
		}

		$params = array(); 

		if(!empty($url) && $url != '/') {//Se url foi enviado e é diferente de só uma barra...

			$url = explode('/', $url);
			array_shift($url);//Remove '/'
			
			$currentController = $url[0].'Controller';
				array_shift($url);//Remove 'Controller'
			
			if(isset($url[0]) && !empty($url[0])) {
				$currentAction = $url[0];
				array_shift($url);//Remove 'Action'
			} else {
				$currentAction = 'index';
			}
			//print_r($url);//Sobram só os parâmetros
			
			if(count($url) > 0) {//Se encontrou armazena na variavel $params
				$params = $url;
			}

		} else {
			$currentController = 'homeController';
			$currentAction = 'index';
		}

		$c = new $currentController();
		call_user_func_array(array($c, $currentAction), $params);

		/*echo '<hr/>';
		echo "CONTROLLER: ".$currentController."<br/>";
		echo "ACTION: ".$currentAction."<br/>";
		echo "PARAMS: ".print_r($params, true)."<br/>";*/
	}

}