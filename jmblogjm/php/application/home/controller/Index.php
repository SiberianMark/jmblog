<?php
namespace app\home\controller;

use think\Controller;
use app\common\controller\HomeBase;

class Index extends HomeBase
{
    public function index()
    {
 
        $data=model('Article')->getDataList();
		//return resultArray(['data' => $data]);//输出json格式的数据，常作为接口返回方法返回接口数据
		//
		//后台渲染html
		$assign=array(
			'articles'=>$data['data'],
			'cid'=>'index'
		);
		// 后台渲染1:bug:用于循环的数据只能在第一层
		$this->assign('assign',$assign);
		$this->assign('articles',$data['data']);
		return view('index');
		//或者
		// return view('index',['assign'=>$assign]);

		//后台渲染方法2,直接实例化模板，（不推荐）
		// 不带任何参数 自动定位当前操作的模板文件
		// $view = new View();
		// return $view->fetch();
		// 
		// 3继承了controller类,不推荐
		// // 渲染模板输出
		// return $this->fetch('index',['assign'=>$assign]);

    }

    // 文章内容
    public function article($aid){
       $aid = $aid;
       $cid = intval(cookie('cid'));
       $tid=intval(cookie('tid'));
       $search_word=cookie('search_word');
       $search_word=empty($search_word) ? 0 : $search_word;
       $read=cookie('read');
       // 判断是否已经记录过aid
       if($read){
	       	if (array_key_exists($aid, $read)) {
	            // 判断点击本篇文章的时间是否已经超过一天
	            if ($read[$aid]-time()>=86400) {
	                $read[$aid]=time();
	                // 文章点击量+1
	                M('Article')->where(array('aid'=>$aid))->setInc('click',1);
	            };
	        };
       }else{
       		$read[$aid]=time();
       		model('Article')->where(array('aid'=>$aid))->setInc('click',1);
       }
       cookie('read',$read,864000);
       switch(true){
       		case $cid==0 && $tid==0 && $search_word==(string)0:$map=array();
       			 break;
       		case $cid!=0:
                $map=array('cid'=>$cid);
                break;
            case $tid!=0:
                $map=array('tid'=>$tid);
                break;
            case $search_word!==0:
                $map=array('title'=>$search_word);
                break;
       }
       //获取文章数据
       $article=model('Article')->getDataByAid($aid,$map);

       //  return $article;
         $this->assign('article',$article);
         return view('article');
    }
    public function getIndexArticleList(){
    	$data=model('Article')->getDataList();
		return resultArray($data);
    }
}
