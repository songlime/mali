<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>{$title}</title>
		<script src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
		<script type="text/javascript" src="/tpl/web/js/reg.js"></script>
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
</html>