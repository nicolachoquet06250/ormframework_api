<?php

class Auto {
	public static function load() {
		require_once 'interfaces/IOrmframeworkRequest.php';
		require_once 'classes/OrmframeworkRequest.php';
		require_once 'classes/OrmframeworkController.php';
		require_once 'classes/OrmframeworkModel.php';
		require_once 'classes/OrmframeworkMethod.php';
		require_once 'classes/OrmframeworkView.php';
	}
}