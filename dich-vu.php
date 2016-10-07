<?php  
	require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';
	require DIRECT_DIR . 'template-top.php'; 
	require DIRECT_DIR . 'template-left.php'; 
	
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
<form id='form-delete-selected' action='dichvu/delete-selected.php' method='post'>
	
	<div class="pull-right mr-bottom" >
		<a href="#create-dichvu" role="button" class="btn btn-xs btn-success btn-create" data-toggle="modal">
				<i class="ace-icon fa fa-plus bigger-120"></i>
				Thêm
		</a>
		<a href="#del-dichvu" role="button" class="btn btn-xs btn-danger btn-delete-selected">
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
				<th class="center">Mã dịch vụ</th>
				<th class="center">Tên dịch vụ</th>
				<th class="center">Tình trạng</th>
				<th class="center">Đơn giá hiện tại</th>
				<th class="center">Tên cơ sở</th>
				<th>
				</th>
			</tr>
		</thead>
		<tbody>
				
				
				<?php
				$all_dichvu= Model_DichVu::all()->toArray();
				 foreach($all_dichvu as $row)
				 {
				   ?>	
							<tr data-id="<?php echo $row['id'] ?>">
							<th class="center">
							<label class="pos-rel">
									<input type="checkbox" class='row-select' name='selected[]' value='<?php echo $row['id'] ?>' class="ace">
									<span class="lbl"></span>
								</label>
							</th>
							<td class="text-center"><?php echo $row['MaDichVu']; ?></td>
							<td class="text-center"><?php echo $row['TenDichVu']; ?></td>
							
							<td class="text-center">
							<?php 
								$coso = $row['TinhTrang'];
								if($coso == 0 ){
									echo "Đang sử dụng";
								}else{
									echo "Hết sử dụng";
								}
								?>
							</td>
							
							<td class="text-center"><?php echo $row['DonGia']; ?></td>
							<td class="text-center">
								<?php 
								$coso = $row['MaCoSo'];
								if($coso == "CS1" ){
									echo "Cơ sở Huế";
								}else{
									echo "Cơ sở Sài Gòn";
								}
								?>
							</td>
							<td class="text-center">
								<div class="btn-group">
									<a href="#edit-dichvu" role="button" data-id="<?php  echo $row['id']; ?>" data-name="<?php echo $row['MaDichVu'] ?>" class="btn btn-xs btn-info btn-edit">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
											Sữa
									</a>
									<a href="#del-dichvu" role="button" data-id="<?php  echo $row['id']; ?>" data-name="<?php echo $row['MaDichVu'] ?>" class="btn btn-xs btn-danger btn-delete">
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
<div id="create-dichvu" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="modalTitle">Thêm mới</h4>
				</div>
				<form id="form-validate-create" method="post" action="dichvu/create.php" class="form-horizontal cmxform" novalidate="novalidate">
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
							<label class="col-sm-3 control-label no-padding-right">Hình thức</label>
							<div class="col-sm-9">
								<label class="line-height-1 blue">
									<input class="ace" type="radio" name="hinhthuc" value='0' checked="">
									<span class="lbl"> Buổi lẻ</span>
								</label>
								<label class="line-height-1 blue">
									<input class="ace" type="radio" name="hinhthuc" value='1'> 
									<span class="lbl"> Liệu trình</span>
								</label>
								 
								
							</div>
						</div>
						<div class="form-group" id='tab-BuoiLe'>
							<label class="col-sm-3 control-label no-padding-right">Đơn giá</label>
							<div class="col-sm-9">
								<input type="text" name="BuoiLe[DonGia]" value="" class="form-control required" aria-required="true">
							</div>
						</div>
						<div class="form-group hide" id='tab-LieuTrinh'>
							<label class="col-sm-3 no-padding-right">
								<a  class='btn-add-lieutrinh btn btn-xs btn-success btn-create' style="float:right">
									<i class="ace-icon fa fa-plus bigger-120"></i>
								</a></label>
							
								
							</label>
							<div class="col-sm-9" id='listLieuTrinh'>
								<div class='form-group lieu-trinh-row'>
									<div class='col-md-7'>
										<input type="text" name="LieuTrinh[DonGia][]" value="" placeholder="Đơn giá" class="form-control required" aria-required="true">
									</div>		
									<div class='col-md-3'>
										<input type="text" name="LieuTrinh[SoBuoi][]" value="" placeholder="Số buổi" class="form-control required" aria-required="true">
									</div>
									<div class='col-md-2'>
										<a href='#delete' class='btn-delete-lieutrinh'>
											<i class="raty-cancel cancel-off-png" data-alt="x"></i>
										</a>
									</div>
								</div>
								
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
				</b> không?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                <a href="javascript:;" class="btn btn-danger" id="msg-link">Có</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div id="edit-dichvu" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog">
		<div class="modal-content">
			
		</div>
	</div>
</div>

<script>		
 function edit_ajax(id) {
        $.ajax({
            url: 'dichvu/get.php?id=' + id,
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
                    $('#MaDichVu2').val(obj.MaDichVu);
                    $('#TenDichVu2').val(obj.TenDichVu);
                    $('#TinhTrang2').val(obj.TinhTrang);
                    $('#DonGia2').val(obj.DonGia);
                }
            }
        });
    }
	function del(id, name) {
        $('#msg-delete').html('Bạn có chắc chắn muốn xóa khách hàng <b>' + name + '</b> không?');
        $('#msg-link').attr('href', 'dichvu/delete.php?id=' + id);
        $('#del-dichvu').modal();
    }
