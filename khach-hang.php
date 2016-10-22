<?php  
// echo "<pre>";
// 	print_r($_SERVER);
// 	exit();
	require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';
	require DIRECT_DIR . 'template-top.php'; 
	require DIRECT_DIR . 'template-left.php'; 
	
?>
<div class="page-header">
    <h1>
        Khách hàng
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Danh sách khách hàng
        </small>
    </h1>
</div>
<form id='form-delete-selected' action='khachhang/delete-selected.php' method='post'>
	
	<div class="pull-right mr-bottom" >
		<a href="#create-khachhang" role="button" class="btn btn-xs btn-success btn-create" data-toggle="modal">
				<i class="ace-icon fa fa-plus bigger-120"></i>
				Thêm khách hàng
		</a>
		<a href="#del-khachhang" role="button" class="btn btn-xs btn-danger btn-delete-selected">
				<i class="ace-icon fa fa-trash-o bigger-120"></i>
				Xóa
		</a>
	</div>

	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" id='select-all'>
						<span class="lbl"></span>
					</label>
				</th>
				<th class="center">Đăng ký</th>
				<th class="center">Họ tên</th>
				<th class="center">Số điện thoại</th>
				<th class="center">Facebook</th>
				<th class="center">Địa chỉ</th>
				<th class="center">Tên cơ sở</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
				
				
				<?php
				//$all_khachhang = Model_KhachHang::all()->toArray();
				$all_khachhang = Model_KhachHang::paginate(ITEMS_PER_PAGE);
				$all_khachhang->setPath($_SERVER['PHP_SELF']);

				 foreach($all_khachhang as $row)
				 {
				   ?>	
							<tr data-khachhang-id='<?php echo $row['id'] ?>'>
							<th class="center">
							<label class="pos-rel">
									<input type="checkbox" class='row-select' name='selected[]' value='<?php echo $row['id'] ?>' class="ace">
									<span class="lbl"></span>
								</label>
							</th>
							<td class="center">
								<div class="action-buttons ui-pg-div">
									<a href='#' class="ace-icon btn-dangky-dichvu green">
										<i class="ui-icon ace-icon fa fa-plus-circle purple"></i>
									</a>
									<a class="orange btn-show-dangky" data-id="<?php  echo $row['id']; ?>" href="#">
										<i class="ace-icon fa fa-search-plus bigger-130"></i>
									</a>
								</div>
							</td>
							<td class="text-center">
								<?php echo "<a class='link-dangky' onclick='myFunction()'>".$row['Ho'];echo "&nbsp"; echo $row['Ten'].'</a>'; ?>	
							</td>
							<td class="text-center"><?php echo $row['Sdt']; ?></td>
							<td class="text-center">
								<?php 
									echo "<a href='".$row["Email"]."' target='_blank'>".$row['Email']."</a>"; 
								?>		
							</td>
							<td class="text-center"><?php echo $row['DiaChi']; ?></td>
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
									<a href="#edit-khachhang" role="button" data-id="<?php  echo $row['id']; ?>" data-name="<?php echo $row['Ho']; echo "&nbsp"; echo $row['Ten'];?>" class="btn btn-xs btn-info btn-edit">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
											Sữa
									</a>
									<a href="#del-khachhang" role="button" data-id="<?php  echo $row['id']; ?>" data-name="<?php echo $row['Ho'];echo "&nbsp"; echo $row['Ten']; ?>" class="btn btn-xs btn-danger btn-delete">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
											Xóa
									</a>
								</div>
							</td>
							<?php
				 }
				 echo $all_khachhang->links();
				 ?>
				
			
		
		</tbody>
	</table>


