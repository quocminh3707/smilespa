<?php  
    require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';
    require DIRECT_DIR . 'template-top.php'; 
    require DIRECT_DIR . 'template-left.php'; 
?>
<div class="page-header">
    <h1>
       Thành viên
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Danh sách thành viên
        </small>
    </h1>
</div>
<?php require DIRECT_DIR . '/thanhvien/messenger.php';  ?>
<form id='form-delete-selected' action='thanhvien/delete-selected.php' method='post'>
    
    <div class="pull-right mr-bottom" >
        <a href="#create-user" role="button" class="btn btn-xs btn-success btn-create" data-toggle="modal">
                <i class="ace-icon fa fa-plus bigger-120"></i>
                Thêm
        </a>
        <a href="#del-user" role="button" class="btn btn-xs btn-danger btn-delete-selected">
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
                <th class="center">Họ và tên</th>
                <th class="center">Số điện thoại</th>
                <th class="center">Email</th>
                <th class="center">Địa chỉ</th>
                <th class="center">Tình trạng</th>
                <th class="center">Nhóm</th>
                <th class="center">Tên cở sở</th>
                <th class="center"></th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
                
                
                <?php
                $all_user = Model_User::where('CoSo_Id', $_SESSION['coso'])->get()->toArray();
                 foreach($all_user as $row)
                 {
                   ?>   
                            <tr>
                            <th class="center">
                            <label class="pos-rel">
                                    <input type="checkbox" class='row-select' name='selected[]' value='<?php echo $row['id'] ?>' class="ace">
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <td class="text-center"><?php echo $row['Ho'];echo "&nbsp"; echo $row['Ten']; ?></td>
                            <td class="text-center"><?php echo $row['Sdt']; ?></td>
                            <td class="text-center"><?php echo $row['Email']; ?></td>
                            <td class="text-center"><?php echo $row['Dia_Chi']; ?></td>
                            <td class="text-center">
                                <?php 
                                    $tinhtrang = $row['Tinh_Trang'];
                                    if($tinhtrang == 0){
                                        echo "Đã kích hoạt";
                                    }else if($tinhtrang == 1){
                                        echo "Chưa kich hoạt";
                                    }else if($tinhtrang == 2){
                                        echo "Khóa tài khoản";
                                    }
                                 ?>    
                            </td>
                             <td class="text-center">
                                <?php 
                                    $nhom = $row['level'];
                                    if($nhom == 1){
                                        echo "Nhóm quản trị";
                                    }else if($nhom == 2){
                                        echo "Nhóm Biên tập";
                                    }else if($nhom == 3){
                                        echo "Nhóm thành viên";
                                    }
                                 ?>    
                            </td>
                            <td class="text-center">
                                <?php 
                                $coso = $row['CoSo_Id'];
                                if($coso == 1 ){
                                    echo "Cơ sở Huế";
                                }else{
                                    echo "Cơ sở Sài Gòn";
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="#edit-user" role="button" data-id="<?php  echo $row['id']; ?>" data-name="<?php echo $row['Ho'];echo "&nbsp";echo $row['Ten'] ?>" class="btn btn-xs btn-info btn-edit">
                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                            Sữa
                                    </a>
                                    <a href="#del-user" role="button" data-id="<?php  echo $row['id']; ?>" data-name="<?php echo $row['Ho'];echo "&nbsp";echo $row['Ten'] ?>" class="btn btn-xs btn-danger btn-delete">
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
<div id="create-user" class="modal fade" tabindex="-1">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="modalTitle">Thêm mới</h4>
            </div>
            <form id="form-validate-create" method="post" action="thanhvien/create.php" class="form-horizontal" novalidate="novalidate">
                <div class="modal-body">
                    <input type="hidden" name="IDHidden" id="IDHidden" value="">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Họ và tên</label>
                        <div class="col-sm-5">
                            <input type="text" name="Ho" placeholder="Họ" class="form-control required">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="Ten" placeholder="Tên" class="form-control required" aria-required="true">
                        </div>
                    </div>
                    <div class="form-group" id="dangnhap-group">
                        <label class="col-sm-3 control-label no-padding-right">Tên đăng nhập</label>
                        <div class="col-sm-4">
                            <input type="text" name="username" placeholder="Tên đăng nhập" class="form-control required" aria-required="true">
                        </div>
                        <label class="col-sm-2 control-label no-padding-right">Mật khẩu</label>
                        <div class="col-sm-3">
                            <input type="password" name="password" placeholder="Mật khẩu" class="form-control required" aria-required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Số điện thoại</label>
                        <div class="col-sm-9">
                            <input type="text" name="Sdt" placeholder="Số điện thoại" class="form-control required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="Email" placeholder="Email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Địa chỉ</label>
                        <div class="col-sm-9">
                            <input type="text" name="Dia_Chi" placeholder="Địa chỉ" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Tình trạng</label>
                        <div class="col-sm-9">
                            <select name="Tinh_Trang" class="form-control required" aria-required="true">
                                <option value="0">Đã kích hoạt</option>
                                <option value="1">Chưa kích hoạt</option>
                                <option value="2">Khóa tài khoản</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="display: none;">
                        <label class="col-sm-3 control-label no-padding-right">Mã cơ sở</label>
                        <div class="col-sm-9">
                            <select name="MaCoSo" class="form-control required" aria-required="true">
                                <option value="CS1">Cơ sở Huế</option>
								<option value="CS2">Cơ sở Sài Gòn</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Mã nhóm</label>
                        <div class="col-sm-9">
                            <select name="level" class="form-control required" aria-required="true">
                                <option value="1">Nhóm quản trị</option>
                                <option value="2">Biên tập viên</option>
                                <option value="3">Nhóm thành viên</option>
                            </select>
                        </div>
                    </div>
                </div>
               <div class="modal-footer">
					<button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Đóng</button>
					<button type="submit" name="submit" class="btn btn-sm btn-primary pull-right">Lưu</button>
				</div>
            </form>
        </div><!-- /.modal-content -->
    </div>
</div>




<div id="del-user" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
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

<div id="edit-user" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="modalTitle">Thêm mới</h4>
            </div>
            <form id="form-validate-edit" method="post" action="thanhvien/edit.php" class="form-horizontal" novalidate="novalidate">
                <div class="modal-body">
                    <input type="hidden" name="id" id="IDHiddenED" value="">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Họ và tên</label>
                        <div class="col-sm-5">
                            <input type="text" name="HoED" id="HoED" placeholder="Họ" class="form-control required">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="TenED" id="TenED" placeholder="Tên" class="form-control required" aria-required="true">
                        </div>
                    </div>
                    <div class="form-group" id="dangnhap-group">
                        <label class="col-sm-3 control-label no-padding-right">Tên đăng nhập</label>
                        <div class="col-sm-4">
                            <input type="text" name="usernameED" id="usernameED" placeholder="Tên đăng nhập" class="form-control required" aria-required="true">
                        </div>
                        <label class="col-sm-2 control-label no-padding-right">Mật khẩu</label>
                        <div class="col-sm-3">
                            <input type="password" name="passwordED" id="passwordED"  placeholder="Mật khẩu" class="form-control required" aria-required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Số điện thoại</label>
                        <div class="col-sm-9">
                            <input type="text" name="SdtED" id="SdtED" placeholder="Số điện thoại" class="form-control required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="EmailED" id="EmailED" placeholder="Email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Địa chỉ</label>
                        <div class="col-sm-9">
                            <input type="text" name="Dia_ChiED" id="Dia_ChiED" placeholder="Địa chỉ" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Tình trạng</label>
                        <div class="col-sm-9">
                            <select name="Tinh_TrangED" id="Tinh_TrangED"  class="form-control required" aria-required="true">
                                <option value="0">Đã kích hoạt</option>
                                <option value="1">Chưa kích hoạt</option>
                                <option value="2">Khóa tài khoản</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="display: none;">
                        <label class="col-sm-3 control-label no-padding-right">Mã cơ sở</label>
                        <div class="col-sm-9">
                            <select name="MaCoSoED" id="MaCoSoED" class="form-control required" aria-required="true">
                                <option value="CS1">Cơ sở Huế</option>
                                <option value="CS2">Cơ sở Sài Gòn</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Mã nhóm</label>
                        <div class="col-sm-9">
                            <select name="levelED" id="levelED" class="form-control required" aria-required="true">
                                <option value="1">Nhóm quản trị</option>
                                <option value="2">Biên tập viên</option>
                                <option value="3">Nhóm thành viên</option>
                            </select>
                        </div>
                    </div>
                </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Đóng</button>
                    <button type="submit" name="submit" class="btn btn-sm btn-primary pull-right">Lưu</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div>
</div>

<script>        
 function edit_ajax(id) {
        $.ajax({
            url: 'thanhvien/get.php?id=' + id,
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
                    $('#IDHiddenED').val(obj.id);
                    $('#HoED').val(obj.Ho);
                    $('#TenED').val(obj.Ten);
                    $('#SdtED').val(obj.Sdt);
                    $('#EmailED').val(obj.Email);
                    $('#Dia_ChiED').val(obj.Dia_Chi);
                    $('#Tinh_TrangED').val(obj.Tinh_Trang);
                    $('#MaCoSoED').val(obj.MaCoSo);
                    $('#levelED').val(obj.level);
                }
            }
        });
    }
    function del(id, name) {
        $('#msg-delete').html('Bạn có chắc chắn muốn xóa khách hàng <b>' + name + '</b> không?');
        $('#msg-link').attr('href', 'thanhvien/delete.php?id=' + id);
        $('#del-user').modal();
    }
// $(document).ready(function () {
        $('.btn-edit').click(function (e) {
            edit_ajax($(this).attr('data-id'));
            $('#edit-user').modal();
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
                Sdt:{
                    number: true,
                },
            }
        });
        $('#form-validate-edit').validate({
            rules: {
                Sdt:{
                    number: true,
                },
            }
        });
</script>       
                    <!-- PAGE CONTENT ENDS -->
<?php  
	require DIRECT_DIR . 'template-bottom.php'; 
?>