<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="{{asset('back')}}/static/h-ui/css/H-ui.min.css" />
	<link rel="stylesheet" type="text/css" href="{{asset('back')}}/static/h-ui.admin/css/H-ui.admin.css" />
	<link rel="stylesheet" type="text/css" href="{{asset('back')}}/{{asset('back')}}/lib/Hui-iconfont/1.0.7/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="{{asset('back')}}/{{asset('back')}}/lib/icheck/icheck.css" />
	<link rel="stylesheet" type="text/css" href="{{asset('back')}}/static/h-ui.admin/skin/default/skin.css" id="skin" />
	<link rel="stylesheet" type="text/css" href="{{asset('back')}}/static/h-ui.admin/css/style.css" />

<!--/meta 作为公共模版分离出去-->

<title>添加管理员 - 管理员管理 - H-ui.admin v2.4</title>
<meta name="keywords" content="H-ui.admin v2.3,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v2.3，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add" action="{{url('/admin/admin')}}" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="username" name="username">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="password">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2" name="password2">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>昵称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="nickname" name="nickname">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>头像：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="file" class="input-text" value="" placeholder="" id="avatar" name="avatar">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="radio-box">
				<input name="sex" type="radio" value="1"  checked="checked">
				<label for="sex-1">男</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="sex-2" value="2" name="sex">
				<label for="sex-2">女</label>
			</div>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="phone" name="phone">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="@" name="email" id="email">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">角色：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="role_id" size="1">
				<option value="0">超级管理员</option>
				<option value="1">总编</option>
				<option value="2">栏目主辑</option>
				<option value="3">栏目编辑</option>
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">备注：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="note" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="textarealength(this,100)"></textarea>
			<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('back')}}/{{asset('back')}}/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('back')}}/{{asset('back')}}/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="{{asset('back')}}/{{asset('back')}}/lib/icheck/jquery.icheck.min.js"></script>
<script type="text/javascript" src="{{asset('back')}}/{{asset('back')}}/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{asset('back')}}/{{asset('back')}}/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="{{asset('back')}}/{{asset('back')}}/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<script type="text/javascript" src="{{asset('back')}}/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="{{asset('back')}}/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="{{asset('back')}}/{{asset('back')}}/lib/jquery.form.js"></script>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});

	$("#form-admin-add").validate({
		// rules:{
		// 	adminName:{
		// 		required:true,
		// 		minlength:4,
		// 		maxlength:16
		// 	},
		// 	password:{
		// 		required:true,
		// 	},
		// 	password2:{
		// 		required:true,
		// 		equalTo: "#password"
		// 	},
		// 	sex:{
		// 		required:true,
		// 	},
		// 	phone:{
		// 		required:true,
		// 		isPhone:true,
		// 	},
		// 	email:{
		// 		required:true,
		// 		email:true,
		// 	},
		// 	adminRole:{
		// 		required:true,
		// 	},
		// },
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
		    // console.log(form);
			$(form).ajaxSubmit(function (res) {
			    //console.log(333,res);
				if (res.status){
					layer.msg(res.message,{icon:6});
					//刷新
					parent.location.reload();
				}else{
				    var error = '';
				    for (index in res.message){
				        error += res.message[index].toString()+'<br />';
					}
					layer.msg(error,{icon:5});
				}
            });
			// var index = parent.layer.getFrameIndex(window.name);
			// parent.$('.btn-refresh').click();
			// parent.layer.close(index);
		}
	});
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>