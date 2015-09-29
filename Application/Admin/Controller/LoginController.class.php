<?php
/*
 * 后台登陆
 * 
 * author:skye
 * date:2015.09.13
 * version:1.0
 * 
 */
 namespace Admin\Controller;
 use Think\Controller;
 class LoginController extends  Controller{
 	
	public function login(){
		$this->display();
	}
	
	public function doLogin(){
		if(!IS_POST){
			E('访问的页面不存在',404);
		}
		
		$arr = I();
		$username = $arr['username']; 
		$password = md5($arr['password']);
		$code = $arr['code'];
		
		$Verify = new \Think\Verify();
		$resCode = $Verify->check($code);   //检验验证码，并返回数据
		
		if(!$resCode){
			$response['code'] = -1;
			$response['msg'] = '验证码错误';
			$this->ajaxReturn($response);
		}
		
		$userobj = M('admin');
		$userinfo['username'] =$username;  //将要查询的条件放在一个数组中
		$resut = $userobj->where($userinfo)->find(); 
		
		
		if($resut){
			if($password == $resut['password']){
				$admin['id'] = $resut['id'];
				$admin['username']=$resut['username'];
				$admin['logt'] = date('Y/m/d H:i',time());
				$admin['loginip'] = $_SERVER['REMOTE_ADDR'];
				$userobj->data($admin)->save();
				session('admin',$admin);
				
				$response['code'] = 1;
				$response['msg'] = '登录成功';
				$response['url'] = U('Admin/Index/index');
				
				$this->ajaxReturn($response);
			}else{
				$response['code'] = -2;
				$response['msg'] = '密码错误';
				$this->ajaxReturn($response);
			}
		}else{
			$response['code'] = -3;
			$response['msg'] = '不存在的帐号';
			$this->ajaxReturn($response);
			
		}
		
	}
	
   public function logOut(){
   	    session('admin',null);
		$this->success('退出成功,返回登录界面!',U('Admin/Login/login'),'3');
   }
   public function verify(){
   	    $Verify = new \Think\Verify();
		$Verify->codeSet = '2345689abcdefghijklmn';
		$Verify->length = '4';
		$Verify->useCurve = false;
		$Verify->entry();
   }
   
 }
