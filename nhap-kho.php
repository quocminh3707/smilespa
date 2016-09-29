<?php  
	require './template-top.php'; 
	require './template-left.php'; 
?>
<div class="page-header">
    <h1>
        Nhập kho
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Danh sách phiếu nhập kho
        </small>
    </h1>
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
        <th>Nội dung</th>
        <th>Tên cơ sở</th>
        <th>Thời điểm nhập</th>
        <th>Người thực hiện</th>
        <th>
            <button class="btn btn-xs btn-success btn-create">
                <i class="ace-icon fa fa-plus bigger-120"></i>
            </button>
			<button class="btn btn-xs btn-success btn-danger">
                <i class="ace-icon fa fa-trash-o bigger-120"></i>
            </button>
        </th>
    </tr>
    </thead>

    <tbody>
		<tr>
			<th class="center">
				<label class="pos-rel">
					<input type="checkbox" class="ace">
					<span class="lbl"></span>
				</label>
			</th>
			<th>test</th>
			<th>test</th>
			<th>test</th>
			<th>test</th>
			 <td>
                <div class="btn-group">
                    <button class="btn btn-xs btn-warning btn-pass" data-objid="2" data-objname="test test">
                        <i class="ace-icon fa fa-key bigger-120"></i>
                    </button>
                    <button class="btn btn-xs btn-info btn-edit" data-objid="2" data-objname="test test">
                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                    </button>
                    <button class="btn btn-xs btn-danger btn-delete" data-objid="2" data-objname="test test">
                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                    </button>
                </div>
            </td>
		</tr>
    </tbody>
</table>
<?php  
	require './template-bottom.php'; 
?>