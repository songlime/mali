<?php
/* Smarty version 3.1.29, created on 2016-03-26 02:17:19
  from "D:\workspace\mali\tpl\web\reg.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f5e31f77dbc0_91733793',
  'file_dependency' => 
  array (
    '461c35112f27e5f879ccb065115d4579ff665e2c' => 
    array (
      0 => 'D:\\workspace\\mali\\tpl\\web\\reg.tpl',
      1 => 1458901900,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f5e31f77dbc0_91733793 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
		<?php echo '<script'; ?>
 src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="/tpl/web/js/reg.js"><?php echo '</script'; ?>
>
	</head>
	<body>
		<div>
			<form>
				<label>请输入手机号<input type="text" placeholder="请输入手机号" class="" id="" /></label>
				<input type="button" id="getcode" value="获取验证码" />
				<label>验证码<input type="text" placeholder="请输入短信中的验证码" class="" id="" /></label>
				<input type="button" value="确认" />
			</form>
		</div>
	</body>
</html><?php }
}
