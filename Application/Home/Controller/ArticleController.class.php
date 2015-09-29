<?php
/*
 * 文章内容显示
 * author：skye
 * date：2015.09.23
 * version:1.0
 */
 
namespace Home\Controller;
use Think\Controller;
use Common\Service\Category;

class ArticleController extends Controller {
	
	protected $artObj = null;
	protected $cateInstance =null;
	protected $tagObj = null;
	protected $webObj = null;
	
	public function __construct(){
		parent::__construct();
		$this->cateInstance = Category::getInstance();
		$this->artObj = M('article');
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
		
		//文章内容数据
    	$where['id'] = I('get.post');
		$res = $this->artObj->where($where)->find();
		
		//添加浏览数据
		$readnum = $res['view'];
		$readnum += 1;
		$artview['view'] = $readnum;
		$this->artObj->where($where)->save($artview);
		
		//获取标签最新标签
		$tags = $this->tagObj->limit('50')->order('id DESC')->select();
		
		//获取最近发表的前20篇文章
		$newArt = $this->artObj->limit('20')->select();
		
		
		//相关文章
		$atagArr  = explode(',',$res['tags']);
		//$where['author']=array('LIKE', '%'.$search['auth'].'%');
		$tagsWhere['tags'] =array('LIKE','%'.$atagArr['0'].'%');
		$likeArt = $this->artObj->where($tagsWhere)->limit('5')->select();
		
		$this->assign('web',$web);
		$this->assign('data',$res);
		$this->assign('tags',$tags);
		$this->assign('newart',$newArt);
		$this->assign('likeart',$likeArt);
		$this->display();
    }
}