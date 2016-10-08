<?php 

require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

session_destroy();
redirect("/".SOURCE_FOLDER);