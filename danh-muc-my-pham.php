<?php  
    require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';
    require DIRECT_DIR . 'template-top.php'; 
    require DIRECT_DIR . 'template-left.php'; 
    
?>
<div class="page-header">
    <h1>
        Mỹ phẩm
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Danh sách mỹ phẩm
        </small>
    </h1>
</div>
<form id='form-delete-selected' action='mypham/delete-selected.php' method='post'>
    
    <div class="pull-right mr-bottom" >
        <a href="#create-mypham" role="button" class="btn btn-xs btn-success btn-create" data-toggle="modal">
                <i class="ace-icon fa fa-plus bigger-120"></i>
                Thêm
        </a>
        <a href="#del-mypham" role="button" class="btn btn-xs btn-danger btn-delete-selected">
                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                Xóa
        </a>
    </div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="center">
                    <label class="pos-rel">
                        <input type="checkbox" id='select-all' class="ace">
                        <span class="lbl"></span>
                    </label>
                </th>
                <th class="center">Mã mỹ phẩm</th>
                <th class="center">Tên mỹ phẩm</th>
                <th class="center">Tên cơ sở</th>
                <th class="center">Số lượng còn</th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
                
                
                <?php
                $all_mypham = Model_MyPham::all()->toArray();
                 foreach($all_mypham as $row)
                 {
                   ?>   
                            <tr>
                            <th class="center">
                            <label class="pos-rel">
                                    <input type="checkbox" class='row-select' name='selected[]' value='<?php echo $row['id'] ?>' class="ace">
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <td class="text-center"><?php echo $row['MaMP']; ?></td>
                            <td class="text-center"><?php echo $row['TenMP']; ?></td>
                            <td class="text-center">
                                <?php 
                                $coso = $row['CoSo_id'];
                                if($coso == "0" ){
                                    echo "Cơ sở Huế";
                                }else{
                                    echo "Cơ sở Sài Gòn";
                                }
                                ?>
                            </td>
                            <td class="text-center"><?php echo $row['Soluong']; ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="#edit-mypham" role="button" data-id="<?php  echo $row['id']; ?>" data-name="<?php echo $row['MaMP'] ?>" class="btn btn-xs btn-info btn-edit">
                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                            Sữa
                                    </a>
                                    <a href="#del-mypham" role="button" data-id="<?php  echo $row['id']; ?>" data-name="<?php echo $row['MaMP'] ?>" class="btn btn-xs btn-danger btn-delete">
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
<div id="create-mypham" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="modalTitle">Thêm mới</h4>
                </div>
                <form id="form-validate-create" method="post" action="mypham/create.php" class="form-horizontal cmxform" novalidate="novalidate">
                    <input type="hidden" name="IDHidden" id="IDHidden" value="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">Mã mỹ phẩm</label>
                            <div class="col-sm-9">
                                <input type="text" name="MaMP" id="MaMP" value="" placeholder="Mã mỹ phẩm" class="form-control required" aria-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">Tên mỹ phẩm</label>
                            <div class="col-sm-9">
                                <input type="text" name="TenMP" id="TenMP" value="" placeholder="Tên mỹ phẩm" class="form-control required" aria-required="true">
                            </div>
                        </div>
                        <div class="form-group" style="display: none;">
                            <label class="col-sm-3 control-label no-padding-right">Tên cơ sở</label>
                            <div class="col-sm-9">
                                <select name="CoSo_id" id="CoSo_id" class="form-control required" placeholder="Cơ sở" aria-required="true">
                                    <option value="0">Cơ sở Huế</option>
                                    <option value="1">Cơ sở Sài Gòn</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">Số lượng</label>
                            <div class="col-sm-9">
                                <input type="text" name="Soluong" id="Soluong" value="" placeholder="Số lượng" class="form-control required" aria-required="true">
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




<div id="del-mypham" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
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

<div id="edit-mypham" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="modalTitle">Thêm mới</h4>
            </div>
            <form id="form-validate-edit" method="post" action="mypham/edit.php" class="form-horizontal cmxform" novalidate="novalidate">
               <input type="hidden" name="id" id="IDHidden2" value="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">Mã mỹ phẩm</label>
                            <div class="col-sm-9">
                                <input type="text" name="MaMP" id="MaMP2" value="" placeholder="Mã mỹ phẩm" class="form-control required" aria-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">Tên mỹ phẩm</label>
                            <div class="col-sm-9">
                                <input type="text" name="TenMP" id="TenMP2" value="" placeholder="Tên mỹ phẩm" class="form-control required" aria-required="true">
                            </div>
                        </div>
                        <div class="form-group" style="display: none;">
                            <label class="col-sm-3 control-label no-padding-right">Tên cơ sở</label>
                            <div class="col-sm-9">
                                <select name="CoSo_id" id="CoSo_id2" class="form-control required" placeholder="Cơ sở" aria-required="true">
                                    <option value="CS1">Cơ sở Huế</option>
                                    <option value="CS2">Cơ sở Sài Gòn</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">Số lượng</label>
                            <div class="col-sm-9">
                                <input type="text" name="SoluongED" id="Soluong2" value="" placeholder="Số lượng" class="form-control required" aria-required="true">
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
 function edit_ajax(id) {
        $.ajax({
            url: 'mypham/get.php?id=' + id,
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
                    $('#MaMP2').val(obj.MaMP);
                    $('#TenMP2').val(obj.TenMP);
                    $('#CoSo_id2').val(obj.CoSo_id);
                    $('#Soluong2').val(obj.Soluong);
                    
                }
            }
        });
    }
    function del(id, name) {
        $('#msg-delete').html('Bạn có chắc chắn muốn xóa khách hàng <b>' + name + '</b> không?');
        $('#msg-link').attr('href', 'mypham/delete.php?id=' + id);
        $('#del-mypham').modal();
    }
// $(document).ready(function () {
        $('.btn-edit').click(function (e) {
            edit_ajax($(this).attr('data-id'));
            $('#edit-mypham').modal();
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
                Soluong:{
                    number: true,
                }
            }
        });
        $('#form-validate-edit').validate({
            rules: {
                SoluongED: {
                    number: true,
                }
            }
        });
</script>       
                    <!-- PAGE CONTENT ENDS -->
<?php  
    require './template-bottom.php'; 
?>