<?php
/* Smarty version 3.1.32-dev-38, created on 2018-03-29 15:48:58
  from '/home/vagrant/Code/Face/application/home/view/user/active_success.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5abc9a6a104a41_07500015',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ae32cbc0188e893f41ece7acad6cd469e1d153f' => 
    array (
      0 => '/home/vagrant/Code/Face/application/home/view/user/active_success.html',
      1 => 1522309707,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5abc9a6a104a41_07500015 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="zh-cn">
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <meta name="theme-color" content="#4e64d9"/>
    <title>激活信息</title>
    <!-- third party -->
    <?php echo '<script'; ?>
 src="<?php echo STATIC_PATH;?>
/js/jquery.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>
/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>
/css/material.css"/>
    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>
/css/animate.css"/>
    <?php echo '<script'; ?>
 src="<?php echo STATIC_PATH;?>
/js/material.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo STATIC_PATH;?>
/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>
/css/font-awesome.min.css">
    <!-- /third party -->
    <!-- Comment if you need to use raw source code -->
    <link href="<?php echo STATIC_PATH;?>
/css/toastr.min.css" rel="stylesheet">
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo STATIC_PATH;?>
/js/toastr.min.js"><?php echo '</script'; ?>
>
    <!-- /Comment if you need to use raw source code -->
    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>
/css/login.css"/>
    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>
/css/photoswipe.css">
    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>
/css/default-skin/default-skin.css">
    <?php echo '<script'; ?>
 src="<?php echo STATIC_PATH;?>
/js/jquery.color.js"><?php echo '</script'; ?>
>
</head>
<body data-ma-header="teal">
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="container">
            <div class="navbar-header">
                <div>
                    <a class="navbar-brand" href="/">

                    </a>
                </div>

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
                                                                           class="img-circle avatar-s">
                           昵称 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/Home">我的文件</a></li>
                            <li><a href="/Profile/user_id">个人主页</a></li>
                            <li><a href="/Profile/user_id">个人主页</a></li>
                            <li><a href="/Member/Setting">设置</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/Member/LogOut">退出登录</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/Login" class="dropdown-toggle" role="button" aria-haspopup="true"
                           aria-expanded="false"><i class="fa fa-user mr-1"></i> 登录/注册 </a>

                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </div>
</nav>
<div class="header-panel shadow-z-2">
    <div class="container-fluid">
        <div class="row">

        </div>
    </div>
</div>
<div class="container main">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="jumbotron">
            <div class="card_top">
                <div class="row top-color">
                    <div class="card-top-row">
                        <div class="login-icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                        <div class="login-text">注册成功</div>
                    </div>
                </div>
            </div>

            <div class="card_botom">
                <div class="row bottom-width">
                    <br>
                    您已成功激活账号。<br><br>
                    <a class="btn btn-raised btn-primary" href="/Login">立即登录</a>
                </div>
            </div>
        </div>
    </div>


</div>
</div>
<div class="col-md-4"></div>
</div>
</div>
</body>

<?php echo '<script'; ?>
 type="text/javascript">


<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo STATIC_PATH;?>
/js/two_step.js"><?php echo '</script'; ?>
>
</html><?php }
}
