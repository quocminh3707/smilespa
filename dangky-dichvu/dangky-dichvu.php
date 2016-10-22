<?php  
	require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';
	$KM_id = $_GET["id"];
	$user = Model_KhachHang::find($KM_id);

	
?>

<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />
<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
<link rel="stylesheet" href="../assets/css/smilespa.css" />
<link rel="stylesheet" href="../assets/css/sweetalert.min.css" />

<script src="../assets/js/jquery-2.1.4.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<script src="../assets/js/ace-extra.min.js"></script>
<script src="../assets/js/sweetalert.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.validate.min.js"></script>
<script src="../assets/js/ace-elements.min.js"></script>
<script src="../assets/js/ace.min.js"></script>
<script src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="../assets/js/dataTables.buttons.min.js"></script>
<script src="../assets/js/buttons.flash.min.js"></script>
<script src="../assets/js/buttons.html5.min.js"></script>
<script src="../assets/js/buttons.print.min.js"></script>
<script src="../assets/js/buttons.colVis.min.js"></script>
<script src="../assets/js/dataTables.select.min.js"></script>
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	$(document).ready(function () {
		$('.show-details-btn').on('click', function(e) {
			e.preventDefault();
			$(this).closest('tr').next().toggleClass('open');
			$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
		});
	});

	$("#cauHinhTacNghiep").on("hide.bs.dropdown", function (e) {
		e.preventDefault();
		return false;
	});
	$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<style type="text/css">
	*{
		font-size: 13px;
	}
