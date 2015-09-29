<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zn">
<head>
	<meta charset="utf-8">
	<title><?php echo ($web["title"]); ?>-<?php echo ($web["desc"]); ?></title>
	<link rel="stylesheet" type="text/css" href="/Public/HomeStyle/css/index.css" />
</head>
<body>
	<div id="main">
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
			<div class="content">
				<div class="word">
					<h4>一句话<small>/A Word</small></h4>
					<p><?php echo ($web["words"]); ?></p>
				</div>
				<div class="article">
					<h4>一篇文章<small>/An Article</small></h4>
					<div class="article_main">
						<h2><a href="<?php echo ($data["id"]); ?>.html"><?php echo ($data["title"]); ?></a></h2>
						<small>时间：<?php echo ($data["time"]); ?>&nbsp;&nbsp;作者：<?php echo ($data["author"]); ?></small>
						<p>
						<?php $str =htmlspecialchars_decode($data['content']); $datas=strip_tags($str); $str2 =mb_substr($datas,0,100,'utf-8'); echo $str2; ?>......</p><small><a href="<?php echo ($data["id"]); ?>.html">[阅读全文]</a></small>
					</div>
				</div>
			</div>
		</section>
		<footer>
			<div class="rights"><small> <?php echo ($web["rights"]); ?></small> </div>
		</footer>
	</div>
</body>
</html>