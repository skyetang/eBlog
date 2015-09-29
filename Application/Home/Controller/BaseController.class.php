<?php
/*
 * 前台基类
 * author：skye
 * date：2015.09.19
 * version:1.0
 */
 namespace Admin\Controller;
 use Think\Controller;
 use Common\Service\Category;
 
 class BaseController extends Controller{
 	
	protected $cateInstance = null;
	
	public function __construct(){
		parent::__construct();
		$this->cateInstance = Category::getInstance();
		
	}
	
 }
