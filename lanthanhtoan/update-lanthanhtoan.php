<?php 

require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

// echo "<pre>";
// print_r($_POST);
// exit();

// $dangky = Model_DangKyDichVu::find($_POST['dangky_id']);
// print_r($dangky);
// exit();

// if (isset($_POST['submit'])) {

// 	$lanthanhtoan = new Model_DangKyDichVu();
// 	$lanthanhtoan->TTlan1 = $_POST['TTlan1'];
// 	$lanthanhtoan->TTlan2 = $_POST['TTlan2'];
// 	$lanthanhtoan->TTlan3 = $_POST['TTlan3'];
// 	$lanthanhtoan->TTlan4 = $_POST['TTlan4'];
// 	$lanthanhtoan->TTlan5 = $_POST['TTlan5'];
// 	$lanthanhtoan->TongThanhToan = $_POST['TTlan1'] + $_POST['TTlan2'] + $_POST['TTlan3'] + $_POST['TTlan4'] + $_POST['TTlan5'];
	
// 	$lanthanhtoan->DichVu_id = $_POST['DichVu_id'];
// 	$lanthanhtoan->KhachHang_id = $_POST['KhachHang_id'];
// 	$dangky->LanThanhToan_id = $lanthanhtoan->id;
// 	$lanthanhtoan->save();
// 	$suathanhcong ="<div class='alert alert-info'>
// 						<button class='close' data-dismiss='alert'>
// 							<i class='ace-icon fa fa-times'></i>
// 						</button>
// 						<i class='ace-icon fa fa-hand-o-right'></i>
// 						Bạn đã chỉnh sữa lần thanh toán thành công
// 					</div>
// 					";
// 	$_SESSION['thongbaosua'] = $suathanhcong;
// 	header("Location: ../dangky-dichvu/dangky-dichvu.php?id=".$_POST['KhachHang_id']);

// }
if(isset($_POST['id']))
{

	$lanthanhtoan = Model_DangKyDichVu::find($_POST['id']);
	$lanthanhtoan->TTlan1 = $_POST['TTlan1'];
	$lanthanhtoan->TTlan2 = $_POST['TTlan2'];
	$lanthanhtoan->TTlan3 = $_POST['TTlan3'];
	$lanthanhtoan->TTlan4 = $_POST['TTlan4'];
	$lanthanhtoan->TTlan5 = $_POST['TTlan5'];
	$lanthanhtoan->DaThanhToan = $_POST['TTlan1'] + $_POST['TTlan2'] + $_POST['TTlan3'] + $_POST['TTlan4'] + $_POST['TTlan5'];
	
	$lanthanhtoan->save();
	$suathanhcong ="<div class='alert alert-info'>
						<button class='close' data-dismiss='alert'>
							<i class='ace-icon fa fa-times'></i>
						</button>
						<i class='ace-icon fa fa-hand-o-right'></i>
						Bạn đã chỉnh sữa lần thanh toán thành công
					</div>
					";
	$_SESSION['thongbaosua'] = $suathanhcong;
	header("Location: ../dangky-dichvu/dangky-dichvu.php?id=".$_POST['KhachHang_id']);
	
}

?>
