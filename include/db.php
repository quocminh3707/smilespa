<?php
	session_start();
	define('SOURCE_FOLDER', 'spa/');
	define('DIRECT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/'. SOURCE_FOLDER);
	require $_SERVER['DOCUMENT_ROOT'] . '/'.SOURCE_FOLDER.'vendor/autoload.php';
	use Illuminate\Database\Capsule\Manager as Capsule;

	$capsule = new Capsule;

	$capsule->addConnection([
	    'driver'    => 'mysql',
	    'host'      => 'localhost',
	    'database'  => 'smilespa',
	    'username'  => 'root',
	    'password'  => '',
	    'charset'   => 'utf8',
	    'collation' => 'utf8_unicode_ci',
	    'prefix'    => '',
	]);

	// Set the event dispatcher used by Eloquent models... (optional)
	use Illuminate\Events\Dispatcher;
	use Illuminate\Container\Container;
	$capsule->setEventDispatcher(new Dispatcher(new Container));

	// Make this Capsule instance available globally via static methods... (optional)
	$capsule->setAsGlobal();

	// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
	$capsule->bootEloquent();

	require_once $_SERVER['DOCUMENT_ROOT'] . '/'.SOURCE_FOLDER.'models/Model_DichVu.php';

foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/'.SOURCE_FOLDER.'models/*.php') as $filename)
{
    require_once $filename;
}