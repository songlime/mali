<?php
/* Smarty version 3.1.29, created on 2016-06-22 03:58:35
  from "D:\wamp\wamp\www\mali\tpl\web\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576a0cebeb55e9_74254602',
  'file_dependency' => 
  array (
    'ea399f22515eac51188b5e1e57f822335c93a5d2' => 
    array (
      0 => 'D:\\wamp\\wamp\\www\\mali\\tpl\\web\\index.tpl',
      1 => 1466498855,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576a0cebeb55e9_74254602 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="Expires" content="0"> 
	<meta />
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
-马力汽车网</title>	
	<?php echo '<script'; ?>
 type="text/javascript" src="/tpl/web/js/js.js"><?php echo '</script'; ?>
>
	<link rel="stylesheet" type="text/css" href="/tpl/web/css/css.css" />
	<link rel="stylesheet" type="text/css" href="/tpl/web/css/global.css" />

</head>
<body>
<div id="wrap">
	<div style="display:none;"><?php echo var_dump($_smarty_tpl->tpl_vars['inf']->value);?>
</div>
	<div id="content">
		<div id="top">
			<a href="/log"><span>[登陆]</span></a>
			<a href="/reg"><span>[注册]</span></a>
		</div>
		<div id="head">
			<div><img class="logo" src="/tpl/web/img/logo.jpg" /></div>
		</div>
		<div id="slide"></div>
		<div id="block"></div>
	</div>
</div>
</body>
</html><?php }
}