</style>
<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						
						<div class="page-header">
							<h1>
								Đăng ký dịch vụ
								<i class="ace-icon fa fa-angle-double-right"></i>
								<small>
								Danh sách các dịch vụ mà khách hàng <b style="font-size:17px;"><?php echo $user->Ho." ".$user->Ten; ?>	</b> đã đăng ký
								</small>
							</h1>

						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									
									<div class="col-xs-12">
									<div class="pull-left mr-bottom">
										<a onClick="history.go(-1);" href="" role="button" class="btn btn-xs badge-info">
												<i class="ace-icon fa fa-arrow-left"></i>
												Back
										</a>
									</div>
									<div class="pull-right mr-bottom">
										<a href="#" role="button" class="btn btn-xs btn-success btn-dangky-dichvu" data-toggle="modal">
												<i class="ace-icon fa fa-plus bigger-120"></i>
												Thêm
										</a>
									</div>
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>
													<th class="center">Ngày đăng ký</th>
													<th class="center">Dịch vụ</th>
													<th class="center">Điều trị</th>
													<th class="center">Giá dịch vụ</th>
													<th class="center">KM</th>
													<th class="center">Tổng phải thanh toán</th>
													<th class="center">Tình trạng thanh toán</th>
													<th class="center">Còn nợ lại</th>
													<th></th>
												</tr>
											</thead>

											<tbody>
													<?php
													$dkdichvu = Model_DangKyDichVu::all();
													foreach($dkdichvu as $row){
														if($row->KhachHang_id == $KM_id){

													?>
														
														<tr>
															<th class="center"><?php echo $row->created_at ?></th>
															<th class="center"><?php echo $row->dichvu->TenDichVu ?></th>
															<th class="center"><?php echo "<a href='#'>".$row->SoBuoiDieuTri."</a>" ?></th>
															<th class="center">
																<?php 
																	$giadichvu = $row->GiaDichVu;
																	echo number_format($giadichvu, '0', '.', '.').' VNĐ';
																?>
															</th>
															<th class="center">
															<?php
																if($row->KhuyenMai_id == 0){
																	echo "0";
																}else{
																	if($row->khuyenmai->PhanTram == 0){
																		$tien = $row->khuyenmai->SoTien;
																		echo number_format($tien, '0', '.', '.').' VNĐ';
																	}else{
																		$phantram = $row->khuyenmai->PhanTram;
																		echo number_format($phantram, '0', '.', '.').'%<br>';
																		$tinhphantram = ($row->GiaDichVu/100)*$phantram;
																		echo "( -".number_format($tinhphantram, '0', '.', '.').' VNĐ )';
																	}
																}
															?>
																	
															</th>
															<th class="center">
																<?php 

																	if($row->KhuyenMai_id == 0){
																	//khong khuyen mai
																		$thanhtoan= $row->GiaDichVu;
																		echo number_format($thanhtoan, '0', '.', '.').' VNĐ';
																	}else{
																		if($row->khuyenmai->PhanTram == 0){
																		$tien = $row->khuyenmai->SoTien;
																		$tongthanhtoan = $row->GiaDichVu - $tien;
																		echo number_format($tongthanhtoan, '0', '.', '.').' VNĐ';
																		}else{
																			$phantram = $row->khuyenmai->PhanTram;
																			$tinhphantram = ($row->GiaDichVu/100)*$phantram;
																			$tongthanhtoan = $row->GiaDichVu - $tinhphantram;
																echo number_format($tongthanhtoan, '0', '.', '.' ).' VNĐ';
																		}
																	}	
																 ?>	
															</th>
															<th class="center">
																<?php 
																	// if($row->lanthanhtoan()->get()->isEmpty()){
																	if($row->TTlan1 == 0){	
																		//chua thanh toan
																		echo "<a 
																		data-dangky-id='".$row->id."'
																		data-khachhang-id='".$row->KhachHang_id."' 
																		data-dichvu-id='".$row->DichVu_id."' class='btn btn-xs btn-info btn-lanthanhtoan' href='#lanthanhtoan'>
																		<i class='ace-icon fa fa-plus bigger-120'></i>Chưa thanh toán</a>";
																	}else{
																		$lanTT =  $row->DaThanhToan;
																		echo "<a  class='btn btn-xs btn-warning btn-lanthanhtoan-edit label-warning'><i class='ace-icon fa fa-pencil bigger-120'></i>".number_format($lanTT, '0', '.', '.').' VNĐ'."</a>";
																	// 	."</br>".
																	// 	"<a data-id='' href='#edit-' class='btn btn-xs btn-info btn-edit'>
																	// 	<i class='ace-icon fa fa-pencil bigger-120'></i>
																	// </a>
																	// ";
																	}
																?>	
															</th>
															<th class="center">
																<?php
																if($row->DaThanhToan != 0){
																	if($row->DaThanhToan == $row->NoLai){
																		echo "<span class='btn btn-xs btn-success'>Hết nợ</span>";
																	}else{
																		$nolai = $row->NoLai."<br>";
																		$dathanhtoan =  $row->DaThanhToan;
																		$nosaukhithanhtoan = $nolai - $dathanhtoan;
																		echo number_format($nosaukhithanhtoan, '0', '.', '.' ).' VNĐ';
																	}
																}else{
																echo number_format($row->NoLai, '0', '.', '.' ).' VNĐ';
																}	
																?>
															</th>
															<td>
																<div class="hidden-sm hidden-xs btn-group">

																	<a data-id="<?php echo $row->id ?>" href="#edit-dieutri" class="btn btn-xs btn-info btn-edit">
																		<i class="ace-icon fa fa-pencil bigger-120"></i>
																	</a>

																	<button data-id="<?php echo $row->id ?>" data-name="<?php echo $row->dichvu->TenDichVu; ?>" data-id-khachhang="<?php echo $row->khachhang_id ?>" class="btn btn-xs btn-danger btn-delete-dangkydichvu">
																		<i class="ace-icon fa fa-trash-o bigger-120"></i>
																	</button>
																</div>

																<div class="hidden-md hidden-lg">
																	<div class="inline pos-rel">
																		<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																			<li>
																				<a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																					<span class="blue">
																						<i class="ace-icon fa fa-search-plus bigger-120"></i>
																					</span>
																				</a>
																			</li>

																			<li>
																				<a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																					<span class="green">
																						<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																					</span>
																				</a>
																			</li>
																		</ul>
																	</div>
																</div>
															</td>
														</tr>
													<?php
															}
													 	}
													?>
										
											</tbody>
											<tbody>
												<tr>
													<td class="text-right" colspan="11">Tổng tiền đã thanh toán: 
														<b>300.000vnđ</b>
													</td>
												</tr>
											</tbody>
										</table>
									</div><!-- /.span -->
								</div><!-- /.row -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div>
