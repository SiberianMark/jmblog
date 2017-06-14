<?php
// +----------------------------------------------------------------------
// | Description: home模块路由配置文件
// +----------------------------------------------------------------------
// | Author: JM <mashaobin911215@gmail.com>
// +----------------------------------------------------------------------
return [
	//test index路由
	'home/'=> 'home/home/test',
	'home/index'=>'home/index/index',
	'home/getIndexArticles'=>'home/index/getIndexArticleList',
	'/home/test'=>'home/home/getAlldata',
	'home/index/article/:aid'=>'home/index/article',
	
];