<div id="edit-lanthanhtoan" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="font-size:30px !important;" aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="modalTitle">Cập nhật lần thanh toán</h4>
			</div>
			<form id="form-edit-lanthanhtoan" method="post" action="../lanthanhtoan/edit.php" class="form-horizontal cmxform" novalidate="novalidate">
					<input type="text" name="id" id="IDHiddenEDLanThanhToan" value="">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Thanh toán lần 1:</label>
							<div class="col-sm-9">
								<input type="text" name="TTlan1" id="TTlan1ED" value="" placeholder="Thanh toán lần 1" class="form-control required" aria-required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Thanh toán lần 2:</label>
							<div class="col-sm-9">
								<input type="text" name="TTlan2" id="TTlan2ED" value="" placeholder="Thanh toán lần 2" class="form-control" aria-required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Thanh toán lần 3:</label>
							<div class="col-sm-9">
								<input type="text" name="TTlan3" id="TTlan3ED" value="" placeholder="Thanh toán lần 3" class="form-control" aria-required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Thanh toán lần 4:</label>
							<div class="col-sm-9">
								<input type="text" name="TTlan4" id="TTlan4ED" value="" placeholder="Thanh toán lần 4" class="form-control" aria-required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Thanh toán lần 5:</label>
							<div class="col-sm-9">
								<input type="text" name="TTlan5" id="TTlan5ED" value="" placeholder="Thanh toán lần 5" class="form-control" aria-required="true">
							</div>
						</div>
						<!-- <div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Tổng đã thanh toán:</label>
							<div class="col-sm-9">
								<label>----------</label>
							</div>
						</div> -->
					</div>
					<input type='hidden' name='KhachHang_id' value=""/>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Đóng</button>
						<button type="submit" name="submit" class="btn btn-sm btn-primary pull-right">Cập nhật</button>
					</div>
				</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#form-edit-lanthanhtoan').validate({
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