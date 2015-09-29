<?php if (!defined('THINK_PATH')) exit();?>  <!--  <div id="dialog" class="dialog">-->
    	<form method="post" onsubmit="return false">
    	<div class="dialog_window">
    		 <div class="dia_header">
    		 	<span class="icon-list"></span>
    		    <span>新建分类</span>
    		    <span id="dia_close" class="icon-cross"></span>
    		 </div>
    		 <div class="dia_cont">
    		 	<div class="dia_input">
    		 	<label for="catepid">选择分类：</label>
    		 	<select id="catepid" class="dia_sele" name="catepid">
    		 		<option value="0">父级</option>
    		 		 <?php foreach($category as $key => $val): ?>
    		 		<option value="<?php echo ($val["id"]); ?>"><?php echo ($val["catename"]); ?></option>
    		 		  <?php foreach($val['child'] as $k =>$v): ?>
    		 		  	<option value="<?php echo ($v["id"]); ?>">└─<?php echo ($v["catename"]); ?></option>
    		 		   <?php endforeach ?>
       				 <?php endforeach ?>
    		 	</select>
    		 	</div>
    		 	<div class="dia_input">
    		 	<label for="catename">分类名称：</label>
    		 	<input type="text" name="catename" id="catename" />
    		 	</div>
    		 	<div class="dia_input">
    		 	<label for="catealia">分类别名：</label>
    		 	<input type="text" name="catealias" id="catealia" />
    		 	</div>
    		 	<div class="dia_input">
    		 	<label for="order">排序位置：</label>
    		 	<input type="text" value="0" name="order" id="order" />
    		 	</div>
    		 </div>
    		 <div class="dia_bot">
    		 	<button id="dia_fire" class="dia_button"><span class="icon-cross"></span>取消</button>
    		 	<button id="dia_sure" class="dia_button" onclick="$.action('<?php echo U('Admin/Category/doAdd');?>',this)"><span class="icon-checkmark"></span>确定</button>
    		 </div>
    	</div>
    	</form>
  <!--  </div>-->