<?php
/*
 * 用户管理
 * 
 * author:skye
 * date:2015.09.20
 * version:1.0
 * 
 */
namespace Admin\Controller;

class ManagerController extends BaseController {
	
	public $manObj = null;
	
	public function __construct(){
		parent::__construct();
		$this->manObj = M('admin');
	}
	
    public function listManager(){
		$res = $this->manObj->select();
		$this->assign('data',$res);
    	$this->display();
	}
	
	public function addManager(){
		$this->display();
	}
	
	public function editManager(){
		$data['id'] = I('get.id');
	    $res =$this->manObj->where($data)->find();
		$this->assign('data',$res);
		$this->display();		
	}
	
	public function editMana(){
		$data['id'] = $this->userId;
	    $res =$this->manObj->where($data)->find();
		$this->assign('data',$res);
		$this->display(editManager);
	}
	
	public function doCheck(){
		$data= I();
		$man['username'] = $data['username'];
		$res = $this->manObj->where($man)->find();
		if($res){
			$respon['code'] = -1;
			$respon['msg'] = '已有该帐号，请重新填写名称';
		}else{
			$respon['code'] = 1;
		}
		$this->ajaxReturn($respon);
	}
	
	public function doAdd(){
		$data = I();
		$man['username'] =  $data['username'];
		$man['password'] =  md5($data['pwd']);
		$man['loginip'] =  get_client_ip();
		$man['creattime'] = date('Y/m/d H:i',time());
		$res = $this->manObj->add($man);
		if($res){
			$respon['code'] = 1;
			$respon['msg'] = '添加成功';
			$respon['url'] = U('Admin/Manager/listManager');
		}
		$this->ajaxReturn($respon);
	}
	
	public function doEdit(){
		$arr= I();
		$where['id'] = $arr['id'];
		$man['username'] =  $arr['username'];
		$man['password'] =  md5($arr['pwd']);
		$res = $this->manObj->where($where)->save($man);
		if($res){
			$respon['code'] = 1;
			$respon['msg'] = '更新成功';
		}
		$this->ajaxReturn($respon);
		
	}
	
	public function delManager(){
		$data['id'] = I('get.id');
		$this->manObj->where($data)->delete();
		$respon['code'] = 1;
		$respon['msg'] = '删除成功';
		$this->ajaxReturn($respon);
	}
}