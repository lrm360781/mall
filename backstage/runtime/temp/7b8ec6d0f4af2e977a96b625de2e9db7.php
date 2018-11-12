<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\PHP\MyProjects\backstage\public/../application/index\view\user\login.html";i:1541396539;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<!--<script type="text/javascript" src="/backstage/public/static/lib/html5.js"></script>
<script type="text/javascript" src="/backstage/public/static/lib/respond.min.js"></script>
<![endif]-->
<link href="/backstage/public/static/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/backstage/public/static/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/backstage/public/static/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/backstage/public/static/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<!--
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>后台登录 - H-ui.admin.page v3.0</title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
	<div id="loginform" class="loginBox">
		<form class="form form-horizontal" action="index.html" method="post">
			<div class="row cl">
				<label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
				<div class="formControls col-xs-8">
					<input id="" name="name" type="text" placeholder="账户" class="input-text size-L">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
				<div class="formControls col-xs-8">
					<input id="" name="password" type="password" placeholder="密码" class="input-text size-L">
				</div>
			</div>
			<div class="row cl">
				<div class="formControls col-xs-8 col-xs-offset-3">
					<input name="verify" class="input-text size-L" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" style="width:150px;">
					<img id="verify_img" src="<?php echo captcha_src(); ?>" alt="验证码">
					<a href="javascript:refreshVerify();">点击刷新</a>
				</div>
			</div>
			<div class="row cl">
				<div class="formControls col-xs-8 col-xs-offset-3">
					<label for="online">
						<input type="checkbox" name="online" id="online" value="">
						使我保持登录状态</label>
				</div>
			</div>
			<div class="row cl">
				<div class="formControls col-xs-8 col-xs-offset-3">
					<input name="" id="login" type="button" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
				</div>
			</div>
		</form>
	</div>
</div>
<div class="footer">Copyright 你的公司名称 by H-ui.admin.page.v3.0</div>

<script type="text/javascript" src="/backstage/public/static/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/backstage/public/static/static/h-ui/js/H-ui.js"></script>

<!--Ajax提交脚本-->
<script>
	$(function(){
		//给登录按钮添加点击事件
		$("#login").on('click',function(event) {
		    $.ajax({
				type:"POST",//提交方式为POST
				url:"<?php echo url('checkLogin'); ?>",//设置提交数据的脚本文件的地址
				data:$("form").serialize(),//将表单数据序列化以后提交
				dataType:'json',//设置提交数据类型为json
				success:function(data){
				    if(data.status==1){
				        alert(data.message);
				        window.location.href="<?php echo url('index/index'); ?>";
					}else{
				        alert(data.message);
					}
				}
			})
		})
	})
</script>
<!--刷新验证码-->
<script>
    function refreshVerify(){

        var str = Date.parse(new Date())/1000;
        $('#verify_img').attr("src", "/captcha?id="+str);
    }
</script>
</body>
</html>