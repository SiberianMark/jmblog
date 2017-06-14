<?php

namespace app\home\model;

use think\Model;
use think\Db;
use jm\Data;

class Category extends Model{
	//分类模板
	public function getDataByCid($cid,$field='all'){
		if($field=='all'){
			return $this
					->where(array('cid'=>$cid))
					->select();
		}else{
			return $this
				->field($field)
				->where(array('cid'=>$cid))
				->select();
		}
	}
	public function getAllData($field='all',$tree=false){
		if($field=='all'){
            $data=$this->order('sort')->select();
            if($tree){
                return Data::tree($data,'cname');
            }else{
                return $data;
            }
        }else{
            return $this->getField("cid,$field");
        }
	}
}