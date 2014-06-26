<?php

// Load in the Autoloader
require COREPATH.'classes'.DIRECTORY_SEPARATOR.'autoloader.php';
class_alias('Fuel\\Core\\Autoloader', 'Autoloader');

// Bootstrap the framework DO NOT edit this
require COREPATH.'bootstrap.php';


Autoloader::add_classes(array(
	// Add classes you want to override here
	// Example: 'View' => APPPATH.'classes/view.php',
	'KB\\Test'                    => APPPATH.'classes/controller/test.php',
	
	'KB\\Book'                    => APPPATH.'classes/controller/book.php',
	
	'KB\\Strategy\\myStrategy'    => APPPATH.'classes/controller/myStrategy.php',
	
	'KB\\Strategy\\mainInterface' => APPPATH.'classes/controller/myInterface.php',
	
	'KB\\Strategy\\Individual'    => APPPATH.'classes/controller/individual.php',
	'KB\\Strategy\\Metro'         => APPPATH.'classes/controller/metro.php',
	'KB\\Strategy\\Retail'        => APPPATH.'classes/controller/retail.php',


));

// Register the autoloader
Autoloader::register();

/**
 * Your environment.  Can be set to any of the following:
 *
 * Fuel::DEVELOPMENT
 * Fuel::TEST
 * Fuel::STAGING
 * Fuel::PRODUCTION
 */
Fuel::$env = (isset($_SERVER['FUEL_ENV']) ? $_SERVER['FUEL_ENV'] : Fuel::DEVELOPMENT);

// Initialize the framework with the config file.
Fuel::init('config.php');
