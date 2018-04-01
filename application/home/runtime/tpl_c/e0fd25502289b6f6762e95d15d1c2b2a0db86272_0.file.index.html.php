<?php
/* Smarty version 3.1.32-dev-38, created on 2018-03-29 13:22:26
  from '/home/vagrant/Code/Face/application/home/view/index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5abc781299c083_65611230',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0fd25502289b6f6762e95d15d1c2b2a0db86272' => 
    array (
      0 => '/home/vagrant/Code/Face/application/home/view/index.html',
      1 => 1522240058,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5abc781299c083_65611230 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14560916275abc781299a390_24994604', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.html");
}
/* {block "content"} */
class Block_14560916275abc781299a390_24994604 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_14560916275abc781299a390_24994604',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">树莓派+人脸识别</h1>
      <div class="row center">
        <h5 class="header col s12 light">基于树莓派+OpenCV+Python3+Php的人脸识别项目</h5>
      </div>
      <div class="row center">
        <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">现在就开始</a>
      </div>
      <br><br>

    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">轻量级</h5>

            <p class="light">我们使用树莓派作为人脸识别的载体，进行一个微小的嵌入式开发，让树莓派变得更酷，树莓派体型小，便于安装在任何地方，价格低，可以实现我们的大部分的需求。轻量级的人脸设别设备，正在你的眼前呈现</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
            <h5 class="center">人脸准确识别</h5>

            <p class="light">基于最新的OpenCV图像识别库，使用Python3进行开发，可以比较准确的识别出目标，并且作出相应的判断，基于深度学习的代码思想，可以将图片转化为yml进行信息的储存。</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">容易使用</h5>

            <p class="light">我们使用python编写了一个GUI对话框，可以更加方便用户的使用，同时我们使用PHP编写了web端的控制台和数据汇总中心，可以记录进行人脸识别的每一位用户的时间，图片，状态。实现云同步</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>
  </div>
<?php
}
}
/* {/block "content"} */
}
