<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文章详情页</title>
	<link rel="stylesheet" type="text/css" href="/Public/HomeStyle/css/index.css" />
	<link rel="stylesheet" type="text/css" href="/Public/HomeStyle/css/common.css" />
	
</head>
<body>
	<div class="main">
     		<header>
		<div class="header">
			<a href="javascript:;" class="logo">
				<span>SKYEBLOG</span>
			</a>
			<ul id="nav" class="nav">
				<li>
					<a href="javascript:;">
					     <div>首页</div>
					</a>
				</li>
				<?php foreach($category as $key => $val): ?>
				<li id="<?php echo ($val["id"]); ?>">
					<a href="<?php echo U('Category/Index',array('cate'=>$val['catename']));?>">
					     <div><?php echo ($val["catename"]); ?></div>
					</a>
						<div id="sub_<?php echo ($val["id"]); ?>" class="category clearfix">
						    <div class="category_left">
						    	<dl class="category_ul">
						    		<?php foreach($val[child] as $k => $v): ?>
									 <a href="<?php echo U('Category/Index',array('cate'=>$v['catename']));?>">
									 	<dt><?php echo ($v["catename"]); ?></dt>
									 </a>
									<?php endforeach ?>
								</dl>
						    </div>
							<div class="category_right">
							    <h4>最新文章</h4>
							    <?php foreach($val[child2] as $kk => $vv): ?>
								<h5><?php echo ($vv["title"]); ?></h5>
								<?php endforeach ?>
							</div>
					    </div>
				</li>
				<?php endforeach ?>
			</ul>
		</div>
	</header>
	<script>
                window.onload = function () {
                	var oUl = document.getElementById('nav');
                	var aLi = document.getElementsByTagName('li');

                	var oDiv = null;
                	for(var i=0;i<aLi.length;i++){
                		aLi[i].onmouseover = function(){
                			oDiv = document.getElementById('sub_'+this.id);
                			if(oDiv){
                				oDiv.style.display = 'block';
                			}
                			
                		}
                		aLi[i].onmouseout =function(){
                			oDiv = document.getElementById('sub_'+this.id);
                			if(oDiv){
                				oDiv.style.display = 'none';
                			}
                		}
                		
                	}
                }
	</script>
     <section>
	    <div class="content_main clearfix">
			<div class="content_left">
				<div class="child_category">
					<h4>所属分类：<?php echo ($data["catename"]); ?></h4>
				</div>
				<div class="article_info">
					<div class="article_title">
						<h2><?php echo ($data["title"]); ?></h2>
						<small>发布时间：<?php echo ($data["time"]); ?>&nbsp;作者：<?php echo ($data["author"]); ?>&nbsp;浏览：112</small>
					</div>
					<div class="article_con">
						<?php
 $str = htmlspecialchars_decode($data['content']); echo $str; ?>
					</div>
				</div>
			</div>
			<div class="content_right">
				<div class="search">
					<input type="text" name="search" /><button type="submit">搜索</button>
				</div>
				<div class="tags">
					<h4>标签:</h4>
				    <span><a href="javascript:;">html5</a></span>
				    <span><a href="javascript:;">css3</a></span>
				    <span><a href="javascript:;">javascript</a></span>
				    <span><a href="javascript:;">jquery</a></span>
				    <span><a href="javascript:;">web前端</a></span>

				</div>
					<ul class="recent_article">
					<h4>最近发表:</h4>
						<li><a href="javascript:;">background的特性有哪些</a></li>
						<li><a href="javascript:;">html5当中新增加的标签有何作</a></li>
						<li><a href="javascript:;">background的特性有哪些</a></li>
						<li><a href="javascript:;">html5当中新增加的标签有何作</a></li>
						<li><a href="javascript:;">background的特性有哪些</a></li>
						<li><a href="javascript:;">html5当中新增加的标签有何作</a></li>
					</ul>
			</div>
		</div>
		<footer>
			<div class="cat_rights"><small > 一句话激励自己，一篇文章提高自己！Copyright © 2015 Strings.com All Rights Reserved</small> </div>
		</footer>
	</section>
	</div>
</body>
</html>