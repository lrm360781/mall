<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:91:"C:\myphp_www\PHPTutorial\WWW\backstage\public/../application/index\view\user\admin_add.html";i:1542279418;s:78:"C:\myphp_www\PHPTutorial\WWW\backstage\application\index\view\public\base.html";i:1542023307;s:78:"C:\myphp_www\PHPTutorial\WWW\backstage\application\index\view\public\meta.html";i:1542024079;s:80:"C:\myphp_www\PHPTutorial\WWW\backstage\application\index\view\public\footer.html";i:1541130565;}*/ ?>
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="favicon.ico" />
    <link rel="Shortcut Icon" href="favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/static/lib/html5.js"></script>
    <script type="text/javascript" src="/static/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/static/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/skin/default/skin.css" />
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!--/meta 作为公共模版分离出去-->


<title><?php echo (isset($title) && ($title !== '')?$title:'添加管理员'); ?></title>
<meta name="keywords" content="<?php echo (isset($keywords) && ($keywords !== '')?$keywords:'关键字'); ?>">
<meta name="description" content="<?php echo (isset($desc) && ($desc !== '')?$desc:'描述'); ?>">


</head>
<body>






<article class="cl pd-20">
	<form action="" method="post" class="form form-horizontal" id="form-admin-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input  type="text" class="input-text disabled" value="" placeholder="" id="name" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="password">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">启用状态：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<select class="select" name="status" size="1">
					<option value="1" selected>启用</option>
                    <option value="0">不启用</option>
				</select>
				</span>
			</div>
		</div>
		<!--<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="phone" name="tel">
			</div>
		</div>-->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="email" class="input-text" value="" placeholder="@" name="email" id="email">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">角色：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<select class="select" name="role" size="1">
					<option value="0">管理员</option>
					<option value="1">超级管理员</option>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="button" id="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>


<!--_footer 作为公共模版分离出去-->

<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/static/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<!--/_footer /作为公共模版分离出去-->


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/static/static/h-ui.admin/js/H-ui.admin.page.js"></script>

<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
    $(function() {

        //表单中数据改变才允许提交
        $("form").children().change(function () {
            $("#submit").removeClass('disabled');
        });

        //失去焦点时，检查用户名是否重复
        $("#name").blur(function () {
            $.ajax({
                type: 'GET',
                url: 'checkUserName',
                data: {name: $(this).val()},
                dataType: 'json',
                success: function (data) {
                    if (data.status == 1) {
                        alert(data.message);
                    } else {
                        alert(data.message);
                    }
                }
            });
        });

        //失去焦点时，检查邮箱是否重复
        $("#email").blur(function () {
            $.ajax({
                type: 'GET',
                url: 'checkUserEmail',
                data: {email: $(this).val()},
                dataType: 'json',
                success: function (data) {
                    if (data.status == 1) {
                        alert(data.message);
                    } else {
                        alert(data.message);
                    }
                }
            });
        });

        $("#submit").on("click", function(event){
            $.ajax({
                type: "POST",
                url: "<?php echo url('user/addUser'); ?>",
                data: $("#form-admin-add").serialize(),
                dataType: "json",
                success: function(data){
                    if (data.status == 1) {
                        alert(data.message);
                    } else {
                        alert(data.message);
                    }
                }
            });
        })
    })

</script>

</body>
</html>