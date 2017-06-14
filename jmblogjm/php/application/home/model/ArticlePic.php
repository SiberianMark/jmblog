<?php
namespace app\home\model;

use Think\model;
use Think\Db;

class ArticlePic extends model{
	public function getDataByAid($aid){
		$data = model('ArticlePic')
			  ->alias('ap')
			  ->join('__ARTICLE__ a','ap.aid = a.aid')
			  ->where(array('ap.aid'=>$aid))
			  ->select();
		$root_path=rtrim('/public','/index.php');
		$data[0]['path']=$root_path.$data[0]['path'];
		return $data[0]['path'];
	}
}