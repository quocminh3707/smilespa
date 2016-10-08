<?php  
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

if(!Auth::get()){
	redirect("/".SOURCE_FOLDER. "login.php");
}

	require './template-top.php'; 
	require './template-left.php'; 
?>
<div class="page-header">
    <h1>
        Trang chủ
    </h1>
    <p>
    	<?php 
    	//Kiem tra user co quyen edit
    	if(Auth::get()->permissions->edit){
    		echo "User co kha nang edit";
    	}else{
    		echo "User khong co kha nang edit";
    	}
    	?>
    </p>
</div>

<?php require './template-bottom.php';  ?>
