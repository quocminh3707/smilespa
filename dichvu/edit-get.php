<?php

require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

$dichvu = Model_DichVu::find($_GET['id']);

?>

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="modalTitle">Chỉnh sữa</h4>
			</div>
			<form id="form-validate-edit" method="post" action="dichvu/edit.php" class="form-horizontal cmxform" novalidate="novalidate">
				<input type="hidden" name="id" value="<?php echo $dichvu->id ?>">
				<div class="modal-body">
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Mã dịch vụ</label>
						<div class="col-sm-9">
							<input type="text" name="MaDichVu" id="MaDichVu2" value="<?php echo $dichvu->MaDichVu ?>" placeholder="Mã dịch vụ" class="form-control required" aria-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Tên dịch vụ</label>
						<div class="col-sm-9">
							<input type="text" name="TenDichVu" id="TenDichVu2" value="<?php echo $dichvu->TenDichVu ?>" placeholder="Tên dịch vụ" class="form-control required" aria-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Tình trạng</label>
						<div class="col-sm-9">
							<select name="TinhTrang" id="TinhTrang2" class="form-control required" placeholder="Tình trạng" aria-required="true">
								<option <?php if(!$dichvu->TinhTrang) echo "selected" ?> value="0">Đang sử dụng</option>
								<option <?php if($dichvu->TinhTrang) echo "selected" ?> value="1">Hết sử dụng</option>
							</select>
						</div>
					</div>
					<div class="form-group" style="display: none;">
						<label class="col-sm-3 control-label no-padding-right">Mã cơ sở</label>
						<div class="col-sm-9">
							<select name="MaCoSo" id="MaCoSo2" class="form-control required" placeholder="Cơ sở" aria-required="true">
								<option <?php if($dichvu->MaCoSo == "CS1") echo "selected" ?> value="CS1">Cơ sở Huế</option>
								<option <?php if($dichvu->MaCoSo == "CS2") echo "selected" ?> value="CS2">Cơ sở Sài Gòn</option>
							</select>
						</div>
					</div>

					<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Hinh thuc</label>
							<div class="col-sm-9">
								<input type="radio" name="hinhthuc" value='0' <?php if(!$dichvu->hinhthuc) echo "checked" ?>> Buoi le
								<input type="radio" name="hinhthuc" value='1' <?php if($dichvu->hinhthuc) echo "checked" ?>> Lieu trinh
							</div>
					</div>
					<div class="form-group <?php if($dichvu->hinhthuc) echo "hide" ?>" id='edit-tab-BuoiLe'>
							<label class="col-sm-3 control-label no-padding-right">Don gia</label>
							<div class="col-sm-9">
								<input type="text" name="BuoiLe[DonGia]" value="<?php echo $dichvu->DonGia  ?>" class="form-control required" aria-required="true">
							</div>
						</div>
						<div class="form-group <?php if(!$dichvu->hinhthuc) echo "hide" ?>" id='edit-tab-LieuTrinh'>
							<label class="col-sm-3 control-label no-padding-right">
								<button type='button' class='btn-add-edit-lieutrinh btn btn-primary'>+</button>
							</label>
							<div class="col-sm-9" id='edit-listLieuTrinh'>
								<?php
								$lieutrinhs = $dichvu->lieutrinhs()->get();
								if($lieutrinhs->isEmpty()){
									?>
									<div class='row lieu-trinh-row'>
											<div class='col-md-6'>
												<input type="text" required="required" name="LieuTrinh[DonGia][]" value="" placeholder="Đơn giá" class="form-control required" aria-required="true">
											</div>		
											<div class='col-md-4'>
												<input type="text" required="required" name="LieuTrinh[SoBuoi][]" value="" placeholder="So buoi" class="form-control required" aria-required="true">
											</div>
											<div class='col-md-2'>
												<a href='#delete' class='btn-delete-lieutrinh'>x</a>
											</div>
										</div>
									<?php
								}else{
									foreach($lieutrinhs as $lieutrinh){
										?>
										<div class='row lieu-trinh-row'>
											<div class='col-md-6'>
												<input type="text" required="required" name="LieuTrinh[DonGia][]" value="<?php echo $lieutrinh->dongia ?>" placeholder="Đơn giá" class="form-control required" aria-required="true">
											</div>		
											<div class='col-md-4'>
												<input type="text" required="required" name="LieuTrinh[SoBuoi][]" value="<?php echo $lieutrinh->sobuoi ?>" placeholder="So buoi" class="form-control required" aria-required="true">
											</div>
											<div class='col-md-2'>
												<a href='#delete' class='btn-delete-lieutrinh'>x</a>
											</div>
										</div>
										<?php
									}
								}
								
								?>
								
								
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Đóng</button>
					<button type="submit" name="submit" class="btn btn-sm btn-primary pull-right">Lưu</button>
				</div>
			</form>			
<script type="text/javascript">
	$('#form-validate-edit').validate({
            rules: {
            	
            }
        });
	$('#edit-dichvu input[name="hinhthuc"]').change();
</script>

