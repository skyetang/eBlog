<?php
/*
 * 前端分类查询
 * author：skye
 * date：2015.09.22
 * version:1.0
 */
 
namespace Home\Controller;
use Think\Controller;
use Common\Service\Category;

class CategoryController extends Controller {
	
	protected $artObj = null;
	protected $cateInstance =null;
	protected $catObj = null;
	protected $tagObj = null;
	protected $webObj = null;
	
	public function __construct(){
		parent::__construct();
		$this->cateInstance = Category::getInstance();
		$this->artObj = M('article');
		$this->catObj = M('category');
		$this->tagObj = M('tags');
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
			
		//文章列表
    	$cateData['catealias'] = I('get.cate');
		$cateRes =$this->catObj->where($cateData)->limit('1')->order('id DESC')->find();
		$data['catename'] = $cateRes['catename'];
		$catarr = $this->catObj->where($data)->find();
		$where['category'] = $catarr['id'];
		$where['pid'] = $catarr['id'];
		$where['_logic']='or';
		$total = $this->artObj->where($where)->order('id DESC')->count();
		
		$p = I('get.p','1'); //获取当前页数，默认为1
		$pagesize = 10;    //默认分页为10
        if($search['search'] == 1){   //当值是post过来，则是提交查询查看文章时，分页大小为总数
        	$pagesize = $total;
        }
    	$Page = new \Think\Page($total,$pagesize);
		$Page->first = ($p-1)*$pagesize;
    	$res = $this->artObj->where($where)->limit($Page->first,$Page->listRows)->order('id DESC')->select();
		
		//获取标签最新标签
		$tags = $this->tagObj->limit('50')->order('id DESC')->select();
		
		//获取最近发表的前20篇文章
		$newart = $this->artObj->limit('20')->select();
		
		$this->assign('web',$web);
		$this->assign('data',$res);
		$this->assign('page',$Page->show());
		$this->assign('cate',$data['catename']);
		$this->assign('tags',$tags);
		$this->assign('newart',$newart);
		$this->display();
    }
}