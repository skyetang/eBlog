<?php
/*
 * 栏目分类
 * 
 * author:skye
 * date:2015.09.20
 * version:1.0
 * 
 */
 namespace Common\Service;
 
 class Category{
 	public $mCategory = null;
	public static $mInstance = null;
	public static $mKey = 'CATEGORY###SKYE';
	
	public function __construct(){}
  
    static public function getInstance(){
    	if(!is_object(self::$mInstance)){
    		self::$mInstance = new Category;
			if (false && S(self::$mKey)) {
				self::$mInstance->loadFromCache();
			} else {
				self::$mInstance->loadFromDb();
			}
    	}
		return self::$mInstance;
    }
	
	public function loadFromCache(){
		self::$mInstance->mCategory = S(self::$mKey);
	}
	
	public function loadFromDb(){
		$category = M('category')->order('orders ASC')->select();
		$one = array();
		$two = array();
		
		foreach($category as $key => $val){
			if($val['pid'] == 0){
				$one[$val['id']] = $val;
			}else if($val['pid'] != 0){
				 $two[$val['pid']][$val['id']] = $val;
			}  
		}
		foreach($one as $key => &$val){
			$val['child'] = $two[$val['id']];
		}
		self::$mInstance->mCategory = $one;
		
		//设置缓存
		S(self::$mKey,self::$mInstance->mCategory);
	}
    	
 }
