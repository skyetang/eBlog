<?php
/*
 * 前端主页内容
 * author：skye
 * date：2015.09.19
 * version:1.0
 */
 
namespace Home\Controller;
use Think\Controller;
use Common\Service\Category;

class IndexController extends Controller {
	
	protected $cateObj = null;
	protected $cateInstance =null;
	protected $artObj = null;
	protected $webObj = null;
	
	public function __construct(){
		parent::__construct();
		$this->cateInstance = Category::getInstance();
		$this->cateObj = M('category');
		$this->artObj = M('article');
		$this->webObj = M('website');
		
	}
	
    public function index(){
    	//网站数据
    	$webRes = $this->webObj->limit('1')->order('id DESC')->find();
		$web['title'] = $webRes['title'];
		$web['site'] = $webRes['site'];
		$web['keywords'] = $webRes['keywords'];
		$web['desc'] = $webRes['description'];
		$web['words'] = $webRes['words'];
		$web['rights'] = $webRes['rights'];
		
    	//前台导航数据
		$catearr = $this->cateInstance->mCategory;
		foreach($catearr as $key =>&$val){
			$cate['category'] = $val['id'];
			$cate['pid'] =  $val['id'];
			$cate['_logic'] = 'or';
			//$catearr[$key]['child2'] = $this->artObj->where($cate)->select();	
			$val['child2'] =$this->artObj->where($cate)->limit('5')->order('id DESC')->select();	
		}
	    $this->assign('category',$catearr);
		
		$res = $this->artObj->limit('1')->order('id DESC')->find();
		
		$this->assign('web',$web);
		$this->assign('data',$res);
		$this->display();
    }
}