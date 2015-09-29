/*
 * 
 *  侧边栏收缩js功能代码
 *  需要搭配：sidebar.html  以及admin.css中的sidebar那一段css代码
 *  author:skye
 *  date:2015.9.14
 *  version:1.0
 */


$(function(){
  		$('.active').next('.nav_menu').attr('class','nav_menu open');
  		//1、判断是否有已选择栏目，如有则打开下级栏目
  		
  		$('.active').find('b').attr('class','icon-minus');  
  		//2、改变小图标
  		
  		$('.side_menu').click(function(){		
  			//1、点击栏目时，触发打开二级栏目，改变当前栏目背景色的事件
  			$(this).next('.nav_menu').toggle(120); 
  			$(this).parent().siblings().find('.nav_menu').slideUp(120);   
  			
  			//2、收回在点击本次之前，打开的其它二级栏目
  			var cla = $(this).find('b').attr('class');
  			$('b').attr('class','icon-plus'); 	
  			
  			//3、判断栏目的图标，在打开，关闭中进行切换，并改变背景色
  			if(cla == 'icon-plus'){    
  				$(this).attr('class','side_menu active').find('b').attr('class','icon-minus').parent().siblings().find('.active').attr('class','side_menu'); //4、改变图标
  				//$(this).attr('class','side_menu active');   //5、给当前栏目添加背景色
  				//$(this).parent().siblings().find('.active').attr('class','side_menu'); //6、给其它栏目去掉背景色
  			}else{
  				$(this).attr('class','side_menu').find('b').attr('class','icon-plus');
  				//$(this).attr('class','side_menu');  //去掉当前栏目的背景色
  			}   					
  		});
  		
  		$('#tip_close').click(function(){
  			$('.main_tips').fadeOut(200);   //主页中的tips关闭
  		});
  		
  	});