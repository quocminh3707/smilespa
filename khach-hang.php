<?php  
	require './template-top.php'; 
	require './template-left.php'; 
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
<table class="table table-bordered table-hover">
    <thead>
		<tr>
			<th class="center">
			<label class="pos-rel">
				<input type="checkbox" class="ace">
				<span class="lbl"></span>
			</label>
		</th>
		<th>Details</th>
        <th>Họ tên</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Địa chỉ</th>
		 <th>Cơ sở</th>
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
			<td class="center">
				<div class="action-buttons">
					<a href="#" class="green bigger-140 show-details-btn" title="Show Details">
						<i class="ace-icon fa fa-angle-double-down"></i>
						<span class="sr-only">Details</span>
					</a>
				</div>
			</td>
			<th>test</th>
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
			<tr class="detail-row open">
													<td colspan="8">
														<div class="table-detail">
															<div class="row">
																<div class="col-xs-12 col-sm-2">
																	<div class="text-center">
																		<img height="150" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="assets/images/avatars/profile-pic.jpg">
																		<br>
																		<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
																			<div class="inline position-relative">
																				<a class="user-title-label" href="#">
																					<i class="ace-icon fa fa-circle light-green"></i>
																					&nbsp;
																					<span class="white">Alex M. Doe</span>
																				</a>
																			</div>
																		</div>
																	</div>
																</div>

																<div class="col-xs-12 col-sm-7">
																	<div class="space visible-xs"></div>

																	<div class="profile-user-info profile-user-info-striped">
																		<div class="profile-info-row">
																			<div class="profile-info-name"> Username </div>

																			<div class="profile-info-value">
																				<span>alexdoe</span>
																			</div>
																		</div>

																		<div class="profile-info-row">
																			<div class="profile-info-name"> Location </div>

																			<div class="profile-info-value">
																				<i class="fa fa-map-marker light-orange bigger-110"></i>
																				<span>Netherlands, Amsterdam</span>
																			</div>
																		</div>

																		<div class="profile-info-row">
																			<div class="profile-info-name"> Age </div>

																			<div class="profile-info-value">
																				<span>38</span>
																			</div>
																		</div>

																		<div class="profile-info-row">
																			<div class="profile-info-name"> Joined </div>

																			<div class="profile-info-value">
																				<span>2010/06/20</span>
																			</div>
																		</div>

																		<div class="profile-info-row">
																			<div class="profile-info-name"> Last Online </div>

																			<div class="profile-info-value">
																				<span>3 hours ago</span>
																			</div>
																		</div>

																		<div class="profile-info-row">
																			<div class="profile-info-name"> About Me </div>

																			<div class="profile-info-value">
																				<span>Bio</span>
																			</div>
																		</div>
																	</div>
																</div>

																<div class="col-xs-12 col-sm-3">
																	<div class="space visible-xs"></div>
																	<h4 class="header blue lighter less-margin">Send a message to Alex</h4>

																	<div class="space-6"></div>

																	<form>
																		<fieldset>
																			<textarea class="width-100" resize="none" placeholder="Type something…"></textarea>
																		</fieldset>

																		<div class="hr hr-dotted"></div>

																		<div class="clearfix">
																			<label class="pull-left">
																				<input type="checkbox" class="ace">
																				<span class="lbl"> Email me a copy</span>
																			</label>

																			<button class="pull-right btn btn-sm btn-primary btn-white btn-round" type="button">
																				Submit
																				<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
																			</button>
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</td>
												</tr>
		</tr>
    </tbody>
</table>
<?php  
	require './template-bottom.php'; 
?>