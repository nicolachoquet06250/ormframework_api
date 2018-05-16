<?php

class OrmframeworkMethod {
	private $request, $path;
	public function __construct($name, $arguments, $request, $path) {
		$this->request = $request;

		$path['method'] = $name;
		$path['args'] = $arguments;
		$this->path = $path;
	}

	public function view($name = 'json') {
		return new OrmframeworkView($name, $this->request, $this->path);
	}
}