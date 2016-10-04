<div id="modal-dangky-dichvu" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="modalTitle">Thêm mới</h4>
				</div>
				<form id="form-dangky-dichvu" method="post" action="" class="form-horizontal cmxform" novalidate="novalidate">
					<input type='hidden' name='user-id'/>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Dich vu</label>
							<div class="col-sm-5">
	                            <select name='dichvu_id'>
	                            	<?php 
	                            	$all_dichvu = Model_DichVu::all();
	                            	foreach($all_dichvu as $dichvu){
	                            		?>
	                            		<option value='<?php echo $dichvu->id ?>'><?php echo $dichvu->MaDichVu ?></option>
	                            		<?php
	                            	}
	                            	?>
	                            </select>
	                        </div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Số điện thoại</label>
							<div class="col-sm-9">
								<input type="text" name="Sdt" id="Sdt" value="" placeholder="Số điện thoại" class="form-control required" aria-required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Email</label>
							<div class="col-sm-9">
								<input type="text" name="Email" id="Email" value="" placeholder="Email" class="form-control required" aria-required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Địa chỉ</label>
							<div class="col-sm-9">
								<input type="text" name="DiaChi" id="DiaChi" value="" placeholder="Địa chỉ" class="form-control required" aria-required="true">
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
<script>
	$(document).ready(function(){
		$(".btn-dangky-dichvu").click(function(){
			var user_id = $(this).closest('tr').attr('data-user-id');
			$('#form-dangky-dichvu').find('input[name="user-id"]').val(user_id);
			$('#modal-dangky-dichvu').modal('show');
		});
	});
</script>