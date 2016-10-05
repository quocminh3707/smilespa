<td colspan="1">&nbsp;</td>
<td colspan="7" class="ui-widget-content subgrid-data">
	<table class="table table-bordered table-hover" role="presentation" aria-labelledby="gbox_grid-table_1_t">
		<thead>
			<tr class="ui-jqgrid-labels" role="row">
				<th class="text-center">Stt</th>
				<th class="text-center">Ngày</th>
				<th class="text-center">Dịch vụ</th>
				<th class="text-center">Hình thức đăng ký</th>
				<th class="text-center">Tông tiền</th>
				<th class="text-center">KM</th>
				<th class="text-center">Tổng thanh toán</th>
				<th class="text-center">Lần thanh toán</th>
				<th class="text-center">Nợ lại</th>
				<th class="text-center">Tình trạng</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr role="row" id="1" tabindex="0" class="jqgrow ui-row-ltr ui-widget-content ui-state-highlight" aria-selected="true">
				<td class="text-center" role="gridcell" style="" title="1" >1</td>
				<td class="text-center" role="gridcell" style="" title="1" >
					<span href="#" data-toggle="tooltip" data-placement="top" title="Ngày thêm:04/10/2016">04/10/2016</span>
				</td>
				<td class="text-center" role="gridcell" style="" title="1" >
					<span href="#" data-toggle="tooltip" data-placement="top" title="Triệt nách">NL 01</span>
				</td>
				<td class="text-center" role="gridcell" style="" title="1" >
					<span href="#" data-toggle="tooltip" data-placement="top" title="Liêu trinh 5 buổi(Buổi 1)">Liêu trinh</span>
				</td>
				<td class="text-center" role="gridcell" style="" title="1" >1.000.000vnđ</td>
				<td class="text-center" role="gridcell" style="" title="1" >10%</td>
				<td class="text-center" role="gridcell" style=""  >900.000vnđ</td>
				<td class="text-center" role="gridcell" style="" title="1" >
					<span href="#" data-toggle="tooltip" data-placement="top" title="Thanh toán lần 1">300.000vnđ</span>
				</td>
				<td class="text-center" role="gridcell" style="" title="1" >600.000vnđ</td>
				<td class="ui-pg-div text-center" role="gridcell" style="" title="1" >
					<span class="ui-icon ace-icon fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="Chỉnh sữa"></span>
					<span href="#" data-toggle="tooltip" data-placement="top" title="Ngày cập nhật:04/10/2016">Mới đăng ký</span>
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
		</tbody>
		<tbody>
			<td colspan="1"></td>
			<td class="text-right" colspan="11">Tổng tiền đã thanh toán: 300.000vnđ</td>
		</tbody>
	</table>
</td>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>