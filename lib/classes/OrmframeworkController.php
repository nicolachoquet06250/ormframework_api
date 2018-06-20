<?php
namespace ormframework_api;

class OrmframeworkController {
	private $name, $request, $path;
	
	public function __construct($name, $request) {
		$this->name = $name;
		$this->request = $request;
		$this->path = ['controller' => $name];
	}

	public function model() {
		return new OrmframeworkModel($this->name, $this->request, $this->path);
	}
}