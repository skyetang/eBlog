<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo ($cate); ?>-<?php echo ($web["title"]); ?></title>
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
							<h4>所属分类：<?php echo ($cate); ?></h4>
						</div>
						<?php foreach($data as $key => $val): ?>
						<div class="article_list">
							<div class="article_main">
								<h2><a title="<?php echo ($val["title"]); ?>" href="<?php echo ($val["id"]); ?>.html"><?php echo ($val["title"]); ?></a></h2>
								<small>发表日期：<?php echo ($val["time"]); ?>&nbsp;|&nbsp;作者：<?php echo ($val["author"]); ?>&nbsp;|&nbsp;浏览：<?php echo ($val["view"]); ?></small>
								<p>
								<?php  $str =htmlspecialchars_decode($val['content']); $data=strip_tags($str); $str2 =mb_substr($data,0,180,'utf-8'); echo $str2; ?>......
								<br /><a href="<?php echo ($val["id"]); ?>.html">[阅读全文]</a></p>
								<small>Tags：<?php echo ($val["tags"]); ?> &nbsp;|&nbsp;分类：<?php echo ($val["catename"]); ?></small>
							</div>
						</div>
						<?php endforeach ?>
						<div class="page">
							<?php echo ($page); ?>
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
								<?php $str = mb_substr($vv['title'],0,17,'utf-8'); echo $str;?>
								</a>
							</li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
			</section>
			<footer>
	<div class="cat_rights">
		<small ><?php echo ($web["rights"]); ?></small> 
	</div>
</footer>
		</div>
	</body>
</html>