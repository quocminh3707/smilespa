<?php 

require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

echo "<pre>";
print_r($_POST);

if (isset($_POST['submit'])) {

	if($_POST['hinhthuc'] == 0){
		$dichvu = new Model_DichVu();
		$dichvu->MaDichVu = $_POST['MaDichVu'];
		$dichvu->TenDichVu = $_POST['TenDichVu'];
		$dichvu->MaCoSo = $_POST['MaCoSo'];
		$dichvu->TinhTrang = $_POST['TinhTrang'];
		$dichvu->DonGia = $_POST['BuoiLe']['DonGia'];
		$dichvu->hinhthuc = $_POST['hinhthuc'];
		$dichvu->save();
	}else{
		$dichvu = new Model_DichVu();
		$dichvu->MaDichVu = $_POST['MaDichVu'];
		$dichvu->TenDichVu = $_POST['TenDichVu'];
		$dichvu->MaCoSo = $_POST['MaCoSo'];
		$dichvu->TinhTrang = $_POST['TinhTrang'];
		$dichvu->hinhthuc = $_POST['hinhthuc'];
		$dichvu->save();

		//create lieu trinh
		foreach($_POST['LieuTrinh']['DonGia'] as $k => $v){
			$dongia = $v;
			$sobuoi = $_POST['LieuTrinh']['SoBuoi'][$k];

			$lieutrinh = new Model_LieuTrinh();
			$lieutrinh->dongia = $dongia;
			$lieutrinh->sobuoi = $sobuoi;
			$dichvu->lieutrinhs()->save($lieutrinh);

		}

	}
	header("Location: ../dich-vu.php");
}
?>
