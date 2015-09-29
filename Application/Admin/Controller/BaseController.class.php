<?php
/*
 * 后台的基类
 * author：skye
 * date：2015.09.13
 * version:1.0.
 */
 namespace Admin\Controller;
 use Think\Controller;
 
 class BaseController extends Controller{
 	
	protected $userId = null;
	
	public function __construct(){
		parent::__construct();
		
		if(!session('?admin')){
			//$this->error('请先登录',U('Admin/Login/login'));
			$this->redirect('Admin/Login/login');
		}
		
		$this->userId=session('admin.id');
	}
	
 }
