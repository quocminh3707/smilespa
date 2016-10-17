<?php  
	require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';
	
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
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Danh sách dịch vụ "TÊN KHÁCH"
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>
													<th>Ngày đăng ký</th>
													<th>Dịch vụ</th>
													<th>Điều trị</th>
													<th>Giá dịch vụ</th>
													<th>KM</th>
													<th>Tổng thanh toán</th>
													<th>Lần thanh toán</th>
													<th>Nợ</th>
													<th>Ghi chú</th>
													<th></th>
												</tr>
											</thead>

											<tbody>
													<?php
													$dkdichvu = Model_DangKyDichVu::all();
													foreach($dkdichvu as $row){
													?>
														<tr>
															<th><?php echo $row->created_at ?></th>
															<th><?php echo $row->dichvu->TenDichVu ?></th>
															<th><?php echo $row->dieutri->id ?></th>
															<th><?php echo $row->GiaDichVu ?></th>
															<th><?php
																if($row->KhuyenMai_id == -1){
																	//khong khuyen mai
																	echo "khong";
																}else{
																	//co khuyen mai
																	if($row->khuyenmai->LoaiKM == 1){
																		//tien
																		echo $row->khuyenmai->SoTien. " VND";
																	}else{
																		//phan tram
																		echo $row->khuyenmai->PhanTram. " %";
																	}
																}	
																
															?>
																	
															</th>
															<th></th>
															<th></th>
															<th></th>
															<th></th>
															<td>
																<div class="hidden-sm hidden-xs btn-group">

																	<a data-id="<?php echo $row->id ?>" href="#edit-dieutri" class="btn btn-xs btn-info btn-edit">
																		<i class="ace-icon fa fa-pencil bigger-120"></i>
																	</a>

																	<button class="btn btn-xs btn-danger">
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
					<input type='hidden' name='SoLanDieuTri_id' 
						value='<?php 
						$all_dieutri = Model_DieuTri::all(); 
						foreach($all_dieutri as $dieutri){
							echo $dieutri["id"];
						}

						?>'>
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
									<option value="-1">--- Không khuyến mãi ---</option>
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
								<input type="text" name="NhanVienTuVan" value="" placeholder="Nhân viên tư vấn" class="form-control required" aria-required="true">
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
	$('.btn-edit').click(function (e) {
        edit_ajax($(this).attr('data-id'));
        $('#edit-dieutri').modal();
   });
</script>