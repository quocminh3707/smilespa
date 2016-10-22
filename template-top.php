<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Content sliders based on Bootstrap modals - Ace Admin</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link href="favicon.ico" rel="shortcut icon" type="image/x-icon"/>
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="assets/css/smilespa.css" />
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>
		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
		<link rel="stylesheet" href="assets/css/sweetalert.min.css" />

		<script src="assets/js/sweetalert.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/buttons.flash.min.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/buttons.colVis.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>
		<script type="text/javascript">
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
		</script>
		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
		
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Smile Spa
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li id="cauHinhTacNghiep" class="light-blue dropdown-modal">
					        <a data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">

					            <?php 
					            if($_SESSION['coso'] == 1){
					            	echo "Cơ sở Huế";
					            }else{
					            	echo "Cơ sở Sài Gòn";
					            }
					            ?>
					                            <i class="ace-icon fa fa-caret-down"></i>
					        </a>
					                    <ul class="dropdown-menu dropdown-menu-right">
							                <li>
							                    <div style="text-align: center; padding: 0 10px; white-space: nowrap;">
							                        <form method="post" id="form-change-coso" class="form-inline">
							                            <label for="nam" class="control-label inline" style="color: black; font-weight: bold; padding-left: 10px;">Chọn cơ sở: </label><br>
							                            <select name="CoSo_Id" id="CauHinhCoSo" class="form-control">
							                                <option value="1" <?php if($_SESSION['coso'] == 1) echo "selected='selected'" ?>>Cơ sở Huế</option>
															<option value="2" <?php if($_SESSION['coso'] == 2) echo "selected='selected'" ?>>Cơ sở Sài Gòn</option>
							                            </select>
							                            <button type='submit' name='submit_change_coso' class="btn btn-xs btn-primary">
							                                <i class="ace-icon fa fa-check bigger-120"></i>
							                            </button>
							                            <button class="btn btn-xs btn-danger" type="button" onclick="$('#cauHinhTacNghiep').removeClass('open');">
							                                <i class="ace-icon fa fa-ban bigger-120"></i>
							                            </button>
							                        </form>
							                    </div>
							                </li>
							            </ul>
			            </li>
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Xin chào,</small>
									<?php print_r(Auth::get()->username); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<!-- <li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li> -->
							</ul>
						</li>
						<li>
							<a href="<?php echo "/".SOURCE_FOLDER. "user/logout.php"; ?>" title="Ðăng xuất">
								<i class="ace-icon fa fa-power-off red2"></i>
							</a>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>
		<script>
		$("#CauHinhCoSo").click(function(){
			return false;
		})
		$("#CauHinh").click(function(){
			return false;
		})
		</script>