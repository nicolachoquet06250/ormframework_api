<?php
namespace ormframework_api;

use ormframework_api\interfaces\IOrmframeworkRequest;

/**
 * Class OrmframeworkRequest
 * 
 * La requette as un controller, un model, une méthode qui as des paramètres
 */

class OrmframeworkRequest implements IOrmframeworkRequest {

	private static $instence = null;
	private $controller, $model, $method, $args, $view;
	private $result_request;
	private $server;

	private function __construct($server) {
		$this->server = $server;
	}

	public static function instence($server = 'localhost', $ssl = false) {
		if(self::$instence === null) {
			$http = 'http'.($ssl ? 's' : '').'://';
			self::$instence = new OrmframeworkRequest($http.$server);
		}
		return self::$instence;
	}

	private function controller($name) {
		return (new OrmframeworkController($name, $this))->model();
	}
	
	public function __call($name, $arguments) {
		if($name !== 'go' && $name !== 'request' && $name!== 'instence' && $name !== 'set_path') {
			return $this->controller($name);
		}
		else {
			return $this->$name($arguments);
		}
	}

	public function set_path($path) {
		$this->controller = $path['controller'];
		$this->model = $path['model'];
		$this->method = $path['method'];
		$this->args = $path['args'];
		$this->view = $path['view'];
	}

	public function go() {
		$args = implode('/', $this->args);
		 echo "Requette : `<a href='{$this->server}/{$this->controller}/{$this->method}/{$args}'>{$this->server}/{$this->controller}/{$this->method}/{$args}</a>`\n<br>";
		// create curl resource
		$ch = curl_init();
		// set url
		curl_setopt($ch, CURLOPT_URL, "{$this->server}/{$this->controller}/{$this->method}/{$args}");
		//return the transfer as a string
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// $output contains the output string
		$output = curl_exec($ch);
		// close curl resource to free up system resources
		curl_close($ch);
		return json_decode($output);
	}
	
	public function request($request = null) {
		if($request !== null) {
			$this->result_request = $request;
		}
		return $this->result_request;
	}
}