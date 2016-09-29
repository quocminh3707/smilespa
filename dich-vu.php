<?php  
	require './template-top.php'; 
	require './template-left.php'; 
	include_once './include/dbMySql.php';
	$con = new DB_con();
	$res=$con->Select("dichvu");
?>
<div class="page-header">
    <h1>
        Dịch vụ
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Danh sách dịch vụ
        </small>
    </h1>
</div>
<div class="pull-right mr-bottom" >
	<a href="#create-dichvu" role="button" class="btn btn-xs btn-success btn-create" data-toggle="modal">
			<i class="ace-icon fa fa-plus bigger-120"></i>
			Thêm
	</a>
	<a href="#del-dichvu" role="button" class="btn btn-xs btn-danger btn-delete" data-toggle="modal">
			<i class="ace-icon fa fa-trash-o bigger-120"></i>
			Xóa
	</a>
</div>

<table class="table table-bordered table-hover">
	<thead>
	<tr>
		<th class="center">
			<label class="pos-rel">
				<input type="checkbox" class="ace">
				<span class="lbl"></span>
			</label>
		</th>
		<th class="center">Mã dịch vụ</th>
		<th class="center">Tên dịch vụ</th>
		<th class="center">Tên cơ sở</th>
		<th class="center">Tình trạng</th>
		<th class="center">Đơn giá hiện tại</th>
		<th>
		</th>
	</tr>
	</thead>
	<tbody>
			
			
			<?php
			 while($row=mysql_fetch_row($res))
			 {
			   ?>	
						<tr>
						<th class="center">
						<label class="pos-rel">
								<input type="checkbox" class="ace">
								<span class="lbl"></span>
							</label>
						</th>
						<td class="text-center"><?php echo $row[1]; ?></td>
						<td class="text-center"><?php echo $row[2]; ?></td>
						<td class="text-center">
							<?php 
							$coso = $row[3];
							if($coso == "CS1" ){
								echo "Cơ sở Huế";
							}else{
								echo "Cơ sở Sài Gòn";
							}
							?>
						</td>
						<td class="text-center">
						<?php 
							$coso = $row[4];
							if($coso == 0 ){
								echo "Đang sử dụng";
							}else{
								echo "Hết sử dụng";
							}
							?>
						</td>
						<td class="text-center"><?php echo $row[5]; ?></td>
						<td class="text-center">
							<div class="btn-group">
								<button class="btn btn-xs btn-primary btn-price-edit" data-objid="" data-objma="<?php  echo $row[0]; ?>" data-objname="<?php  echo $row[0]; ?>" data-objprice="<?php  echo $row[0]; ?>">
									<i class="ace-icon fa fa-dollar bigger-120"></i>
								</button>
								<button class="btn btn-xs btn-info btn-edit" data-objid="<?php  echo $row[0]; ?>">
									<i class="ace-icon fa fa-pencil bigger-120"></i>
								</button>
								<a href="#del-dichvu" role="button" data-id="<?php  echo $row[0]; ?>" data-name="<?php echo $row[2] ?>" class="btn btn-xs btn-danger btn-delete">
										<i class="ace-icon fa fa-trash-o bigger-120"></i>
										Xóa
								</a>
							</div>
						</td>
						</tr>
						<?php
			 }
			 ?>
			
		
	
	</tbody>
</table>
<div id="result"></div>
<div id="create-dichvu" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="modalTitle">Thêm mới</h4>
				</div>
				<form id="form-validate" method="post" action="DichVu/create.php" class="form-horizontal cmxform" novalidate="novalidate">
					<input type="hidden" name="IDHidden" id="IDHidden" value="">
					<div class="modal-body">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Mã dịch vụ</label>
							<div class="col-sm-9">
								<input type="text" name="MaDichVu" id="MaDichVu" value="" placeholder="Mã dịch vụ" class="form-control required" aria-required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Tên dịch vụ</label>
							<div class="col-sm-9">
								<input type="text" name="TenDichVu" id="TenDichVu" value="" placeholder="Tên dịch vụ" class="form-control required" aria-required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Tình trạng</label>
							<div class="col-sm-9">
								<select name="TinhTrang" id="TinhTrang" class="form-control required" placeholder="Tình trạng" aria-required="true">
									<option value="0">Đang sử dụng</option>
									<option value="1">Hết sử dụng</option>
								</select>
							</div>
						</div>
						<div class="form-group" style="display: none;">
							<label class="col-sm-3 control-label no-padding-right">Mã cơ sở</label>
							<div class="col-sm-9">
								<select name="MaCoSo" id="MaCoSo" class="form-control required" placeholder="Cơ sở" aria-required="true">
									<option value="CS1">Cơ sở Huế</option>
									<option value="CS2">Cơ sở Sài Gòn</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Đơn giá</label>
							<div class="col-sm-9">
								<input type="text" name="DonGia" id="DonGia" value="" placeholder="Đơn giá" class="form-control required" aria-required="true">
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
<div id="del-dichvu" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Xác nhận xóa</h4>
            </div>
            <div class="modal-body" id="msg-delete">Bạn có chắc chắn muốn xóa dịch vụ <b>
				<?php 
				
				?>
				</b> không?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                <a href="javascript:;" class="btn btn-danger" id="msg-link">Có</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script>		
// $(document).ready(function() {

	// $("#submit").click(function(){

			// $.ajax({
			// url: "dichvu/create.php",
			// type: "POST",
			// data: {
				// madichvu: $("#MaDichVu").val(),
				// tendichvu: $("#TenDichVu").val(),
				// trinhtrang: $("#TinhTrang").val(),
				// dongia: $("#DonGia").val()
			// },
			// dataType: "JSON",
			// success: function (jsonStr) {
				// $("#result").text(JSON.stringify(jsonStr));
			// }
		// });

	// }); 

// });
function del(id, name) {
        $('#msg-delete').html('Bạn có chắc chắn muốn xóa khách hàng <b>' + name + '</b> không?');
        $('#msg-link').attr('href', 'http://goldenlotushotel.vn/spa/KhachHang/delete/' + id);
        $('#del-dichvu').modal();
    }
// $(document).ready(function () {
        // $('.btn-edit').click(function (e) {
            // edit_ajax($(this).data('objid'));
        // });
        // $('.btn-create').click(function (e) {
            // create();
        // });
        // $('.btn-delete').click(function (e) {
            // del($(this).data('objid'), $(this).data('objname'));
        // });
        // $('#form-validate').validate();
    // });
		$('.btn-delete').click(function (e) {
			var name = $(this).attr('data-name');
			var id = $(this).attr('data-id');
            del(id, name);
        });
</script>		
					<!-- PAGE CONTENT ENDS -->
<?php  
	require './template-bottom.php'; 
?>