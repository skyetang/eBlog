<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>eBlog管理系统</title>
		<link rel="stylesheet" type="text/css" href="/Public/AdminStyle/css/fontstyle.css" />
		<link rel="stylesheet" type="text/css" href="/Public/AdminStyle/css/admin.css" />	
		<link rel="stylesheet" type="text/css" href="/Public/AdminStyle/css/catemanacomon.css" />
		
		
	<style>
		.web_setting{margin: 10px 20px;}
  		.web_table{width: 70%; border-collapse: collapse;}
  		.web_table .web_title{width: 40%;}
  		.web_table th{text-align: left; padding-left: 10px; background:whitesmoke; color: palevioletred;}
  		.web_title p{ line-height: 20px; margin: 20px; margin-left: 0;}
  		.web_table input{width: 380px; height: 24px; padding-left: 5px; margin:10px 0px 10px 0px; border: 1px solid gray;}
  		.web_table textarea{width: 380px; height: 80px; margin-top: 10px;}
  		.web_setting button{width: 120px; height: 32px; margin-top: 20px;}
  		.web_title b{margin: 0px; padding: 0px;}
	</style>

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
	      	  			<a href="<?php echo U('Admin/Index/index');?>" <?php if(websetting == 'index'): ?>class="side_menu active"<?php else: ?>class="side_menu"<?php endif; ?>>
	      	  				<span class="icon-home"></span>
	      	  				<span>控制台</span>
	      	  			</a> 		
	      	  		</li>
	      	  		<li>
	      	  			<a href="javascript:;" <?php if(websetting == 'article'): ?>class="side_menu active"<?php else: ?>class="side_menu"<?php endif; ?>>
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
	      	  			<a href="javascript:;" <?php if(websetting == 'category'): ?>class="side_menu active"<?php else: ?>class="side_menu"<?php endif; ?>>
	      	  				<span class="icon-list"></span>
	      	  				<span>分类管理</span>
	      	  				<b class="icon-plus"></b>
	      	  			</a>
	      	  			<ul class="nav_menu">
	      	  				<li><a href="<?php echo U('Admin/Category/listCategory');?>">所有分类</a></li>
	      	  			</ul>
	      	  		</li>
	      	  		<li>
	      	  			<a href="javascript:;" <?php if(websetting == 'manager'): ?>class="side_menu active"<?php else: ?>class="side_menu"<?php endif; ?>>
	      	  				<span class="icon-users"></span>
	      	  				<span>用户管理</span>
	      	  				<b class="icon-plus"></b>
	      	  			</a>
	      	  			<ul class="nav_menu">
	      	  				<li><a href="<?php echo U('Admin/Manager/listManager');?>">用户列表</a></li>
	      	  			</ul>
	      	  		</li>
	      	  		<li>
	      	  			<a href="javascript:;" <?php if(websetting == 'websetting'): ?>class="side_menu active"<?php else: ?>class="side_menu"<?php endif; ?>>
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
	      	  	  	
	<span>基础设置</span>

	      	  	  </div>
	      	  	  <!--/面包悄导航-->
	      	  	  
	      	  	  <!--主体内容-->
	      	  	  
   <div class="main_content">
   	<div class="web_setting">
   	<form action="<?php echo U('Admin/Websetting/edit');?>" onsubmit="return $.sub(this)" method="post" name="web_set">
   	  <table class="web_table">
   	  	<tr>
   	  		<th colspan="2">基本设置</th>
   	  	</tr>
   	  	<tr>
   	  		<td class="web_title"><strong>网站域名</strong></td>
   	  		<td><input type="text" value="<?php echo ($data["site"]); ?>" name="site" placeholder="以http://开头" /> </td>
   	  	</tr>
   	  		<tr>
   	  		<td class="web_title"><strong>网站标题</strong></td>
   	  		<td><input type="text" value="<?php echo ($data["title"]); ?>" name="title" /></td>
   	  	</tr>
   	  		<tr>
   	  		<td class="web_title"><strong>网站关键字</strong></td>
   	  		<td><input type="text" value="<?php echo ($data["keywords"]); ?>" name="keywords" /></td>
   	  	</tr>
   	  	<tr>
   	  		<td class="web_title"><strong>网站描述</strong></td>
   	  		<td><input type="text" value="<?php echo ($data["desc"]); ?>" name="desc" /></td>
   	  	</tr>
   	  	<tr>
   	  		<td class="web_title"><strong>网站励志语</strong></td>
   	  		<td><input type="text" value="<?php echo ($data["words"]); ?>" name="words" /></td>
   	  	</tr>
   	  		<tr>
   	  		<td class="web_title">
   	  			<p>
   	  				<strong>版权信息</strong><br />
   	  				<span>可以填入网站备案号、统计等信息</span>
   	  			</p>
   	  		</td>
   	  		<td>
   	  			<textarea  name="rights"><?php echo ($data["rights"]); ?></textarea>
   	  		</td>
   	  	</tr>
   	  </table>
   	  <button type="submit">提交</button>
   	 </form>
   	</div>
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
      
      
	<script>
		(function($){
			$.extend({
				sub:function(obj){
					var obj = $(obj);
					$.ajax({
						type:"post",
						url:obj.attr('action'),
						data:obj.serialize(),
						success:function(respon){
							if(respon.b == 1){
								alert('网站信息已更新！');
							}else if(respon.b == 2){
								alert('网站信息已设置！');
							}else{
								alert('亲，出错了，萌萌哒~');
							}
						}
					});
					return false;
				}
			});
		})(jQuery)
	</script>

	</body>
</html>