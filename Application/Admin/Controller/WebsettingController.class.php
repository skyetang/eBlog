<?php
/*
 * 网站基本信息设置
 * author：skye
 * date：2015.09.18
 * version:1.0
 */
namespace Admin\Controller;

class WebsettingController extends BaseController {
	protected $webObj = null;
	
	public function __construct(){
		parent::__construct();
		$this->webObj = M('website');
	}
    public function info(){
		$res1 = $this->webObj->limit('1')->order('id DESC')->find();
		if($res1){
			$data['site']=$res1['site'];
			$data['title']=$res1['title'];
			$data['keywords']=$res1['keywords'];
			$data['rights']=$res1['rights'];
			$data['words']=$res1['words'];
			$data['desc']=$res1['description'];
			$this->assign('data',$data);
		}
    	$this->display();
	}
	
	public function edit(){	
		//获取表单传递过来的数据
		$webdata = I();
		$web['site'] = $webdata['site'];
		$web['title'] =$webdata['title'];
		$web['keywords'] = $webdata['keywords'];
		$web['rights'] = $webdata['rights'];
		$web['words'] =$webdata['words'];
		$web['description'] = $webdata['desc'];
		
		$res2 = $this->webObj->find();	
		if($res2){
			$conditions['id']=$res2['id'];		
			$this->webObj->where($conditions)->save($web);
			$respon['b'] = 1;
			$this->ajaxReturn($respon);
		}else{
			$this->webObj->add($web);
			$respon['b'] = 2;
			$this->ajaxReturn($respon);
		}
	}

}