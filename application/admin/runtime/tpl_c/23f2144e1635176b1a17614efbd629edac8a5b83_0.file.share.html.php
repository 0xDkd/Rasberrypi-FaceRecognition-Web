<?php
/* Smarty version 3.1.32-dev-38, created on 2018-03-28 22:51:21
  from '/home/vagrant/Code/Face/application/admin/view/share/share.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5abbabe9dfc172_85300099',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '23f2144e1635176b1a17614efbd629edac8a5b83' => 
    array (
      0 => '/home/vagrant/Code/Face/application/admin/view/share/share.html',
      1 => 1522248678,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5abbabe9dfc172_85300099 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="zh_cn" data-ng-app="FileManagerApp">
	<head>
		<!--
		* Angular FileManager v1.5.1 (https://github.com/joni2back/angular-filemanager)
		* Jonas Sciangula Street <joni2back@gmail.com>
		* Licensed under MIT (https://github.com/joni2back/angular-filemanager/blob/master/LICENSE)
		-->
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta charset="utf-8">
		<title>我的文件 - </title>
		<!-- third party -->
		<link rel="stylesheet" href="<?php echo PUBLIC_PATH;?>
static/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo PUBLIC_PATH;?>
static/css/material.css" />


		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
		<!-- /third party -->
		<!-- Comment if you need to use raw source code -->
		<link href="<?php echo PUBLIC_PATH;?>
static/css/angular-filemanager.min.css" rel="stylesheet">
		<link href="<?php echo PUBLIC_PATH;?>
static/css/toastr.min.css" rel="stylesheet">
		<!-- /Comment if you need to use raw source code -->



	</head>
	<body class="ng-cloak">
		<div id="container">
			<nav class="navbar navbar-inverse" >
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<a class="navbar-brand" href="/">

						</a>

						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">

							<li class="dropdown">
								<a href="#" class="dropdown-toggle avatar-a" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="/Member/Avatar/none/s" class="img-circle avatar-s"> Name<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="/Profile/ID">个人主页</a></li>
									<li><a href="/Member/Setting">设置</a></li>
									SET
									<li><a href="/Admin">管理面板</a></li>

									<li role="separator" class="divider"></li>
									<li><a href="/Member/LogOut">退出登录</a></li>
								</ul>
							</li>
							<li class="mobile-addition">
								<a href="/Share/My" role="button" aria-haspopup="true" ><i class="fa fa-share-alt" aria-hidden="true"></i> 我的分享</a>
							</li>
							<li class="mobile-addition">
								<a href="/Explore/Search" role="button" aria-haspopup="true" ><i class="fa fa-search" aria-hidden="true"></i> 搜索分享</a>
							</li>
							<li class="mobile-addition">
								<a href="/Home/Album" role="button" aria-haspopup="true" ><i class="fa fa-picture-o" aria-hidden="true"></i> 图片集</a>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>

			<!-- Modal -->
			<div class="modal fade" id="upload_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" onclick = "closeUpload()" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">上传文件</h4>
						</div>
						<div class="modal-body">
							<div class="row" style="margin-top: 20px;">
								<input type="hidden" id="domain" value="http://7xocov.com1.z0.glb.clouddn.com/">
								<input type="hidden" id="uptoken_url" value="uptoken">
								<div class="up_button col-md-4">

									<div id="container">

										<button class="btn btn-raised btn-info btn-lg upload_button" id="pickfiles"  >
											<i class="glyphicon glyphicon-plus"></i>
											<span id="up_text"></span>
										</button>
									</div>
								</div>
								<div style="display:none" id="success" class="indo col-md-8">
									<div class="alert alert-success">
										队列全部文件处理完毕
									</div>
								</div>
								<div class="col-md-12 " align="center">
									<div class="info_box"  id="info_box">
										<br>
										<div class="drag_info">
											<span class="info_icon"><i class="glyphicon glyphicon-inbox"></i></span>
											<div class="info_text">拖动文件至此开始上传</div>
										</div>
									</div>
									<div class="upload_box" style="display:none;" id="upload_box">
										<table class="table table-striped table-hover text-left"   style="display:none;">
											<thead>
											<tr>
												<th class="col-md-4">文件名</th>
												<th class="col-md-2">大小</th>
												<th class="col-md-6">进度</th>
											</tr>
											</thead>
											<tbody id="fsUploadProgress">
											</tbody>
										</table>
									</div>
								</div>



								<div class="container" style="display: none;">

									<div class="body">

									</div>


								</div>

							</div>
							<div class="modal-footer">

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 s"  id="side">
				<div class="list-group" id="b">
					<a href="/Home" class="list-group-item">
						<i class="fa fa-file" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; 我的文件
					</a>
					<a href="/Share/My" class="list-group-item"> <i class="fa fa-share-alt" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; 我的分享
					</a>
					<a href="/Explore/Search" class="list-group-item">
						<i class="fa fa-search" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; 搜索分享
					</a>
					<a href="/Home/Album" class="list-group-item">
						<i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; 图片集
					</a>
				</div>
				<div  clss="usage" style="  visibility: visible;
          position: absolute;
          width: 100%;
          height: 100px;
          top: auto;
          bottom: 0px;

          background-color: #f9f9f9;padding: 15px">
					<div class="usage-title">容量使用：</div>
					<div class="usage-bar">
						<div class="progress progress-striped active">
							<div class="progress-bar" id="memory_bar"></div>
						</div>
					</div>
					<div class="usage-text"><span id="used">--</span>/<span id="total">--</span></div>
				</div>
			</div>




			<div class="col-md-2 s"  id="side">
				<div class="list-group" id="b">
					<a href="/Home" class="list-group-item active">
						<i class="fa fa-file" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; 我的文件
					</a>
					<a href="/Share" class="list-group-item"> <i class="fa fa-share-alt" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; 我的分享
					</a>
					<a href="#" class="list-group-item"><i class="fa fa-database" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; 容量配额
					</a>
				</div>
				<div  clss="usage" style="  visibility: visible;
					position: absolute;
					width: 100%;
					height: 100px;
					top: auto;
					bottom: 0px;
					background-color: #f3f3f3;padding: 15px">
					<div class="usage-title">容量使用：</div>
					<div class="usage-bar">
						<div class="progress progress-striped active">
							<div class="progress-bar" id="memory_bar"></div>
						</div>
					</div>
					<div class="usage-text"><span id="used">--</span>/<span id="total">--</span></div>
				</div>
			</div>
			<div class="col-md-10">
			<angular-filemanager></angular-filemanager>
		</div>
	</div>
</body>
<?php echo '<script'; ?>
 src="<?php echo PUBLIC_PATH;?>
static/js/material.js"><?php echo '</script'; ?>
>
</html>
<?php }
}
