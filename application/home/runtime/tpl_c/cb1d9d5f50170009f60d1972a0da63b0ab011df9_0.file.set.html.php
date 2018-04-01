<?php
/* Smarty version 3.1.32-dev-38, created on 2018-03-29 21:16:19
  from '/home/vagrant/Code/Face/application/home/view/user/set.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5abce7238bea72_24525646',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb1d9d5f50170009f60d1972a0da63b0ab011df9' => 
    array (
      0 => '/home/vagrant/Code/Face/application/home/view/user/set.html',
      1 => 1522324762,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5abce7238bea72_24525646 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="zh-cn" data-ng-app="FileManagerApp">
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <meta name="theme-color" content="#4e64d9"/>
    <title>{block name="title"}{/block}</title>
    <?php echo '<script'; ?>
 src="<?php echo STATIC_PATH;?>
/js/jquery.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>
/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>
/css/material.css"/>
    <?php echo '<script'; ?>
 src="<?php echo STATIC_PATH;?>
/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>
/css/font-awesome.min.css">
    <link href="<?php echo STATIC_PATH;?>
/css/angular-filemanager.min.css" rel="stylesheet">
    <link href="<?php echo STATIC_PATH;?>
/css/toastr.min.css" rel="stylesheet">
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo STATIC_PATH;?>
/js/toastr.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
    <?php echo '</script'; ?>
>

    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>
/css/setting.css"/>
    <style type="text/css">
        .col-md-3 {
            padding-right: 15px;
            padding-left: 15px;
        }
    </style>
</head>
<body>
<div id="container">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="/">

                </a>

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
                        <a href="#" class="dropdown-toggle avatar-a" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false"><img src="/Member/Avatar/user_id/s"
                                                                           class="img-circle avatar-s"> user_id<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/Profile/user_id">个人主页</a></li>
                            <li><a href="/Member/Setting">设置</a></li>

                            <li><a href="/Admin">管理面板</a></li>

                            <li role="separator" class="divider"></li>
                            <li><a href="/Member/LogOut">退出登录</a></li>
                        </ul>
                    </li>
                    <li class="mobile-addition">
                        <a href="/Share/My" role="button" aria-haspopup="true"><i class="fa fa-share-alt"
                                                                                  aria-hidden="true"></i> 我的分享</a>
                    </li>
                    <li class="mobile-addition">
                        <a href="/Explore/Search" role="button" aria-haspopup="true"><i class="fa fa-search"
                                                                                        aria-hidden="true"></i> 搜索分享</a>
                    </li>
                    <li class="mobile-addition">
                        <a href="/Home/Album" role="button" aria-haspopup="true"><i class="fa fa-picture-o"
                                                                                    aria-hidden="true"></i> 图片集</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="upload_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="closeUpload()" data-dismiss="modal" aria-label="Close">
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

                                <button class="btn btn-raised btn-info btn-lg upload_button" id="pickfiles">
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
                            <div class="info_box" id="info_box">
                                <br>
                                <div class="drag_info">
                                    <span class="info_icon"><i class="glyphicon glyphicon-inbox"></i></span>
                                    <div class="info_text">拖动文件至此开始上传</div>
                                </div>
                            </div>
                            <div class="upload_box" style="display:none;" id="upload_box">
                                <table class="table table-striped table-hover text-left" style="display:none;">
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
    <div class="col-md-2 s" id="side">
        <div class="list-group" id="b">
            <a href="/Home" class="list-group-item">
                <i class="fa fa-file" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; 信息汇总
            </a>
            <a href="/Share/My" class="list-group-item"> <i class="fa fa-share-alt" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                注册用户
            </a>
            <a href="/Explore/Search" class="list-group-item">
                <i class="fa fa-search" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; 非法扫描
            </a>
            <a href="/Home/Album" class="list-group-item">
                <i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; 设置
            </a>
        </div>
    </div>


    <div class="col-md-10 quota_content">
        <h1>用户设置</h1>
        <br>
        <div class="fix_side">
            <div class="fix">
                <div class="col-md-9">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">基本信息
                            <div class="ripple-container"></div>
                        </a></li>
                        <li class=""><a href="#security" data-toggle="tab" aria-expanded="false">安全设置
                            <div class="ripple-container"></div>
                        </a></li>
                        <li class=""><a href="#password" data-toggle="tab" aria-expanded="false">修改密码
                            <div class="ripple-container"></div>
                        </a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="home">
                            <div class="panel panel-default">
                                <div class="panel-body" id="packs">
                                    <div class="col-md-8">
                                        <div class="row fix">
                                            <div class="col-md-3 option_name"><label for="uid">UID：</label></div>
                                            <div class="col-md-9">
                                                <div class="non_input">user_id</div>
                                            </div>
                                        </div>
                                        <div class="row fix">
                                            <div class="col-md-3 option_name"><label for="nick">昵称：</label></div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="nick" value="user_id">
                                            </div>
                                        </div>

                                        <div class="row fix">
                                            <div class="col-md-3 option_name"><label for="email">Email：</label></div>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control" id="email" value="user_id"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row fix">
                                            <div class="col-md-3 option_name"><label for="inputEmail">用户组：</label></div>
                                            <div class="col-md-9">
                                                <div class="non_input group">user_id</div>
                                            </div>
                                        </div>
                                        <div class="row fix">
                                            <div class="col-md-3 option_name"><label for="inputEmail">注册日期：</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="non_input ">user_id</div>
                                            </div>
                                        </div>
                                        <div class="row fix">
                                            <div class="col-md-3 option_name"><label for="inputEmail"></label></div>
                                            <div class="col-md-9">
                                                <div class="non_input ">
                                                    <button class="btn btn-raised btn-primary" id="saveNick">保存更改
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="avatar">
                                            <img src="/Member/Avatar/user_id/l?cache=no"
                                                 class="img-circle avatar-img"><br>
                                            <button class="btn btn-primary" data-toggle="modal"
                                                    data-target="#avatar_modal"><i class="fa fa-pencil-square-o"
                                                                                   aria-hidden="true"></i> 修改头像
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="security">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row fix">
                                        <div class="col-md-3 option_name"><label for="inputEmail">开启注册：</label></div>
                                        <div class="col-md-9">
                                            <div>
                                                <div class="togglebutton">
                                                    <label>
                                                        <input type="checkbox" id="homePage" checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row fix">
                                        <div class="col-md-3 option_name" style="margin-top: 10px;"><label
                                                for="inputEmail">使用注册密钥</label></div>
                                        <div class="col-md-9">
                                            <form id="loginForm">
                                                <div class="form-group  label-floating">
                                                    <label class="control-label" for="inputEmail">Email 电子邮箱</label>
                                                    <input type="text" class="form-control" id="inputEmail" name="userMail">
                                                </div>
                                                <div class="form-group  label-floating">
                                                    <label class="control-label" for="inputPwd">密码</label>
                                                    <input type="password" class="form-control" id="inputPwd" name="userPass">
                                                </div>


                                                <div class="input-group form-group label-floating">
                                                    <label class="control-label" for="captcha">验证码</label>
                                                    <input type="text" id="captcha" class="form-control" name="captchaCode">
                                                    <span class="input-group-btn">
                                                      <div class="captcha_img">验证码位置</div>
                                                  </span>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="password">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row fix">
                                        <div class="col-md-3 option_name"><label for="inputEmail">原密码：</label></div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" id="passOrigin">
                                        </div>
                                    </div>
                                    <div class="row fix">
                                        <div class="col-md-3 option_name"><label for="inputEmail">新密码：</label></div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" id="passNew">
                                        </div>
                                    </div>
                                    <div class="row fix">
                                        <div class="col-md-3 option_name"><label for="inputEmail">确认新密码：</label></div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" id="passNewRepet">
                                        </div>
                                    </div>
                                    <div class="row fix">
                                        <div class="col-md-3 option_name"><label for="inputEmail"></label></div>
                                        <div class="col-md-9">
                                            <div class="non_input ">
                                                <button class="btn btn-raised btn-primary waves-effect" id="savePwd">
                                                    保存更改
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">公告</div>
                        <div class="panel-body">
                            公告内容
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="fix_side">
            <div class="fix">

            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="avatar_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">修改头像</h4>
                </div>
                <div class="modal-body">
                    <div class="row fix">
                        <div class="col-md-4">
                            <div class="avatar"><img src="/Member/Avatar/{$userInfo.uid}/l?cache=no"
                                                     class="img-circle avatar-img"><br></div>
                        </div>
                        <div class="col-md-8">
                            <div class="alert alert-success">
                                由于时间紧迫此功能作为TODO，放于此处占位，等待开发
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary " data-dismiss="modal">取消</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="two_step_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">开启二步验证</h4>
                </div>
                <div class="modal-body">
                    <div class="row fix">
                        <div class="col-md-4"><img id="qrcode"></div>
                        <div class="col-md-8">
                            <div class="alert alert-success" role="alert">
                                请使用任意二步验证APP或者支持二步验证的密码管理软件扫描左侧二维码添加本站。扫描完成后请填写二步验证APP给出的6位验证码以开启二步验证。
                            </div>
                            <input type="number" class="form-control" placeholder="请输入6位验证码" id="vCode">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info " id="confirm">确认开启</button>
                    <button class="btn btn-primary " data-dismiss="modal">取消</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="set_webdav_pwd">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">设置WebDAV认证密码</h4>
                </div>
                <div class="modal-body">
                    <div class="row fix">
                        <label>请输入密码：</label>
                        <input type="password" id="webdav_pwd" class="form-control" autocomplete="false">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info " id="confirmWebdav">保存</button>
                    <button class="btn btn-primary " data-dismiss="modal">取消</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</body>
<?php echo '<script'; ?>
 src="<?php echo STATIC_PATH;?>
/js/material.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo STATIC_PATH;?>
/js/uploader.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo STATIC_PATH;?>
/js/setting.js"><?php echo '</script'; ?>
>

</html>
<?php }
}
