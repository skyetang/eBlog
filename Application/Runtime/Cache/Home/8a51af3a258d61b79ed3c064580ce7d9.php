<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zn">

	<head>
		<meta charset="UTF-8">
		<title><?php echo ($data["title"]); ?>-<?php echo ($web["title"]); ?></title>
		<link rel="stylesheet" type="text/css" href="/Public/HomeStyle/css/index.css" />
		<link rel="stylesheet" type="text/css" href="/Public/HomeStyle/css/common.css" />
	</head>

	<body>
		<div class="main">
			<header>
	<div class="header">
		<a href="javascript:;" class="logo">
			<span><?php echo ($web["title"]); ?></span>
		</a>
		<ul id="nav" class="nav">
			<li>
				<a href="<?php echo ($web["site"]); ?>">
					<div>首页</div>
				</a>
			</li>
			<?php foreach($category as $key => $val): ?>
			<li id="<?php echo ($val["id"]); ?>">
				<a href="<?php echo ($val["catealias"]); ?>">
					<div><?php echo ($val["catename"]); ?></div>
				</a>
				<div id="sub_<?php echo ($val["id"]); ?>" class="category clearfix">
					<div class="category_left">
						<dl class="category_ul">
						<?php foreach($val[child] as $k => $v): ?>
						<a href="<?php echo ($v["catealias"]); ?>"><dt><?php echo ($v["catename"]); ?></dt></a>
						<?php endforeach ?>
						</dl>
					</div>
					<div class="category_right">
						<h4>最新文章</h4>
						<?php foreach($val[child2] as $kk => $vv): ?>
						<h5><a href="<?php echo ($vv["id"]); ?>"><?php $str = mb_substr($vv['title'],0,21,'utf-8'); echo $str;?></a></h5>
						<?php endforeach ?>
					</div>
				</div>
			</li>
			<?php endforeach ?>
		</ul>
	</div>
</header>
<script>
	window.onload = function() {
		var oUl = document.getElementById('nav');
		var aLi = document.getElementsByTagName('li');
		var oDiv = null;
		for (var i = 0; i < aLi.length; i++) {
			aLi[i].onmouseover = function() {
				oDiv = document.getElementById('sub_' + this.id);
				if (oDiv) {
					oDiv.style.display = 'block';
				}
			}
			aLi[i].onmouseout = function() {
				oDiv = document.getElementById('sub_' + this.id);
				if (oDiv) {
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
							<h4>所属分类文章：<?php echo ($data["catename"]); ?></h4>
						</div>
						<div class="article_info">
							<div class="article_title">
								<h2><?php echo ($data["title"]); ?></h2>
								<small>发布时间：<?php echo ($data["time"]); ?>&nbsp;作者：<?php echo ($data["author"]); ?>&nbsp;浏览：<?php echo ($data["view"]); ?></small>
							</div>
							<div class="article_con">
								<?php
 $str = htmlspecialchars_decode($data['content']); echo $str; ?>
							</div>
						</div>
						<div class="article_like">
							<h4>相关文章推荐：</h4>
							<ul>
								<?php foreach($likeart as $key => $val): ?>
									<li><a href="<?php echo ($val["id"]); ?>.html"><?php echo ($val["title"]); ?></a></li>
									<?php endforeach ?>
							</ul>
						</div>
					</div>
					<div class="content_right">
						<div class="search">
							<input type="text" name="search" />
							<button type="submit">搜索</button>
						</div>
						<div class="tags">
							<h4>标签:</h4>
							<?php foreach($tags as $k => $v): ?>
								<span><a href="javascript:;"><?php echo ($v["tagname"]); ?></a></span>
								<?php endforeach ?>
						</div>
						<ul class="recent_article">
							<h4>最近发表:</h4>
							<?php foreach($newart as $kk => $vv): ?>
								<li>
									<a href="<?php echo ($vv["id"]); ?>.html" title="<?php echo ($vv["title"]); ?>">
										<?php
 $str = mb_substr($vv['title'],0,17,'utf-8'); echo $str; ?>
									</a>
								</li>
								<?php endforeach ?>
						</ul>
					</div>
				</div>
				<footer>
	<div class="cat_rights">
		<small ><?php echo ($web["rights"]); ?></small> 
	</div>
</footer>
			</section>
		</div>
	</body>

</html>