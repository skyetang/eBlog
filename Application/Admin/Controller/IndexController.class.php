<?php

namespace Admin\Controller;

class IndexController extends BaseController {
	
	
    public function index(){
		$tj['art'] = M('article')->count();
		$where['time'] = array('LIKE',date('Y/m/d',time()).'%');
		$tj['now'] = M('article')->where($where)->count();
		$tj['view'] = M('article')->sum('view');
		$tj['cate'] = M('category')->count();
		$tj['manager'] = M('admin')->count();
		$tj['browser'] = $_SERVER['HTTP_USER_AGENT'];
		$this->assign('data',$tj);
    	$this->display();
	}
}