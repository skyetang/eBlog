<?php if (!defined('THINK_PATH')) exit();?>  <!--  <div id="dialog" class="dialog">-->
    	<form method="post" onsubmit="return false">
    	<div class="dialog_window">
    		 <div class="dia_header">
    		 	<span class="icon-user-plus"></span>
    		    <span>创建新管理员</span>
    		    <span id="dia_close" class="icon-cross"></span>
    		 </div>
    		 <div class="dia_cont">
    		 	<div class="dia_input">
    		 	<label for="username" ">用户名称：</label>
    		 	<input type="text" name="username" id="username"/>
    		 	<a id="checkurl" href="<?php echo U('Admin/Manager/doCheck');?>" style="display:none;"></a>
    		 	<span id="tips1" class="tips"><i class=" icon-cancel-circle"></i>该帐号已存在</span>
    		 	</div>
    		 	<div class="dia_input">
    		 	<label for="pwd">管理密码：</label>
    		 	<input type="password" name="pwd" id="pwd" />
    		 	</div>
    		 		<div class="dia_input">
    		 	<label for="pwd2">重复密码：</label>
    		 	<input type="password" name="pwd2" id="pwd2" />
    		 	<span id="tips" class="tips"><i class=" icon-cancel-circle"></i>两次密码不一致</span>
    		 	</div>
    		 </div>
    		 <div class="dia_bot">
    		 	<button id="dia_fire" class="dia_button"><span class="icon-cross"></span>取消</button>
    		 	<button id="dia_sure" class="dia_button" onclick="$.action('<?php echo U('Admin/Manager/doAdd');?>',this)"><span class="icon-checkmark"></span>确定</button>
    		 </div>
    	</div>
    	</form>
  <!--  </div>-->