<?php
	session_start();
	define('ITEMS_PER_PAGE', 2);
	define('SOURCE_FOLDER', 'spa/');
	define('DIRECT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/'. SOURCE_FOLDER);
	require $_SERVER['DOCUMENT_ROOT'] . '/'.SOURCE_FOLDER.'vendor/autoload.php';
	use Illuminate\Database\Capsule\Manager as Capsule;
	if(isset($_GET['page'])){
		$currentPage = $_GET['page'];
		Illuminate\Pagination\Paginator::currentPageResolver(function () use ($currentPage) {
        	return $currentPage;
    	});
	}else{
		Illuminate\Pagination\Paginator::currentPageResolver(function () {
        	return 1;
    	});
	}
	
	$capsule = new Capsule;

	$capsule->addConnection([
	    'driver'    => 'mysql',
	    'host'      => 'localhost',
	    'database'  => 'spa',
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


Class Auth{
	static function get(){
		if(isset($_SESSION['auth'])){
			return Model_User::find($_SESSION['auth']);
		}else{
			return false;
		}
	}
}

function redirect($url){
	header('location: '. $url);
	exit();
};



if(!isset($_SESSION['coso'])){
	$_SESSION['coso'] = 1;
}


if(isset($_POST['submit_change_coso'])){
	$_SESSION['coso'] = $_POST['CoSo_Id'];
}