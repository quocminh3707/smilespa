
<div id="modal-dangky-dichvu" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="modalTitle">Thêm mới</h4>
				</div>
				<form id="form-dangky-dichvu" method="post" action="<?php echo "/" . SOURCE_FOLDER. 'dangky-dichvu/create.php'; ?>" class="form-horizontal cmxform" novalidate="novalidate">
					<input type='hidden' name='khachhang_id'/>
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
	                            <select name='DichVu_id'>
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
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Đóng</button>
						<button type="submit" name="submit" class="btn btn-sm btn-primary pull-right">Lưu</button>
					</div>
				</form>
			</div>
		</div>
</div>
<script>
////////////////////////// tim id khachhang cho muc dangky-dichvu
	$(document).ready(function(){
		$(".btn-dangky-dichvu").click(function(){
			var khachhang_id = $(this).closest('tr').attr('data-khachhang-id');
			$('#form-dangky-dichvu').find('input[name="khachhang_id"]').val(khachhang_id);
			$('#modal-dangky-dichvu').modal('show');
		});

	});
	$('#form-dangky-dichvu').validate({
    	rules: {
    		
    	}
    });
</script>
