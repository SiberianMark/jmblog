<?php

namespace app\index\controller;
use app\admin\controller\ApiCommon;

class Dish extends ApiCommon{

	public function getDishList(){
		$dishModel = model('Dish');
		$data=$dishModel->getDishList();
		return resultArray(['data' => $data]);
	}
}