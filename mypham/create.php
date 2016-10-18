<?php 

require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

if (isset($_POST['submit'])) {

	$mypham = new Model_MyPham();
	$mypham->MaMP = $_POST['MaMP'];
	$mypham->TenMP = $_POST['TenMP'];
	$mypham->MaCoSo = $_POST['MaCoSo'];
	$mypham->Soluong = $_POST['Soluong'];
	$mypham->save();
	$themthanhcong ="<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>
							<i class='ace-icon fa fa-times'></i>
						</button>
						<i class='ace-icon fa fa-hand-o-right'></i>
						Bạn đã thêm mỹ phẩm thành công
					</div>
					";
	$_SESSION['thongbaothem'] = $themthanhcong;
	header("Location: ../danh-muc-my-pham.php");
}
?>
