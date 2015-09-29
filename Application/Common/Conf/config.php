<?php
return array(
    'URL_MODEL'             =>  2,  //改写模式，要在要目录下添加htaccess
	//'配置项'=>'配置值'
	'DB_TYPE'               =>  'mysqli',     // 数据库类型
    'DB_HOST'               =>  'localhost',   // 服务器地址
    'DB_NAME'               =>  'skye_blog',   // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'blog_',    // 数据库表前缀
    'DB_FIELDTYPE_CHECK'    =>  false,       // 是否进行字段类型检查
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
	'SHOW_PAGE_TRACE' 		=>	false,		 //开启页面trace
	'DOMAIN'                =>  'blog.com',
	'WEB_NAME'				=>	'skeyBlog',
	'URL_HTML_SUFFIX'       =>  'html|shtml|xml',         //设置伪静态后缀
    
    'DEFAULT_FILTER'        =>  'htmlspecialchars,trim', // 默认参数过滤方法 用于I函数...
    'MODULE_ALLOW_LIST'     =>   array('Home','Admin'),  //允许访问的模块列表
    'DEFAULT_MODULE'        =>   'Home',     //默认访问模块
    //'MODULE_DENY_LIST'    =>   array(''),              //阻止访问的模块
    //'URL_MODULE_MAP'      =>   array('test'=>'admin'),  //映射模块，只能访问test，不能再通过admin访问
    

    'APP_SUB_DOMAIN_DEPLOY'   =>  1, // 开启子域名配置
    'APP_SUB_DOMAIN_RULES'    =>  array(   
     //'admin.blog.com'       =>  'Admin',  // admin.domain1.com域名指向Admin模块,同时要在服务器下作子域名解析
     //'test.domain2.com'     =>  'Test',  // test.domain2.com域名指向Test模块
    ),
);