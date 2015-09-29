<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>eBlog管理系统</title>
		<link rel="stylesheet" type="text/css" href="/Public/AdminStyle/css/fontstyle.css" />
		<link rel="stylesheet" type="text/css" href="/Public/AdminStyle/css/admin.css" />	
		<link rel="stylesheet" type="text/css" href="/Public/AdminStyle/css/catemanacomon.css" />
		
		
	<link rel="stylesheet" href="/Public/AdminStyle/js/datejs/jquery.datetimepicker.css" />
	<link rel="stylesheet" href="/Public/AdminStyle/css/articlecomon.css" />

		<script>
			window.onload = function(){
				//切换登录显示当中箭头的旋转
				var oDiv = document.getElementById('login_status');
				var oDiv2 = document.getElementById('linght_white');
				var oJt = document.getElementById('jt');
				var b = true;
				oDiv.onmouseover = function(e){
					if(b){
						oDiv2.style.display = 'block';
						oJt.className = 'icon-circle-up';
						b = false;
					}else{
						oDiv2.style.display = 'none';
						oJt.className = 'icon-circle-down';
						b=true;
					}
				}
				oDiv.onmouseout = function(){
					oDiv2.style.display = 'none';
					oJt.className = 'icon-circle-down';
					b=true;
				}
				//设置左边栏和主体的高度
				var H =0;
	    		H = document.documentElement.clientHeight || document.body.clientHeight;
	    		h = oDiv.offsetHeight;
	    		var oSide =  document.getElementById('sidebar');
	    		var oCont = document.getElementById('admin_main');	    		
	    		oSide.style.height = H -h+'px';
	    		oCont.style.height = H -h +'px';			
			}
		</script>
	</head>
	<body>
		<!-- 头部 -->
			<div id="header" class="header">
	<div class="heder_title">
		<span class="icon-github2"></span>
		eBlog内容管理系统
	</div>
        	<ul id="login_status" class="login_status">
        		<li id="linght_blue" class="linght_blue">
        			<img src="/Public/AdminStyle/css/img/user-icon.jpg" class="user-icon"/>
	        		<span class="login_info">
	        			<small>欢迎回来</small>
	        			<?php echo session('admin.username');?>
	        		</span>
	        		<span id="jt" class=" icon-circle-down"></span>
	        		<div id="linght_white" class="linght_white">	
	        		     <div class="ara"></div>
		        	     <p>
		        	     	<span class=" icon-lock"></span>
		        	    	 <span onclick="$.dialog('<?php echo U('Admin/Manager/editMana');?>',this)"">修改密码</span>
		        	     </p>
		        	     <hr class="_hr"/>
		        	      <p>
		        	     	<span class="icon-switch"></span>
		        	    	<span><a href="<?php echo U('Login/logOut');?>">退出登陆</a></span>
		        	     </p>
	        		</div>
        		</li>
        	</ul>
      </div> 
		<!-- /头部 -->
		
        <div class="admin_content">
        	
        	<!--侧边栏-->	
	      	
		<div class="sidebar" id="sidebar">
	      	  	<ul class="side_nav">
	      	  		<li>
	      	  			<a href="<?php echo U('Admin/Index/index');?>" <?php if(article == 'index'): ?>class="side_menu active"<?php else: ?>class="side_menu"<?php endif; ?>>
	      	  				<span class="icon-home"></span>
	      	  				<span>控制台</span>
	      	  			</a> 		
	      	  		</li>
	      	  		<li>
	      	  			<a href="javascript:;" <?php if(article == 'article'): ?>class="side_menu active"<?php else: ?>class="side_menu"<?php endif; ?>>
	      	  				<span class="icon-bookmarks"></span>
	      	  				<span>文章管理</span>
	      	  				<b class="icon-plus"></b>
	      	  			</a>
	      	  			<ul class="nav_menu">
	      	  				<li><a href="<?php echo U('Admin/Article/listArticle');?>">文章列表</a></li>
	      	  				<li><a href="<?php echo U('Admin/Article/addArticle');?>">发表文章</a></li>
	      	  			</ul>
	      	  		</li>
	      	  		<li>
	      	  			<a href="javascript:;" <?php if(article == 'category'): ?>class="side_menu active"<?php else: ?>class="side_menu"<?php endif; ?>>
	      	  				<span class="icon-list"></span>
	      	  				<span>分类管理</span>
	      	  				<b class="icon-plus"></b>
	      	  			</a>
	      	  			<ul class="nav_menu">
	      	  				<li><a href="<?php echo U('Admin/Category/listCategory');?>">所有分类</a></li>
	      	  			</ul>
	      	  		</li>
	      	  		<li>
	      	  			<a href="javascript:;" <?php if(article == 'manager'): ?>class="side_menu active"<?php else: ?>class="side_menu"<?php endif; ?>>
	      	  				<span class="icon-users"></span>
	      	  				<span>用户管理</span>
	      	  				<b class="icon-plus"></b>
	      	  			</a>
	      	  			<ul class="nav_menu">
	      	  				<li><a href="<?php echo U('Admin/Manager/listManager');?>">用户列表</a></li>
	      	  			</ul>
	      	  		</li>
	      	  		<li>
	      	  			<a href="javascript:;" <?php if(article == 'websetting'): ?>class="side_menu active"<?php else: ?>class="side_menu"<?php endif; ?>>
	      	  				<span class="icon-cogs"></span>
	      	  				<span>系统设置</span>
	      	  				<b class="icon-plus"></b>
	      	  			</a>
	      	  			<ul class="nav_menu">
	      	  				<li><a href="<?php echo U('Admin/Websetting/info');?>">基础设置</a></li>
	      	  			</ul>
	      	  		</li>
	      	  	</ul>
