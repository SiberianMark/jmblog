<?php
namespace app\home\model;

use Think\model;
use Think\Db;

class ArticleTag extends model{
    public function getDataByAid($aid,$field='all'){
    	if($field=='all'){
    		return model('ArticleTag')
    		->alias('at')
    		->join('__TAG__ a','at.tid=a.tid')
    		->where(array('aid'=>$aid))
    		->select();
    	}else{
    		return $this->where(array('aid'=>$aid))->field($field)->select();
    	}
    }
}
