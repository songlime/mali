<?php
/* Smarty version 3.1.29, created on 2016-05-13 08:16:42
  from "D:\wamp\wamp\www\mali\tpl\web\log.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57358d6aa48878_21299498',
  'file_dependency' => 
  array (
    '78d08180dfaf87fca28fb1dccfca440732a009fb' => 
    array (
      0 => 'D:\\wamp\\wamp\\www\\mali\\tpl\\web\\log.tpl',
      1 => 1463127366,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57358d6aa48878_21299498 ($_smarty_tpl) {
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
			<form action="/usr/login" method="POST">
				<label>用户名<input type="text" placeholder="请输入用户名" class="" id="" name="username" /></label>
				<label>密码<input type="text" placeholder="请输入密码" class="" id="" name="password" /></label>
				<input type="submit" value="确认" />
			</form>
		</div>
	</body>
</html><?php }
}
