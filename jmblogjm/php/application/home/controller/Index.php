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
    public function getIndexArticleList(){
    	$data=model('Article')->getDataList();
		return resultArray($data);
    }
}
