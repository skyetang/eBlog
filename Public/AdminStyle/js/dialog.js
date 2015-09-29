/*
 * 页面弹出框封闭函数,以及执行函数，和删除函数
 * 需要：edit文件中的html布局,并配上cate.css中的代码
 * 
 * author:skye
 * date:2015.09.18
 * version:1.0
 * 
 * 
 */
(function($){
			$.extend({
				dialog:function(url,obj){
					var dia_div =$('<div id="dialog" class="dialog"></div>');
					$(dia_div).show();
					$(obj).parents('body').after(dia_div);
					$.get(url,'',function(data){
						$('#dialog').html(data);
							$('#dia_close').click(function(){
							 	$('#dialog').hide().remove();							 	
							})
							$('#dia_fire').click(function(){
								 $('#dialog').hide().remove();
							})
							$('#username').blur(function(){
								var obj = $('#username').parents('form');
								var urle = $('#checkurl').attr('href');
									$.ajax({
										url : urle,
										type : 'post',
										data : obj.serialize(),
										success : function(res)
										{
											if(res.code < 1){
												$('#tips1').fadeIn();
											}	
										}
									});
							});
							$('#username').focus(function(){
								$('#tips1').fadeOut(200);
							});
							$('#pwd2').blur(function(){
								if($('#pwd').val() != $('#pwd2').val()){
									$('#tips').fadeIn();
									//$('#dia_sure').attr('disabled',true);
								}
							});
							$('#pwd,#pwd2').focus(function(){
								$('#tips').fadeOut(200);
								//$('#dia_sure').removeAttr('disabled');
							});
							
					});	
				},
				action:function(url,obj){
					var obj = $(obj).parents('form');
					$.ajax({
						url : url,
						type : 'post',
						data : obj.serialize(),
						success : function(res)
						{
							//alert(res.msg);
							location.reload();
						}
					});
				},
				del:function(url){
					if(confirm("确认要删除么？")){
						$.get(url,'',function(respon){
							//alert(respon.msg);
							location.reload();
						})
					}
				},
				delcate:function(url){
					if(confirm("确认要删除么？删除父分类的同时会删除下面的子分类")){
						$.get(url,'',function(respon){
							//alert(respon.msg);
							location.reload();
						})
					}
				}
			});
		
		})(jQuery)