<div id="edit-dieutri" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="modalTitle">Thêm mới</h4>
			</div>
			<form id="form-edit-dieutri" method="post" action="edit.php" class="form-horizontal cmxform" novalidate="novalidate">
					<input type='hidden' name='id' id="IDHidden2" value=""/>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Dịch vụ</label>
							<div class="col-sm-9">
	                            <select name='DichVu_id' id="DichVu_id">
	                            	<?php 
	                            	$all_dichvu = Model_DichVu::all();
	                            	foreach($all_dichvu as $dichvu){
	                            		?>
	                            		<option value='<?php echo $dichvu["id"]; ?>'>
	                            			<?php
		                            			$dongia = $dichvu["DonGia"];
		                            			echo $dichvu->MaDichVu;echo " - ";echo $dichvu->TenDichVu;echo " - "; echo number_format($dongia, '0', '.', '.').' VNĐ';
	                            			?>
                            			</option>
	                            		<?php
	                            	}
	                            	?>
	                            </select>
	                        </div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Khuyến mãi</label>
							<div class="col-sm-9">
								<select name='KhuyenMai_id'>
									<option value="0">--- Không khuyến mãi ---</option>
	                            	<?php 
	                            	$all_khuyenmai = Model_KhuyenMai::all();
	                            	foreach($all_khuyenmai as $khuyenmai){
	                            		?>
	                            		<option value='<?php echo $khuyenmai->id ?>'>
	                            			<?php
	                            				$sotien = $khuyenmai["SoTien"];
	                            				$laoaikhuyenmai = $khuyenmai["LoaiKM"];
		                            			if($khuyenmai["PhanTram"] == 0 ){
		                            				echo $khuyenmai["MaKM"]." - ";
	                            				 	if($laoaikhuyenmai == "1" ){
														echo "Khuyến mãi tiền mặt";
													}else{
														echo "Khuyến mãi phần trăm";
													}
	                            				 	echo " - ".number_format($sotien, '0', '.', '.').' VNĐ';
		                            			}else{
		                            				echo $khuyenmai["MaKM"]." - ";
		                            				if($laoaikhuyenmai == "1" ){
														echo "Khuyến mãi tiền mặt";
													}else{
														echo "Khuyến mãi phần trăm";
													}
		                            				echo " - ".$khuyenmai["PhanTram"]."%";
		                            			}
	                            			?>
                            			</option>
	                            		<?php
	                            	}
	                            	?>
	                            </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Nhân viên tư vấn</label>
							<div class="col-sm-9">
								<select name='NhanVienTuVan'>
	                            	<?php 
	                            	$all_user = Model_User::all();
	                            	foreach($all_user as $user){
	                            		if($user->level == 3){?>
	                            		<option value='<?php echo $user->id ?>'>
	                            			<?php
	                            				
	                            					echo $user->Ho. $user->Ho;
	                            				
	                            			?>
                            			</option>
                            			
	                            		<?php
	                            		}
	                            	}
	                            	?>
	                            </select>
							</div>
						</div>
						<div class="form-group" style="display: none;">
							<label class="col-sm-3 control-label no-padding-right">Mã cơ sở</label>
							<div class="col-sm-9">
								<select name="CoSo_id" id="CoSo_id" class="form-control required" placeholder="Cơ sở" aria-required="true">
									<option value="0">Cơ sở Huế</option>
									<option value="1">Cơ sở Sài Gòn</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Đóng</button>
						<button type="submit" name="submit" class="btn btn-sm btn-primary pull-right">Lưu</button>
					</div>
				</form>
		</div>
	</div>
