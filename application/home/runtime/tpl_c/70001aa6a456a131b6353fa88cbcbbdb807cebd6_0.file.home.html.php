<?php
/* Smarty version 3.1.32-dev-38, created on 2018-03-29 21:07:26
  from '/home/vagrant/Code/Face/application/home/view/user/all_users.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5abce50e78af85_07214917',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70001aa6a456a131b6353fa88cbcbbdb807cebd6' => 
    array (
      0 => '/home/vagrant/Code/Face/application/home/view/user/all_users.html',
      1 => 1522328845,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5abce50e78af85_07214917 (Smarty_Internal_Template $_smarty_tpl) {
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

        .divcss5-left {
            float: left;
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
    <!--DashBroad-->
    <div class="col-md-10 quota_content">
        <h1>信息概览</h1>
        <br>
        <div class="fix_side">
            <div class="col-md-3">
                <div class="panel panel-success" style="background-color: #4ca5fc">
                    <div class="panel-body">
                        <div class="panel-title">
                            <h3>认证用户</h3>
                        </div>
                        <div style="float: right">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <hr>
                        <b>200人</b>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-success" style="background-color: #975cff">
                    <div class="panel-body">
                        <div class="panel-title">
                            <h3>识别次数</h3>
                        </div>
                        <div style="float: right">
                            <i class="fa fa-pie-chart fa-5x"></i>
                        </div>
                        <hr>
                        <b>3000次</b>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" style="background-color: #00bb00">
                    <div class="panel-body">
                        <div class="panel-title">
                            <h3>成功识别</h3>
                        </div>
                        <div style="float: right">
                            <i class="fa fa-key fa-5x"></i>
                        </div>
                        <hr>
                        <b>2588次</b>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" style="background-color: #78909c">
                    <div class="panel-body">
                        <div class="panel-title">
                            <h3>非法识别</h3>
                        </div>
                        <div style="float: right">
                            <i class="fa fa-warning fa-5x"></i>
                        </div>
                        <hr>
                        <b>412次</b>
                    </div>
                </div>
            </div>
            <div class="col-md-5 " style="margin-left: 15px;margin-right: 15px">
                <div class="panel panel-default">
                    <div class="panel-heading">使用须知</div>
                    <div class="panel-body">
                        <b>本项目的代码和硬件只能使用于实验环境，不能保证100%的准确率，造成任何损失本项目不负责。
                            <br>
                            你可以在这里查看人脸识别的总次数，人脸识别成功的用户，人脸识别失败的用户（非法识别），以及注册认证的用户（即人脸识别库中拥有这些用户的人脸信息）</b>
                    </div>
                </div>
            </div>
            <!--/DashBroad-->
        </div>
    </div>
</div>
</body>
<?php echo '<script'; ?>
 src="<?php echo STATIC_PATH;?>
/js/material.js"><?php echo '</script'; ?>
>
</html>
<?php }
}
