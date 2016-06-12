<?php
/* Smarty version 3.1.29, created on 2016-06-12 07:48:58
  from "D:\wamp\wamp\www\mali\tpl\web\reg.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575d13eaedfcd2_25860519',
  'file_dependency' => 
  array (
    '7ec1671eda484f1d048c055873c71aae471c9a6d' => 
    array (
      0 => 'D:\\wamp\\wamp\\www\\mali\\tpl\\web\\reg.tpl',
      1 => 1463127183,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575d13eaedfcd2_25860519 ($_smarty_tpl) {
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
			<form action="/usr/register" method="POST">
				<label>用户名<input type="text" placeholder="请输入用户名" class="" id="" name="username" /></label>
				<label>手机号<input type="text" placeholder="请输入手机号" class="" id="" name="mobile" /></label>
				<input type="button" id="getcode" value="获取验证码" />
				<label>密码<input type="text" placeholder="请输入密码" class="" id="" name="password" /></label>
				<label>重复密码<input type="text" placeholder="请再次输入密码" class="" id="" name="password_repeat" /></label>
				<input type="submit" value="确认" />
			</form>
		</div>
	</body>
</html><?php }
}
