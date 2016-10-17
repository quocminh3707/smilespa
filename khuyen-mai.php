<?php  
	require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';
	require DIRECT_DIR . 'template-top.php'; 
	require DIRECT_DIR . 'template-left.php'; 
	
?>
<div class="page-header">
    <h1>
        Khuyến mãi
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Danh sách khuyến mãi
        </small>
    </h1>
</div>
<form id='form-delete-selected' action='khuyenmai/delete-selected.php' method='post'>
	
	<div class="pull-right mr-bottom" >
		<a href="#create-khuyenmai" role="button" class="btn btn-xs btn-success btn-create" data-toggle="modal">
				<i class="ace-icon fa fa-plus bigger-120"></i>
				Thêm
		</a>
		<a href="#del-khuyenmai" role="button" class="btn btn-xs btn-danger btn-delete-selected">
				<i class="ace-icon fa fa-trash-o bigger-120"></i>
				Xóa
		</a>
	</div>

	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" id='select-all' class="">
						<span class="lbl"></span>
					</label>
				</th>
				<th class="center">Mã khuyến mãi</th>
                <th class="center">Tên khuyến mãi</th>
				<th class="center">Thành tiền</th>
				<th class="center">Loại khuyến mãi</th>
				<th class="center">Cơ sở</th>
				<th>
				</th>
			</tr>
		</thead>
		<tbody>
				
				
				<?php
				$all_khuyenmai= Model_KhuyenMai::all()->toArray();
				 foreach($all_khuyenmai as $row)
				 {
				   ?>	
							<tr>
							<th class="center">
							<label class="pos-rel">
									<input type="checkbox" class='row-select' name='selected[]' value='<?php echo $row['id'] ?>' class="ace">
									<span class="lbl"></span>
								</label>
							</th>
							<td class="text-center"><?php echo $row['MaKM']; ?></td>
                            <td class="text-center"><?php echo $row['TenKM']; ?></td>
							<td class="text-center">
								<?php  
									$sotien = $row['SoTien'];
									$phantram = $row['PhanTram'];
									if($sotien == 0 & $phantram != 0){

										echo $phantram."%";
									}else{
										echo number_format($sotien, '0', '.', '.').' VNĐ';
										
									}
								?>
							</td>
							<td class="text-center">
								<?php 
								$LoaiKM = $row['LoaiKM'];
								if($LoaiKM == "1" ){
									echo "Khuyến mãi tiền mặt";
								}else{
									echo "Khuyến mãi phần trăm";
								}
								?>
							</td>
							<td class="text-center">
								 <?php 
                                $macoso = $row['MaCoSo'];
                                if($macoso == "CS1" ){
                                    echo "CS Huế";
                                }else{
                                    echo "CS Sài Gòn";
                                }
                                ?>
							</td>
							<td class="text-center">
								<div class="btn-group">
									<a href="#edit-khuyenmai" role="button" data-id="<?php  echo $row['id']; ?>" data-name="<?php echo $row['MaKM'] ?>" class="btn btn-xs btn-info btn-edit">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
											Sữa
									</a>
									<a href="#del-khuyenmai" role="button" data-id="<?php  echo $row['id']; ?>" data-name="<?php echo $row['MaKM'] ?>" class="btn btn-xs btn-danger btn-delete">
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


</form>
<div id="create-khuyenmai" class="modal fade" tabindex="-1">
		<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="modalTitle">Thêm mới</h4>
            </div>
            <form id="form-validate-create" method="post" action="khuyenmai/create.php" class="form-horizontal" novalidate="novalidate">
                <div class="modal-body">
                    <input type="hidden" name="IDHidden" id="IDHidden" value="">
                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right">Mã khuyến mãi</label>
                        <div class="col-sm-8">
                            <input type="text" name="MaKM" id="MaKM" value="" placeholder="Mã khuyến mãi" class="form-control required" aria-required="true">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right">Tên khuyến mãi</label>
                        <div class="col-sm-8">
                            <input type="text" name="TenKM" id="TenKM" value="" placeholder="Tên khuyến mãi" class="form-control required" aria-required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right">Loại khuyến mãi</label>
                        <div class="col-sm-8">
                            <select name="LoaiKM" id="LoaiKM" class="form-control required" onchange="khuyenmai(this.value);" aria-required="true">
                                <option value="1" selected>Khuyến mãi tiền mặt</option>
								<option value="2">Khuyến mãi phần trăm</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="khuyenmai-tien">
                        <label class="col-sm-4 control-label no-padding-right">Tiền khuyến mãi</label>
                        <div class="col-sm-8">
                            <input type="text" name="SoTien" id="SoTien" value="" placeholder="Tiền khuyến mãi" class="form-control required" aria-required="true">
                        </div>
                    </div>
                    <div class="form-group" id="khuyenmai-phantram" style="display: none;">
                        <label class="col-sm-4 control-label no-padding-right">Phần trăm khuyến mãi</label>
                        <div class="col-sm-8">
                            <input type="text" name="PhanTram" id="PhanTram" value="" placeholder="Phần trăm khuyến mãi" class="form-control required" aria-required="true">
                        </div>
                    </div>

                    <div class="form-group" style="display: none;">
                        <label class="col-sm-4 control-label no-padding-right">Mã cơ sở</label>
                        <div class="col-sm-8">
                            <select name="MaCoSo" id="MaCoSo" class="form-control required" aria-required="true">
                                <option value="CS1">Cơ sở Huế</option>
								<option value="CS2">Cơ sở Sài Gòn</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div>
</div>

<div id="del-khuyenmai" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
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

<div id="edit-khuyenmai" class="modal fade" tabindex="-1">
		<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="modalTitle">Chỉnh sữa</h4>
            </div>
            <form id="form-validate-edit" method="post" action="khuyenmai/edit.php" class="form-horizontal" novalidate="novalidate">
                <div class="modal-body">
                    <input type="hidden" name="id" id="IDHidden2" value="">
                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right">Mã khuyến mãi</label>
                        <div class="col-sm-8">
                            <input type="text" name="MaKM2" id="MaKM2" value="" placeholder="Mã khuyến mãi" class="form-control required" aria-required="true">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right">Tên khuyến mãi</label>
                        <div class="col-sm-8">
                            <input type="text" name="TenKM2" id="TenKM2" value="" placeholder="Tên khuyến mãi" class="form-control required" aria-required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right">Loại khuyến mãi</label>
                        <div class="col-sm-8">
                            <select name="LoaiKM2" id="LoaiKM2" class="form-control required" onchange="khuyenmaiED(this.value);" aria-required="true">
                                <option value="1">Khuyến mãi tiền mặt</option>
								<option value="2">Khuyến mãi phần trăm</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="khuyenmai-tienED">
                        <label class="col-sm-4 control-label no-padding-right">Tiền khuyến mãi</label>
                        <div class="col-sm-8">
                            <input type="text" name="SoTien2" id="SoTien2" value="" placeholder="Tiền khuyến mãi" class="form-control required" aria-required="true">
                        </div>
                    </div>
                    <div class="form-group" id="khuyenmai-phantramED" style="display: none;">
                        <label class="col-sm-4 control-label no-padding-right">Phần trăm khuyến mãi</label>
                        <div class="col-sm-8">
                            <input type="text" name="PhanTram2" id="PhanTram2" value="" placeholder="Phần trăm khuyến mãi" class="form-control required" aria-required="true">
                        </div>
                    </div>

                    <div class="form-group" style="display: none;">
                        <label class="col-sm-4 control-label no-padding-right">Mã cơ sở</label>
                        <div class="col-sm-8">
                            <select name="MaCoSo" id="MaCoSo2" class="form-control required" aria-required="true">
                                <option value="CS1">Cơ sở Huế</option>
								<option value="CS2">Cơ sở Sài Gòn</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div>
</div>

<script>		
 function edit_ajax(id) {
    $.ajax({
        url: 'khuyenmai/get.php?id=' + id,
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
                $('#MaKM2').val(obj.MaKM);
                $('#TenKM2').val(obj.TenKM);
                $('#TenKM2').val(obj.TenKM);
                $('#SoTien2').val(obj.SoTien);
                $('#PhanTram2').val(obj.PhanTram);
                $('#MaCoSo2').val(obj.MaCoSo);
            }
        }
    });
    }
	function del(id, name) {
        $('#msg-delete').html('Bạn có chắc chắn muốn xóa khách hàng <b>' + name + '</b> không?');
        $('#msg-link').attr('href', 'khuyenmai/delete.php?id=' + id);
        $('#del-khuyenmai').modal();
    }
    $('.btn-edit').click(function (e) {
        edit_ajax($(this).attr('data-id'));
        $('#edit-khuyenmai').modal();
   });
	$('.btn-delete').click(function (e) {
		var name = $(this).attr('data-name');
		var id = $(this).attr('data-id');
        del(id, name);
    });
    $('#select-all').click(function(){
    	if($(this).is(':checked')){
    		$('.row-select').prop('checked', true);
    	}else{
			$('.row-select').prop('checked', false);
    	}
    });
    $('.btn-delete-selected').click(function(){
    	swal({   
    		title: "Vui lòng chọn loại dịch vụ?",   
    		type: "warning",   
    		showCancelButton: true,   
    		confirmButtonText: "Đồng ý xóa!",   
    		closeOnConfirm: false,   
    	}, function(isConfirm){ 
    		if(isConfirm){
    			$('#form-delete-selected').submit();	
    		}
    	});
    });
    $('#form-validate-create').validate({
    	rules: {
            MaKM:{
                require: true,
            },
    		TenKM:{
    			require: true,
    		},
            SoTien:{
                require: true,
                number: true,
            },
    	}
    });
    $('#form-validate-edit').validate({
        rules: {
            MaKM2:{
                require: true,
            },
            SoTien2:{
                number: true,
            },
            PhanTram2:{
                number: true,
            }
        }
    });
    function khuyenmai(loaikhuyenmai) {
	    if (loaikhuyenmai == 1) {
	        //Khuyến mãi tiền mặt
	        $('#khuyenmai-tien').show();
	        $('#PhanTram').val('');
	        $('#khuyenmai-phantram').hide();
	    } else {
	        //Khuyến mãi phần trăm
	        $('#SoTien').val('');
	        $('#khuyenmai-tien').hide();
	        $('#khuyenmai-phantram').show();
	    }

    }
    function khuyenmaiED(loaikhuyenmai) {
	    if (loaikhuyenmai == 1) {
	        //Khuyến mãi tiền mặt
	        $('#khuyenmai-tienED').show();
	        $('#PhanTram2').val('');
	        $('#khuyenmai-phantramED').hide();
	    } else {
	        //Khuyến mãi phần trăm
	        $('#SoTien2').val('');
	        $('#khuyenmai-tienED').hide();
	        $('#khuyenmai-phantramED').show();
	    }

    }
</script>		
					<!-- PAGE CONTENT ENDS -->
<?php  
	require './template-bottom.php'; 
?>