</form>
<div id="create-khachhang" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="modalTitle">Thêm mới</h4>
				</div>
				<form id="form-validate-create" method="post" action="khachhang/create.php" class="form-horizontal cmxform" novalidate="novalidate">
					<input type="hidden" name="IDHidden" id="IDHidden" value="">
					<div class="modal-body">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Họ và Tên</label>
							<div class="col-sm-5">
	                            <input type="text" name="Ho" id="Ho" value="" placeholder="Họ" class="form-control">
	                        </div>
	                        <div class="col-sm-4">
                            <input type="text" name="Ten" id="Ten" value="" placeholder="Tên" class="form-control required" aria-required="true">
                        </div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Số điện thoại</label>
							<div class="col-sm-9">
								<input type="text" name="Sdt" id="Sdt" value="" placeholder="Số điện thoại" class="form-control required" aria-required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">Link Facebook</label>
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
								<select name="MaCoSo" class="form-control required" placeholder="Cơ sở" aria-required="true">
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




<div id="del-khachhang" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
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

<div id="edit-khachhang" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="modalTitle">Thêm mới</h4>
			</div>
			<form id="form-validate-edit" method="post" action="khachhang/edit.php" class="form-horizontal cmxform" novalidate="novalidate">
				<input type="hidden" name="id" id="IDHidden2" value="">
				<div class="modal-body">
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Họ và Tên</label>
						<div class="col-sm-5">
                            <input type="text" name="Ho" id="Ho2" value="" placeholder="Họ" class="form-control">
                        </div>
                        <div class="col-sm-4">
                        <input type="text" name="Ten" id="Ten2" value="" placeholder="Tên" class="form-control required" aria-required="true">
                    </div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Số điện thoại</label>
						<div class="col-sm-9">
							<input type="text" name="SdtED" id="Sdt2" value="" placeholder="Số điện thoại" class="form-control required" aria-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Link Facebook</label>
						<div class="col-sm-9">
							<input type="text" name="EmailED" id="Email2" value="" placeholder="Email" class="form-control required" aria-required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Địa chỉ</label>
						<div class="col-sm-9">
							<input type="text" name="DiaChi" id="DiaChi2" value="" placeholder="Địa chỉ" class="form-control required" aria-required="true">
						</div>
					</div>
					<div class="form-group" style="display: none;">
						<label class="col-sm-3 control-label no-padding-right">Mã cơ sở</label>
						<div class="col-sm-9">
							<select name="MaCoSo" class="form-control required" placeholder="Cơ sở" aria-required="true">
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
	$('.btn-show-dangky').click(function (e) {
		
		var id = $(this).attr('data-id');
        window.open('dangky-dichvu/dangky-dichvu.php?id=' + id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=80,width=1200,height=500");
    });		
	 function edit_ajax(id) {
        $.ajax({
            url: 'khachhang/get.php?id=' + id,
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
                    $('#Ho2').val(obj.Ho);
                    $('#Ten2').val(obj.Ten);
                    $('#Sdt2').val(obj.Sdt);
                    $('#Email2').val(obj.Email);
                    $('#DiaChi2').val(obj.DiaChi);
                    $('#CoSo_id2').val(obj.CoSo_id);
                    $('#modalPopup').modal();
                }
            }
        });
    }	
	function del(id, name) {
        $('#msg-delete').html('Bạn có chắc chắn muốn xóa khách hàng <b>' + name + '</b> không?');
        $('#msg-link').attr('href', 'khachhang/delete.php?id=' + id);
        $('#del-khachhang').modal();
    }
// $(document).ready(function () {
    $('.btn-edit').click(function (e) {
        edit_ajax($(this).attr('data-id'));
        $('#edit-khachhang').modal();
   });
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
    		confirmButtonText: "Yes, delete it!",   
    		closeOnConfirm: false,   
    	}, function(isConfirm){ 
    		if(isConfirm){
    			$('#form-delete-selected').submit();	
    		} 
    		
    	});
    });
    $('#form-validate-create').validate({
    	rules: {
    		Ho: {
    			required: true,
    		},
    		Sdt: {
    			number: true,
    		},
    	}
    });
    $('#form-validate-edit').validate({
    	rules: {
    		SdtED: {
    			number: true,
    		},
    	}
    });
</script>		
					<!-- PAGE CONTENT ENDS -->
<?php  
	require DIRECT_DIR . 'dangky-dichvu/modal.php';
	require DIRECT_DIR . 'template-bottom.php'; 
?>