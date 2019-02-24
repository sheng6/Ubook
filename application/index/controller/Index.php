<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\Index as indexm;

class Index extends Controller
{
    public function index()
    {
    	$model = new indexm();

    	$result = $model->getCateListDefaule();

    	$this->assign('cate', $result);

    	// $bookmarks = [];

    	// $model->getList($result, $bookmarks);
    	$bookmarks = $model->getList($result);
    	// p($bookmarks);
    	$this->assign('bookmarks', $bookmarks);

        return $this->fetch();
    }
}
