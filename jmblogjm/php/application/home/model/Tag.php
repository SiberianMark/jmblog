<?php

namespace app\home\model;

use Think\Model;


class Tag extends Model{

	public function getAllData(){
		//assign时提示aid不存在的bug
		$data=$this->select();
		foreach($data as $k=> $v){
			$data[$k]['count']=model('ArticleTag')
								->where(array('tid'=>$v['tid']))->count();
		}
		// $data=array('a'=>1);
		return $data;
	}
}