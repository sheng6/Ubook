<?php

namespace app\index\model;

use think\Model;
use think\Db;

class Index extends Model
{
	public function getCateListDefaule()
	{
		return Db::table('u_cate')->where([
			'is_default'	=>	1
		])->select();
	}

	public function getBookmarksListDefaule($cateId)
	{
		return Db::table('u_bookmarks')->where([
			'is_default'	=>	1,
			'cate_id' => $cateId
		])->select();
	}

	// 获取默认书签
	public function getList($cateArray)
	{
		$bookmarks = [];
		foreach ($cateArray as $key => &$value) {
			$value['bookmarks'] = $this->getBookmarksListDefaule($value['id']);
			$bookmarks[] = $value;
		}
		return $bookmarks;
	}
}