<?php 

require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

$user = Model_User::where('username', $_POST['username'])
					->where('password', $_POST['password'])
					->first();
if(empty($user)){
	exit(json_encode(array('success' => false, 'message' => 'username or password wrong')));
}else{

	$_SESSION['auth'] = $user->id;
	exit(json_encode(array('success' => true)));
}