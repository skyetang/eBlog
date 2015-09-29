<?php
/*
 * 分类处理
 * 
 * author:skye
 * date:2015.09.20
 * version:1.0
 * 
 */

namespace Admin\Controller;
use Common\Service\Category;

class CategoryController extends BaseController {
		
	protected $cateObj = null;
	protected $cateInstance = null;
	public function __construct(){
		parent::__construct();
		$this->cateInstance = Category::getInstance();
		$this->cateObj = M('category');
	}
	
    public function listCategory(){
		$this->assign('category',$this->cateInstance->mCategory);
    	$this->display();
	}
	
	public function addCategory(){
		$this->assign('category',$this->cateInstance->mCategory);
		$this->display();
	}
	
	public function editCategory(){
		$cat['id'] = I('get.id');
		$res = $this->cateObj->where($cat)->find();
		$this->assign('category',$this->cateInstance->mCategory);
		$this->assign('slecate',$res);
		$this->display();
	}
	
	public function doAdd(){
		$cat = I();
		$data['pid'] = $cat['catepid'];
		$data['catename'] = $cat['catename'];
		$data['catealias'] = $cat['catealias'];
		$data['orders'] = $cat['order'];
		
		$res = $this->cateObj->add($data);
		if(res){
			$respon['code'] = 1;
			$respon['msg'] = '添加成功';
			$respon['url'] = U('Admin/Category/listCategory');
		}else{
			$respon['code'] = 1;
			$respon['msg'] = '添加失败';
		}
		$this->ajaxReturn($respon);
	}
	
	public function doUpdate(){
		$cat = I();
		$where['id'] = $cat['id'];
		$data['pid'] = $cat['catepid'];
		$data['catename'] = $cat['catename'];
		$data['catealias'] = $cat['catealias'];
		$data['orders'] = $cat['order'];
		
		$res = $this->cateObj->where($where)->save($data);
		$respon['code'] = 1;
		$respon['msg'] = '修改成功';
		$this->ajaxReturn($respon);
	}
	
	public function delCate(){
		$cat['id'] = I('get.id');
		$res = $this->cateObj->where($cat)->find();
		if($res['pid']==0){
			$where['pid'] = I('get.id');
			$this->cateObj->where($where)->delete();
		}
		$this->cateObj->where($cat)->delete();
		$respon['code'] = 1;
		$respon['msg'] = '删除成功';
		$this->ajaxReturn($respon);
		
	}
	
}