// $(document).ready(function () {
		$(document.body).on('click', '.btn-edit', function() {
        	var id = $(this).closest('tr').attr('data-id');
        	$('#edit-dichvu .modal-content').html('...');
        	$('#edit-dichvu').modal('show');
        	$.ajax({
        		url: "dichvu/edit-get.php?id=" + id,
        		type: 'get',
        		success: function(result){
        			$('#edit-dichvu .modal-content').html(result);
        		}
        	});
		    
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
        		DonGia:{
    				number: true,
        		}
        	}
        });
        $('#form-validate-edit').validate({
            rules: {
                DonGiaED: {
                    number: true,
                }
            }
        })
        $(".btn-add-lieutrinh").click(function(){
        	$('#listLieuTrinh').append("<div class='form-group lieu-trinh-row'><div class='col-md-7'><input type='text' name='LieuTrinh[DonGia][]' value='' placeholder='Đơn giá' class='form-control required' aria-required='true'></div><div class='col-md-3'><input type='text' name='LieuTrinh[SoBuoi][]' value='' placeholder='So buoi' class='form-control required' aria-required='true'></div><div class='col-md-2'><a href='#delete' class='btn-delete-lieutrinh'><i class='raty-cancel cancel-off-png' data-alt='x'></i></a></div></div>");
        });

        $(document.body).on('click', '.btn-add-edit-lieutrinh', function() {
        	$('#edit-listLieuTrinh').append("<div class='form-group lieu-trinh-row'><div class='col-md-7'><input type='text' name='LieuTrinh[DonGia][]' value='' placeholder='Đơn giá' class='form-control required' aria-required='true'></div><div class='col-md-3'><input type='text' name='LieuTrinh[SoBuoi][]' value='' placeholder='So buoi' class='form-control required' aria-required='true'></div><div class='col-md-2'><a href='#delete' class='btn-delete-lieutrinh'>x</a></div></div>");
		    
		});
        $(document.body).on('click', '.btn-delete-lieutrinh', function() {
        	if($('.lieu-trinh-row').length > 1){
        		$(this).closest('.lieu-trinh-row').remove();
        	}
		    
		});
		$('#create-dichvu input[name="hinhthuc"]').change(function(){
			var value = parseInt($(this).val());
			if(value == 1){
				$('#tab-BuoiLe').addClass('hide');
				$('#tab-LieuTrinh').removeClass('hide');
			}else{
				$('#tab-BuoiLe').removeClass('hide');
				$('#tab-LieuTrinh').addClass('hide');
			}
		});
		$('#edit-dichvu input[name="hinhthuc"]').change(function(){
			var value = parseInt($(this).val());
			if(value == 1){
				$('#edit-tab-BuoiLe').addClass('hide');
				$('#tab-LieuTrinh').removeClass('hide');
			}else{
				$('#edit-tab-BuoiLe').removeClass('hide');
				$('#edit-tab-LieuTrinh').addClass('hide');
			}
		});

</script>		
					<!-- PAGE CONTENT ENDS -->
<?php  
	require './template-bottom.php'; 
?>