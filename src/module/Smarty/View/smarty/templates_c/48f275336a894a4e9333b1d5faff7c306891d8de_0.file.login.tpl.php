<?php /* Smarty version 3.1.25, created on 2015-07-06 14:58:38
         compiled from "/Users/xiaoqiu/Documents/zfblog/ZendSkeletonApplication/module/Smarty/view/smarty/templates/admin/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:113747763559a271e927687_07470759%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48f275336a894a4e9333b1d5faff7c306891d8de' => 
    array (
      0 => '/Users/xiaoqiu/Documents/zfblog/ZendSkeletonApplication/module/Smarty/view/smarty/templates/admin/login.tpl',
      1 => 1436165782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113747763559a271e927687_07470759',
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.25',
  'unifunc' => 'content_559a271ea08fd2_26574648',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559a271ea08fd2_26574648')) {
function content_559a271ea08fd2_26574648 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '113747763559a271e927687_07470759';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>MicroAutumn admin login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="/css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="/css/charisma-app.css" rel="stylesheet">
    <link href='/bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='/bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='/bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='/bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='/css/jquery.noty.css' rel='stylesheet'>
    <link href='/css/noty_theme_default.css' rel='stylesheet'>
    <link href='/css/elfinder.min.css' rel='stylesheet'>
    <link href='/css/elfinder.theme.css' rel='stylesheet'>
    <link href='/css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='/css/uploadify.css' rel='stylesheet'>
    <link href='/css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <?php echo '<script'; ?>
 src="/bower_components/jquery/jquery.min.js"><?php echo '</script'; ?>
>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="http://html5shim.googlecode.com/svn/trunk/html5.js"><?php echo '</script'; ?>
>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="/img/favicon.ico">

</head>

<body>
<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to MicroAutumn</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please login with your Username and Password.
            </div>
            <form class="form-horizontal" action="/admin/login" method="post">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input name='name' type="text" class="form-control" placeholder="Username">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input name='password' type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="clearfix"></div>

                    <div class="input-prepend">
                        <label class="remember" for="remember"><input type="checkbox" id="remember"> Remember me</label>
                    </div>
                    <div class="clearfix"></div>
                    <input type="hidden" name="test" value="sss">
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </p>
                </fieldset>
            </form>
            <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Error!</strong> <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

            </div>
            <?php }?>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- external javascript -->

<?php echo '<script'; ?>
 src="/bower_components/bootstrap/dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>

<!-- library for cookie management -->
<?php echo '<script'; ?>
 src="/js/jquery.cookie.js"><?php echo '</script'; ?>
>
<!-- calender plugin -->
<?php echo '<script'; ?>
 src='/bower_components/moment/min/moment.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src='/bower_components/fullcalendar/dist/fullcalendar.min.js'><?php echo '</script'; ?>
>
<!-- data table plugin -->
<?php echo '<script'; ?>
 src='/js/jquery.dataTables.min.js'><?php echo '</script'; ?>
>

<!-- select or dropdown enhancer -->
<?php echo '<script'; ?>
 src="/bower_components/chosen/chosen.jquery.min.js"><?php echo '</script'; ?>
>
<!-- plugin for gallery image view -->
<?php echo '<script'; ?>
 src="/bower_components/colorbox/jquery.colorbox-min.js"><?php echo '</script'; ?>
>
<!-- notification plugin -->
<?php echo '<script'; ?>
 src="/js/jquery.noty.js"><?php echo '</script'; ?>
>
<!-- library for making tables responsive -->
<?php echo '<script'; ?>
 src="/bower_components/responsive-tables/responsive-tables.js"><?php echo '</script'; ?>
>
<!-- tour plugin -->
<?php echo '<script'; ?>
 src="/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"><?php echo '</script'; ?>
>
<!-- star rating plugin -->
<?php echo '<script'; ?>
 src="/js/jquery.raty.min.js"><?php echo '</script'; ?>
>
<!-- for iOS style toggle switch -->
<?php echo '<script'; ?>
 src="/js/jquery.iphone.toggle.js"><?php echo '</script'; ?>
>
<!-- autogrowing textarea plugin -->
<?php echo '<script'; ?>
 src="/js/jquery.autogrow-textarea.js"><?php echo '</script'; ?>
>
<!-- multiple file upload plugin -->
<?php echo '<script'; ?>
 src="/js/jquery.uploadify-3.1.min.js"><?php echo '</script'; ?>
>
<!-- history.js for cross-browser state change on ajax -->
<?php echo '<script'; ?>
 src="/js/jquery.history.js"><?php echo '</script'; ?>
>
<!-- application script for Charisma demo -->
<?php echo '<script'; ?>
 src="/js/charisma.js"><?php echo '</script'; ?>
>


</body>
</html>
<?php }
}
?>