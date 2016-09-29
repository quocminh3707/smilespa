<?php  
	require './template-top.php'; 
	require './template-left.php'; 
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

<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
				<table class="table table-bordered table-hover">
					<thead>
					<tr>
						<th>Mã dịch vụ</th>
						<th>Tên dịch vụ</th>
						<th>Tình trạng</th>
						<th>Tên cơ sở</th>
						<th>Đơn giá hiện tại</th>
						<th>
							<a href="#my-modal" role="button" class="btn btn-xs btn-success btn-create" data-toggle="modal">
									<i class="ace-icon fa fa-plus bigger-120"></i>
							</a>
						</th>
					</tr>
					</thead>
					<tbody>
							<tr>
							<td class="text-center">TRIMUN 01</td>
							<td class="text-center">Trị Mụn</td>
							<td class="text-center">Đang sử dụng</td>
							<td class="text-center">Cơ sở Huế</td>
							<td class="text-right"><a href="javascript:;" data-objid="29" class="btn-price">0</a></td>
							<td class="text-center">
								<div class="btn-group">
									<button class="btn btn-xs btn-primary btn-price-edit" data-objid="29" data-objma="TRIMUN 01" data-objname="Trị Mụn" data-objprice="0">
										<i class="ace-icon fa fa-dollar bigger-120"></i>
									</button>
									<button class="btn btn-xs btn-info btn-edit" data-objid="29">
										<i class="ace-icon fa fa-pencil bigger-120"></i>
									</button>
									<button class="btn btn-xs btn-danger btn-delete" data-objid="29" data-objname="Trị Mụn">
										<i class="ace-icon fa fa-trash-o bigger-120"></i>
									</button>
								</div>
							</td>
						</tr>
					
					</tbody>
				</table>
				<div id="my-modal" class="modal fade" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
									<h4 class="modal-title" id="modalTitle">Thêm mới</h4>
								</div>
								<form id="form-validate" method="post" action="http://goldenlotushotel.vn/spa/DichVu" class="form-horizontal" novalidate="novalidate">
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
													<option value="0">Hết sử dụng</option>
													<option value="1">Đang sử dụng</option>
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
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Đóng</button>
										<button type="submit" name="submit" class="btn btn-sm btn-primary pull-right">Lưu</button>
									</div>
								</form>
						</div>
					</div><!-- /.modal-dialog -->
				</div>
				
					<!-- PAGE CONTENT ENDS -->
<?php  
	require './template-bottom.php'; 
?>