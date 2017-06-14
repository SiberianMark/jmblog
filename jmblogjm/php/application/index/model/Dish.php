<?php
namespace app\index\model;
use think\Model;

class Dish extends Model{
    public function getDishList(){
    	$dish = new Dish();
    	$res = $dish->select();
    	$data['list'] = $res ;
    	return $data;
    }
}