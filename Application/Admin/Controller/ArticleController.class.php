<?php

/*
 * 处理文章
 * author：skye
 * date：2015.09.19
 * version:1.0
 */

namespace Admin\Controller;
use Common\Service\Category;

class ArticleController extends BaseController {
	protected $artObj = null;
	protected $cateInstance =null;
	protected $manObj = null;
	protected $catObj = null;
	protected $tagObj = null;
	public function __construct(){
		parent::__construct();
		$this->artObj = M('article');
		$this->catObj = M('category');
		$this->cateInstance = Category::getInstance();
		$this->manObj =M('admin');
		$this->tagObj = M('tags');
	}
    public function listArticle(){
    	$search = I();
		
		if($search['search'] == 1){   //当执行条件提交时，根据提交的查询条件，为查询条件赋
			if($search['cate'] != 'none'){
				$catearr = array();
				//$cateid['id']= $search['cate'];  
				$catepid['pid']=$search['cate'];
				$cates = $this->catObj->where($catepid)->select();	   //查询选中级的的子级
				array_push($catearr,$search['cate']);
				if($cates){                       //若有子集，则返回子集ID，并加入数组catearr中
					foreach($cates as $key => $value){
					array_push($catearr,$value['id']);
					}
				}
				$where['category'] = array('in',$catearr);  //给分类查询条件赋值
			}
			if($search['auth'] != 'none'){
				$where['author']=array('LIKE', '%'.$search['auth'].'%');
			}
			if($search['searchname']!= ''){
				$where['title']=array('LIKE', '%'.$search['searchname'].'%');
			}
		}
			
		$total = $this->artObj->where($where)->order('id DESC')->count();
    	$p = I('get.p','1'); //获取当前页数，默认为1
		$pagesize = 10;    //默认分页为10
        if($search['search'] == 1){   //当值是post过来，则是提交查询查看文章时，分页大小为总数
        	$pagesize = $total;
        }
    	$Page = new \Think\Page($total,$pagesize);
		$Page->first = ($p-1)*$pagesize;
    	$res = $this->artObj->where($where)->limit($Page->first,$Page->listRows)->order('id DESC')->select();
		
		$man = $this->manObj->select();
		$this->assign('manager',$man);
	
		$this->assign('data',$res);
		$this->assign('category',$this->cateInstance->mCategory);
		$this->assign('check',$where);
		$this->assign('page',$Page->show());
		
    	$this->display();
	}
	
	public function addArticle(){
		$res = $this->manObj->select();
		$this->assign('manager',$res);
		$this->assign('category',$this->cateInstance->mCategory);
		$this->display(addArticle);
	}
	
	
	public function doAdd(){
		$data = I();
		$art['title']=$data['title'];
		$art['content']=$data['cont'];
		$art['time']=$data['time'];
		$art['author']=$data['author'];
		$art['category']=$data['category'];
        $where['id'] = $data['category'];
		$cates = $this->catObj->where($where)->find();
		$art['catename'] = $cates['catename'];
		$art['pid'] = $cates['pid'];
		$art['tags']=$data['tags'];
		
		$id = $this->artObj->add($art);
		if($id){
			$respon['msg'] = '添加成功';
			$respon['code'] = 1;
			$respon['url'] = U('Admin/Article/listArticle');
		}else{
			$respon['msg'] = '添加失败';
			$respon['code'] = -1;
			$respon['url']= '';
		}
		
		//当tags不为空的时候，处理tags	
		if($data['tags'] != ''){	
			$tagsarr = explode(',',$data['tags']);
			foreach($tagsarr as $key =>$tagval){
				$whetag['tagname'] = $tagval;
				$res = $this->tagObj->where($whetag)->find();
				if($res){
					$nowarr = explode(',',$res['artid']);
					array_push($nowarr,$id);
					$whetag['artid'] = join(',',$nowarr);
					$where['id'] = $res['id'];
					$this->tagObj->where($where)->save($whetag);
				}else{
					$whetag['artid'] = $id;
					$this->tagObj->add($whetag);
				}
			}	
		}	
		$this->ajaxReturn($respon);	
	}
	
	
	public function editArticle(){
		$condi['id'] = I('get.id');
		$res = $this->artObj->where($condi)->find();
		$data['title'] = $res['title'];
		$data['cont'] = $res['content'];
		$data['time'] = $res['time'];
		$data['cateid'] = $res['category'];
		$data['author'] = $res['author'];
		$data['tags'] = $res['tags'];
		$data['id'] = $res['id'];
		
		//查询用户列表 
		$man = $this->manObj->select();
		$this->assign('manager',$man);
		//分类列表
		$this->assign('category',$this->cateInstance->mCategory);
        //文章数据
		$this->assign('data',$data);
		$this->display(editArticle);
	}
	
	public function doUpdate(){
		$data = I();
		$id = $data['id'];
        $where['id'] = $data['id'];
		$art['title']=$data['title'];
		$art['content']=$data['cont'];
		$art['time']=$data['time'];
		$art['author']=$data['author'];
		$art['category']=$data['category'];
		$wher['id'] = $data['category'];
		$cates = $this->catObj->where($wher)->find();
		$art['catename'] = $cates['catename'];
		$art['pid']= $cates['pid'];
		
		//处理tags
		$tagsarr = explode(',',$data['tags']);
		foreach($tagsarr as $key =>$tagval){
			$t = FALSE;
			$whetag['tagname'] = $tagval;
			$res = $this->tagObj->where($whetag)->find();
			if($res){
				$nowarr = explode(',',$res['artid']);
				foreach($nowarr as $key => $val){
					if($val == $id){
						$t = TRUE;   //判断更新后的标签与更新是否一致，文章id是否在tags表中存在，如果存在则不更新tags表中的artid
					}
				}
				if($t){
					continue;   //跳出本次循环，进行下一次循环
				}
				array_push($nowarr,$id);
				$whetag['artid'] = join(',',$nowarr);  //将数组通过逗号连接
				$tagwhere['id'] = $res['id'];
				$this->tagObj->where($tagwhere)->save($whetag);
			}else{
				$whetag['artid'] = $id;
				$this->tagObj->add($whetag);
			}
		}
		//处理tag结束
		
		$res =$this->artObj->where($where)->save($art);
		if($res){
			$respon['code'] = 1;
			$respon['msg'] = '更新成功！';
			$respon['url'] = U('Admin/Article/listArticle');
			$this->ajaxReturn($respon);
		}else{
			$respon['code'] = 0;
			$respon['msg'] = '没有修改内容！';
			$respon['url'] = U('Admin/Article/listArticle');
			$this->ajaxReturn($respon);
		}
	}
	
	public function delArticle(){
		$condi['id'] = I('get.id');
		$this->artObj->where($condi)->delete();
		$respon['code'] = 1;
		$respon['msg'] = '删除成功';
		$this->ajaxReturn($respon);
	}
	
}