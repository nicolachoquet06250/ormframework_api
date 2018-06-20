<?php

/**
 * Fonctionne avec le serveur PHP sous l'URL http://localhost:2107/php/demo.php?referer=...
 */

	require_once 'lib/Autoload.php';
	Auto::load();

	$url_server_v1 = 'meteo-ormf.nicolaschoquet.fr/dev';
	$url_server_v2 = 'localhost/ormframeworkV2/rest';

	$url_server = $url_server_v2;

	if( $request = OrmframeworkRequest::instence($url_server) ) {
		$query = $request->HelloWorld()->test('var1=toto', 'var2=lol');
		$result = $query->go();

		var_dump($result);
	}
