<?php
/* Smarty version 3.1.32-dev-38, created on 2018-03-29 15:41:15
  from '/home/vagrant/Code/Face/application/admin/view/msg.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5abc989ba19008_28218981',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db0a39545fb671ac67323d889caa9825cba7322e' => 
    array (
      0 => '/home/vagrant/Code/Face/application/admin/view/msg.html',
      1 => 1522309000,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5abc989ba19008_28218981 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="zh-cn">
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <meta name="theme-color" content="#4e64d9"/>
    <title>信息页面</title>
    <!-- third party -->
    <?php echo '<script'; ?>
 src="<?php echo STATIC_PATH;?>
/js/jquery.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>
/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>
/css/material.css" />
    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>
/css/animate.css" />
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
/css/error.css" />
</head>
<body data-ma-header="teal">

<div class="container" align="center">
    <header align="left">
        <br>
        <img src="<?php echo STATIC_PATH;?>
/img/logo_s.png" style="width:192px;">
    </header>
    <div class="error_content" >
        <div class="jumbotron animated bounce" style="padding-left:30px;">
            <h1><?php echo $_smarty_tpl->tpl_vars['info_title']->value;?>
</h1>
            <br>
            <p><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
            <p><a class="btn btn-primary btn-lg" onclick="history.go(-1);"><< 返回</a></p>
        </div>
    </div>
</div>
</body>
</html><?php }
}
