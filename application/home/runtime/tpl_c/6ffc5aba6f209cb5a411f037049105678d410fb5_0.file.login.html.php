<?php
/* Smarty version 3.1.32-dev-38, created on 2018-03-29 17:19:32
  from '/home/vagrant/Code/Face/application/home/view/user/login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5abcafa42ffb85_89025537',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ffc5aba6f209cb5a411f037049105678d410fb5' => 
    array (
      0 => '/home/vagrant/Code/Face/application/home/view/user/login.html',
      1 => 1522310679,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5abcafa42ffb85_89025537 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="zh-cn" data-ng-app="FileManagerApp">
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <meta name="theme-color" content="#4e64d9"/>
    <title>用户登录</title>
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
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/Home">我的文件</a></li>
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
        <div class="jumbotron" id="logForm">
            <div class="card_top">
                <div class="row top-color">
                    <div class="card-top-row">
                        <div class="login-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>
                        <div class="login-text">登录后方可享用精彩内容</div>
                    </div>
                </div>
            </div>

            <div class="card_botom">
                <div class="row bottom-width">
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
                    <button class="btn btn-raised btn-primary" id="loginButton">登录</button>
                    <div class="link-group">
                        <a href="javascript:void" class="noWave" id="create" data-change="true">创建一个账户</a><br>
                        <a href="javascript:void" class="noWave" id="forgetSwitch2" data-change="true">忘记密码？</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="jumbotron" id="regForm" style="display: none;">
            <div class="card_top">
                <div class="row top-color">
                    <div class="card-top-row">
                        <div class="login-icon"><i class="fa fa-sign-in" aria-hidden="true"></i></div>
                        <div class="login-text">注册账户</div>
                    </div>
                </div>
            </div>

            <div class="card_botom">
                <div class="row bottom-width">
                    <form id="registerForm">
                        <div class="form-group  label-floating">
                            <label class="control-label" for="inputEmail">Email 电子邮箱</label>
                            <input type="text" class="form-control" id="inputEmail" name="username-reg">
                        </div>
                        <div class="form-group  label-floating">
                            <label class="control-label" for="inputPwd">密码</label>
                            <input type="password" class="form-control" id="inputPwd" name="password-reg">
                        </div>
                        <div class="form-group  label-floating">
                            <label class="control-label" for="inputPwd">重复密码</label>
                            <input type="password" class="form-control" id="inputPwd" name="password-check">
                        </div>


                        <div class="input-group form-group label-floating">
                            <label class="control-label" for="captcha">验证码</label>
                            <input type="text" id="captcha" class="form-control" name="captchaCode">
                            <span class="input-group-btn">
                                                      <div class="captcha_img">验证码地址</div>
                                                  </span>
                        </div>


                    </form>
                    <button class="btn btn-raised btn-primary" id="regButton">注册</button>
                    <div class="link-group">
                        <a href="javascript:void" class="noWave" id="loginSwitch3" data-change="true">已有账号？立即登录</a><br>
                        <a href="javascript:void" class="noWave" id="forgetSwitch" data-change="true">忘记密码？</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="jumbotron" id="emailCheck" style="display: none;">
            <div class="card_top">
                <div class="row top-color">
                    <div class="card-top-row">
                        <div class="login-icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        <div class="login-text">激活账户</div>
                    </div>
                </div>
            </div>

            <div class="card_botom">
                <div class="row bottom-width"><br>
                    我们已经向您的注册邮箱发送了一封确认邮件，请访问邮件中的激活链接以完成注册。如果未收到邮件，请检查您的垃圾邮件。<br><br>如果还仍无法接受邮件，请尝试更换注册邮箱或联系站点管理员。
                </div>
            </div>
        </div>


        <div class="jumbotron" id="forgetForm" style="display: none;">
            <div class="card_top">
                <div class="row top-color">
                    <div class="card-top-row">
                        <div class="login-icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i></div>
                        <div class="login-text">找回密码</div>
                    </div>
                </div>
            </div>

            <div class="card_botom">
                <div class="row bottom-width">
                    <form id="forgetPwdForm">

                        <div class="form-group  label-floating">
                            <label class="control-label" for="inputEmail">请填写注册时绑定的邮箱</label>
                            <input type="text" class="form-control" id="regEmail" name="regEmail">
                        </div>


                        <div class="input-group form-group label-floating">
                            <label class="control-label" for="captcha">验证码</label>
                            <input type="text" id="captcha" class="form-control" name="captchaCode">
                            <span class="input-group-btn">
                                                      <div class="captcha_img">验证码地址</div>
                                                  </span>
                        </div>


                    </form>
                    <button class="btn btn-raised btn-primary" id="findMyFuckingPwd">找回密码</button>
                    <div class="link-group">
                        <a href="javascript:void" class="noWave" id="loginSwitch2" data-change="true">返回登录</a><br>
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
/js/login.js"><?php echo '</script'; ?>
>

</html><?php }
}