</div>

			<!--/侧边栏-->
			
	      	<div class="admin_main" id="admin_main">
	      		<!--面包悄导航-->
	      	  	  <div class="main_header">
	      	  	  	<span class="icon-home"></span>
	      	  	  	<a href="#">首页</a>
	      	  	  	<span>></span>
	      	  	  	
	<span>发表文章</span>

	      	  	  </div>
	      	  	  <!--/面包悄导航-->
	      	  	  
	      	  	  <!--主体内容-->
	      	  	  
	<div class="main_content">
		<form  action="<?php echo U('Admin/Article/doAdd');?>" onsubmit="return $.add(this)" method="post" name="articles">
		<div  class="article_content">
			<label for="article_title">标题</label>
			<input type="text" id="article_title" name='title' placeholder="输入标题" /><br />
			<label for="article_cont">正文</label>
			<textarea id="edit_container" name="cont"></textarea>
			<div class="article_mianban">
				<label>分类</label>
		       	<select name="category">
		       	 	 <?php foreach($category as $key => $val): ?>
			       	 	<option value="<?php echo ($val["id"]); ?>"><?php echo ($val["catename"]); ?></option>
			       	 	 <?php foreach($val['child'] as $k =>$v): ?>
			       	 		<option style="color: dimgray;" value="<?php echo ($v["id"]); ?>">└─<?php echo ($v["catename"]); ?></option>
			       	 	<?php endforeach ?>
		       	 	<?php endforeach ?>
		       	</select><br />
		       	<label>作者</label>
		       	<select name="author">
		       		 <?php foreach($manager as $key => $v): ?>
		       	 	<option value="<?php echo ($v["username"]); ?>"><?php echo ($v["username"]); ?></option>
		       	 	<?php endforeach ?>
		       	</select><br />
		       	 <label>时间</label>
		       	 <input type="text" id="datetimepicker" name="time"><br />
		       	 <label>标签</label>
		       	 <input type="text" name="tags" />
		       	 <button type="submit" class="article_submit">提交</button>
			</div>
		</div>
		</form>
	</div>

	      	  	  <!--/主体内容-->
	      	</div>
      </div>
      <!--basic javascript-->
      <!--[if !IE]-->
        <script>
        	window.jQuery || document.write("<script src='/Public/AdminStyle/js/jquery.2.1.4.js'>"+"<"+"/script>")
        </script>
      <!--<![endif]-->
      <!--[if IE]>
      	<script>
      		window.jQuery || document.write("<script src='/Public/AdminStyle/js/jquery.1.11.3.js'>"+"<"+"/script>")
      	</script>
      <![endif]-->
        
         <script src="/Public/AdminStyle/js/transmenu.js" type="text/javascript"></script>  
         <script src="/Public/AdminStyle/js/dialog.js" type="text/javascript"></script>  
      
      
	<script type="text/javascript" src="/Public/AdminStyle/js/uEditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/Public/AdminStyle/js/uEditor/ueditor.all.js"></script>
	<script type="text/javascript" src="/Public/AdminStyle/js/datejs/jquery.datetimepicker.js"></script>
	<script>
		//设置ueEditor
		 var ue = UE.getEditor('edit_container',{
		 	initialFrameWidth:650,
		 	initialFrameHeight:200,
		 	zIndex:1,
		 });
		 $(function(){
		 	$('#datetimepicker').datetimepicker();

		 	$.extend({
		 		add:function(obj){
		 			if($('#article_title').val() == ''){
		 				alert('标题不能为空');
		 			}else{
		 			var obj = $(obj);
		 			$.ajax({
		 				type:"post",
		 				url:obj.attr('action'),
		 				data:obj.serialize(),
		 				success:function(respon){
		 						alert(respon.msg);
		 						window.location.href = respon.url;
		 				}
		 			});
		 			}
		 			return false;		
		 		}
		 	});
		 });
	</script>

	</body>
</html>