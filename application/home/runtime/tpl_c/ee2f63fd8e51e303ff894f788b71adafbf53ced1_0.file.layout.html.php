<?php
/* Smarty version 3.1.32-dev-38, created on 2018-03-30 15:22:20
  from '/home/vagrant/Code/Face/application/home/view/layout.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5abde5acbacac6_03160546',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee2f63fd8e51e303ff894f788b71adafbf53ced1' => 
    array (
      0 => '/home/vagrant/Code/Face/application/home/view/layout.html',
      1 => 1522394428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5abde5acbacac6_03160546 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>人脸识别控制台</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo PUBLIC_PATH;?>
/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?php echo PUBLIC_PATH;?>
/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>


<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="?a=loginAction">登录</a></li>
            <li><a href="?a=loginAction">注册</a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><img src="<?php echo STATIC_PATH;?>
/img/default.png" alt="" class="circle responsive-img" width="60"></a><
            </li>
        </ul>
        <!--<ul id="nav-mobile" class="side-nav">
            <li><a href="#">Navbar Link</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>-->
    </div>
</nav>
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    <li><a href="#!">设置</a></li>
    <li><a href="#!">控制面板</a></li>
    <li class="divider"></li>
    <li><a href="#!">退出登录</a></li>
</ul>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7128384625abde5acba9730_83575396', "content");
?>


<footer class="page-footer orange">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">关于</h5>
                <p class="grey-text text-lighten-4">一群热爱学习，思考，动手，创造的大学生，相信知识就是力量，可以改变未来，我们的征途是汪洋大海！</p>


            </div>
            <div class="col l3 s12">

            </div>

        </div>
    </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Create by <a class="orange-text text-lighten-3" href="https://github.com/aimerforreimu">新日暮里哲学队</a>
        </div>
    </div>
</footer>


<!--  Scripts-->
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-2.1.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo PUBLIC_PATH;?>
/js/materialize.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo PUBLIC_PATH;?>
/js/init.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
/* {block "content"} */
class Block_7128384625abde5acba9730_83575396 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_7128384625abde5acba9730_83575396',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
}
