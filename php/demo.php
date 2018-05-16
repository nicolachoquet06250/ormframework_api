<?php

/**
 * Fonctionne avec le serveur PHP sous l'URL http://localhost:2107/php/demo.php?referer=...
 */

	require_once 'lib/Autoload.php';
	Auto::load();

	if($request = OrmframeworkRequest::instence('meteo-ormf.nicolaschoquet.fr/dev')) {
		$query = $request->icons()->get();
		$result = $query->go();

		var_dump($result);
	}
