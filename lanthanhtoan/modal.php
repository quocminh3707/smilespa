<div id="update-lanthanhtoan" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button style="font-size:30px !important;" type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="font-size:30px !important;" aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="modalTitle">Cập nhật lần thanh toán</h4>
			</div>
			<form id="form-update-lanthanhtoan" method="post" action="../lanthanhtoan/update-lanthanhtoan.php" class="form-horizontal cmxform" novalidate="novalidate">
					
					<div class="modal-body">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Thanh toán lần 1:</label>
							<div class="col-sm-9">
								<input type="text" name="TTlan1" value="" placeholder="Thanh toán lần 1" class="form-control required" aria-required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Thanh toán lần 2:</label>
							<div class="col-sm-9">
								<input type="text" name="TTlan2" value="" placeholder="Thanh toán lần 2" class="form-control" aria-required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Thanh toán lần 3:</label>
							<div class="col-sm-9">
								<input type="text" name="TTlan3" value="" placeholder="Thanh toán lần 3" class="form-control" aria-required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Thanh toán lần 4:</label>
							<div class="col-sm-9">
								<input type="text" name="TTlan4" value="" placeholder="Thanh toán lần 4" class="form-control" aria-required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Thanh toán lần 5:</label>
							<div class="col-sm-9">
								<input type="text" name="TTlan5" value="" placeholder="Thanh toán lần 5" class="form-control" aria-required="true">
							</div>
						</div>
						<!-- <div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Tổng đã thanh toán:</label>
							<div class="col-sm-9">
								<label>----------</label>
							</div>
						</div> -->
					</div>
					<input type='hidden' name='DichVu_id' value=""/>
					<input type='hidden' name='KhachHang_id' value=""/>
					<input type='hidden' name='id' value=""/>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Đóng</button>
						<button type="submit" name="submit" class="btn btn-sm btn-primary pull-right">Lưu</button>
					</div>
				</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#form-update-lanthanhtoan').validate({
    	rules: {
            TTlan1:{
                number: true,
            },
            TTlan2:{
                number: true,
            },
            TTlan3:{
                number: true,
            },
            TTlan4:{
                number: true,
            },
            TTlan5:{
                number: true,
            },
    	}
    });
</script>