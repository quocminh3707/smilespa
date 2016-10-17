<?php  
	require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';
	
?>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />
<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
<link rel="stylesheet" href="../assets/css/smilespa.css" />
<link rel="stylesheet" href="../assets/css/sweetalert.min.css" />


<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery-2.1.4.min.js"></script>
<script src="../assets/js/ace-extra.min.js"></script>
<script src="../assets/js/sweetalert.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.validate.min.js"></script>
<script src="../assets/js/ace-elements.min.js"></script>
<script src="../assets/js/ace.min.js"></script>
<script src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="../assets/js/dataTables.buttons.min.js"></script>
<script src="../assets/js/buttons.flash.min.js"></script>
<script src="../assets/js/buttons.html5.min.js"></script>
<script src="../assets/js/buttons.print.min.js"></script>
<script src="../assets/js/buttons.colVis.min.js"></script>
<script src="../assets/js/dataTables.select.min.js"></script>
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	$(document).ready(function () {
		$('.show-details-btn').on('click', function(e) {
			e.preventDefault();
			$(this).closest('tr').next().toggleClass('open');
			$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
		});
	});

	$("#cauHinhTacNghiep").on("hide.bs.dropdown", function (e) {
		e.preventDefault();
		return false;
	});
	$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<style type="text/css">
	*{
		font-size: 13px;
	}
</style>
<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						
						<div class="page-header">
							<h1>
								Đăng ký dịch vụ
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Danh sách dịch vụ "TÊN KHÁCH"
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>
													<th>Ngày đăng ký</th>
													<th>Dịch vụ</th>
													<th>Điều trị</th>
													<th>Giá dịch vụ</th>
													<th>KM</th>
													<th>Tổng thanh toán</th>
													<th>Lần thanh toán</th>
													<th>Nợ</th>
													<th>Ghi chú</th>
													<th></th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<?php
													$dkdichvu = Model_DangKyDichVu::all()->toArray();
													print_r($dkdichvu);
													 	
													?>
													<td>
														<div class="hidden-sm hidden-xs btn-group">

															<button class="btn btn-xs btn-info">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															</button>

															<button class="btn btn-xs btn-danger">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</button>
														</div>

														<div class="hidden-md hidden-lg">
															<div class="inline pos-rel">
																<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																	<li>
																		<a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																			<span class="blue">
																				<i class="ace-icon fa fa-search-plus bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																			</span>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</td>
												</tr>
											</tbody>
											<tbody>
												<tr>
													<td class="text-right" colspan="11">Tổng tiền đã thanh toán: 
														<b>300.000vnđ</b>
													</td>
												</tr>
											</tbody>
										</table>
									</div><!-- /.span -->
								</div><!-- /.row -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div>