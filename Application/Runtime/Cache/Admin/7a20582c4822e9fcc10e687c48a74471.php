<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>eBlog管理系统</title>
		<link rel="stylesheet" type="text/css" href="/Public/AdminStyle/css/fontstyle.css" />
		<link rel="stylesheet" type="text/css" href="/Public/AdminStyle/css/admin.css" />
		<style>
		.active{background: white;}
		.open{display: block;}
		.close{display: none;}
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
        <div id="header" class="header">
        	<ul id="login_status" class="login_status">
        		<li id="linght_blue" class="linght_blue">
        			<img src="/Public/AdminStyle/css/img/user-icon.jpg" class="user-icon"/>
	        		<span class="login_info">
	        			<small>欢迎回来</small>
	        			admin
	        		</span>
	        		<span id="jt" class=" icon-circle-down"></span>
	        		<div id="linght_white" class="linght_white">	
	        		     <div class="ara"></div>
		        	     <p>
		        	     	<span class=" icon-lock"></span>
		        	    	 <span>修改密码</span>
		        	     </p>
		        	     <hr class="_hr"/>
		        	      <p>
		        	     	<span class="icon-switch"></span>
		        	    	<span>退出登陆</span>
		        	     </p>
	        		</div>
        		</li>
        	</ul>
      </div>  
        <div class="admin_content">
	      	<div class="sidebar" id="sidebar">
	      	  	<ul class="side_nav">
	      	  		<li >
	      	  			<a href="#" class="side_menu">
	      	  				<span class="icon-home"></span>
	      	  				<span>控制台</span>
	      	  			</a> 		
	      	  		</li>
	      	  		<li >
	      	  			<a href="#" class="side_menu">
	      	  				<span class="icon-bookmarks"></span>
	      	  				<span>文章管理</span>
	      	  				<b class="icon-plus"></b>
	      	  			</a>
	      	  			<ul class="nav_menu">
	      	  				<li><a href="#">文章列表</a></li>
	      	  				<li><a href="#">新建文章</a></li>
	      	  			</ul>
	      	  		</li>
	      	  		<li>
	      	  			<a href="#" class="side_menu active">
	      	  				<span class="icon-list"></span>
	      	  				<span>分类管理</span>
	      	  				<b class="icon-plus"></b>
	      	  			</a>
	      	  			<ul class="nav_menu">
	      	  				<li><a href="#">所有分类</a></li>
	      	  			</ul>
	      	  		</li>
	      	  		<li>
	      	  			<a href="#" class="side_menu">
	      	  				<span class="icon-users"></span>
	      	  				<span>用户管理</span>
	      	  				<b class="icon-plus"></b>
	      	  			</a>
	      	  			<ul class="nav_menu">
	      	  				<li><a href="#">修改密码</a></li>
	      	  			</ul>
	      	  		</li>
	      	  		<li>
	      	  			<a href="#" class="side_menu">
	      	  				<span class="icon-cogs"></span>
	      	  				<span>系统设置</span>
	      	  				<b class="icon-plus"></b>
	      	  			</a>
	      	  			<ul class="nav_menu">
	      	  				<li><a href="#">基础设置</a></li>
	      	  			</ul>
	      	  		</li>
	      	  	</ul>
	      	  	
	      	  </div>
	      	<div class="admin_main" id="admin_main">
	      	  	  <div class="main_header">
	      	  	  	<span class="icon-home"></span>
	      	  	  	<a href="#">首页</a>
	      	  	  	<span>></span>
	      	  	  	<span>控制台</span>
	      	  	  </div>
	      	  	  <div class="main_content">
	      	  	  	  <div class="main_tips">
	      	  	  	  	<span class="icon-notification"></span>
	      	  	  	  	欢迎进入<strong>eBlog后台管理系统</strong>最新版本,这是一个轻量级的内容发布系统
	      	  	  	  	<a class="icon-cancel-circle" id="tip_close"></a>
	      	  	  	  </div>
	      	  	  	  <table class="main_table">
	      	  	  	  	<tr>
	      	  	  	  		<th colspan="2"><span class="icon-stats-dots"></span>发布内容统计</th>
	      	  	  	  	</tr>
	      	  	  	  	<tr>
	      	  	  	  		<td class="td01">文章总数</td><td>108</td>
	      	  	  	  	</tr>
	      	  	  	  	<tr>
	      	  	  	  		<td>今日发布</td><td>2</td>
	      	  	  	  	</tr>
	      	  	  	  		<tr>
	      	  	  	  		<td>分类总数</td><td>8</td>
	      	  	  	  	</tr>
	      	  	  	  	<tr>
	      	  	  	  		<td>浏览总数</td><td>1123</td>
	      	  	  	  	</tr>
	      	  	  	  	<tr>
	      	  	  	  		<td>用户总数</td><td>2</td>
	      	  	  	  	</tr>
	      	  	  	  </table>
	      	  	      
	      	  	      <table class="main_table">
	      	  	      	<tr>
	      	  	      		<th colspan="2"><span class="icon-file-text"></span>网站系统信息</th>
	      	  	      	</tr>
	      	  	      	<tr>
	      	  	      		<td class="td01">系统环境</td>
	      	  	      		<td></td>
	      	  	      	</tr>
	      	  	      	<tr>
	      	  	      		<td>开发版本</td>
	      	  	      		<td>verison 1.0.</td>
	      	  	      	</tr>
	      	  	      	<tr>
	      	  	      		<td>作者</td>
	      	  	      		<td>skye</td>
	      	  	      	</tr>
	      	  	      </table>
	      	  	  </div>
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
      <script>
      	$(function(){
      		$('.active').next('.nav_menu').attr('class','nav_menu open');
      		$('.active').find('b').attr('class','icon-minus');
      		$('.side_menu').click(function(){
      			
      			$(this).next('.nav_menu').toggle(150);
      			$(this).parent().siblings().find('.nav_menu').slideUp(150);
      			var cla = $(this).find('b').attr('class');
      			$('b').attr('class','icon-plus'); 			
      			if(cla == 'icon-plus'){
      				$(this).find('b').attr('class','icon-minus');
      			}else{
      				$(this).find('b').attr('class','icon-plus');
      				$('.active').attr('class','side_menu');

      			}  
      					
      		});
      		$('#tip_close').click(function(){
      			$('.main_tips').fadeOut(200);
      		});
      	});
      </script>
	</body>
</html>