</div>
<div id="del-dangkydichvu" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Xác nhận xóa</h4>
            </div>
            <div class="modal-body" id="msg-delete">Bạn có chắc chắn muốn xóa dịch vụ <b>
                </b> không?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                <a href="javascript:;" class="btn btn-danger" id="msg-link">Có</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/spa/lanthanhtoan/modal.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/spa/lanthanhtoan/modal-edit.php'; ?>

<script type="text/javascript">
function edit_ajax(id) {
        $.ajax({
            url: 'get.php?id=' + id,
            type: 'GET',
            dataType: 'html',
            error: function () {
                alert('Ajax error!');
            },
            success: function (json) {
                $('#modalTitle').html('Chỉnh sửa');
                var obj = jQuery.parseJSON(json);
                if (obj == null) {
                    alert('Không lấy được dữ liệu! Xin vui lòng thử lại sau!');
                } else {
                    $('#IDHidden2').val(obj.id);
                    $('#DichVu_id').val(obj.DichVu_id);
                }
            }
        });
    }
    function del(id, name) {
        $('#msg-delete').html('Bạn có chắc chắn muốn xóa khách hàng <b>' + name + '</b> không?');
        $('#msg-link').attr('href', 'delete.php?id=' + id);
        $('#del-dangkydichvu').modal();
    };
	$('.btn-delete-dangkydichvu').click(function (e) {
	        var name = $(this).attr('data-name');
	        var id = $(this).attr('data-id');
	        del(id, name);
	    });	
	$('.btn-edit').click(function (e) {
        edit_ajax($(this).attr('data-id'));
        $('#edit-dieutri').modal();
   });
	$('.btn-lanthanhtoan').click(function (e) {
        // edit_ajax($(this).attr('data-id'));
        var dichvu_id = $(this).attr('data-dichvu-id');
        var khachhang_id = $(this).attr('data-khachhang-id');
        var id = $(this).attr('data-dangky-id');
        $('#update-lanthanhtoan').modal();
        $("#form-update-lanthanhtoan input[name='DichVu_id']").val(dichvu_id);
        $("#form-update-lanthanhtoan input[name='KhachHang_id']").val(khachhang_id);
        $("#form-update-lanthanhtoan input[name='id']").val(id);
   });
	function edit_ajax_lanthanhtoan(id) {
        $.ajax({
            url: '../lanthanhtoan/get.php?id=' + id,
            type: 'GET',
            dataType: 'html',
            error: function () {
                alert('Ajax error!');
            },
            success: function (json) {
                $('#modalTitle').html('Chỉnh sửa');
                var obj = jQuery.parseJSON(json);
                if (obj == null) {
                    alert('Không lấy được dữ liệu! Xin vui lòng thử lại sau!');
                } else {
                    $('#IDHiddenEDLanThanhToan').val(obj.id);
                    $('#TTlan1ED').val(obj.TTlan1);
                    $('#TTlan2ED').val(obj.TTlan2);
                    $('#TTlan3ED').val(obj.TTlan3);
                    $('#TTlan4ED').val(obj.TTlan4);
                    $('#TTlan5ED').val(obj.TTlan5);
                }
            }
        });
    }
	$('.btn-lanthanhtoan-edit').click(function (e) {
        edit_ajax_lanthanhtoan($(this).attr('data-id'));
        var khachhang_id = $(this).attr('data-khachhang-id');
        var id = $(this).attr('data-dangky-id');
        $('#edit-lanthanhtoan').modal();
        $("#form-edit-lanthanhtoan input[name='KhachHang_id']").val(khachhang_id);
        $("#form-update-lanthanhtoan input[name='id']").val(id);
   });
</script>
<?php 
require DIRECT_DIR . 'dangky-dichvu/modal.php';
?>

