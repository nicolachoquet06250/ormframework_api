<?php
namespace ormframework_api;

class OrmframeworkView {
	/**
	 * @var OrmframeworkRequest $request
	 */
	private $format, $request, $path;
	public function __construct($name = 'json', $request, $path) {
		$this->format = $name;

		$path['view'] = $name;
		$this->request = $request;
		$this->path = $path;
	}

	private function get() {
		$this->request->set_path($this->path);
	}

	public function go() {
		$this->get();
		return $this->request->go();
	}
}