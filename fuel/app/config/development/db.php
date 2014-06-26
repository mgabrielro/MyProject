<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=gm_fuel',
			
			'username'   => 'root',
			'password'   => '',
			'persistent' => true,
		),

		'identifier'     => '`',
	    'table_prefix'   => '',
	    'charset'        => 'utf8',
	    'enable_cache'   => true,
	    
	    'profiling'      => true,
	),
);
