<?php
namespace ormframework_api;

class OrmframeworkModel {
	private $name, $request, $path;
	public function __construct($name, $request, $path) {
		$this->name = $name;
		$this->request = $request;

		$path['model'] = $name;
		$this->path = $path;
	}
	
	public function __call($name, $arguments) {
		return $this->method($name, $arguments);
	}

	private function method($name, $args) {
		return (new OrmframeworkMethod($name, $args, $this->request, $this->path))->view();
	}
}