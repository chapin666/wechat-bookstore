<?php
namespace Admin\Model;

class Order {


	public function findOrderByUserId($userId) {
		$o = M('bookstore.order');
		return $o->where("user_uid = '"  . $userId . "'")
			->order('create_time desc')
			->select();
	}


	public function findOrderById($id) {
		$o = M('bookstore.order');
		return $o->where("id = '"  . $id . "'")->find();
	}


	public function findLimit($firstRow, $listRows) {
		$o = M('bookstore.order');
		return $o->limit($firstRow, $listRows)->select();
	}


	// add 
	public function add($data) {
		$o = M('bookstore.order');
		return $o->add($data);
	}

	// count
	public function count() {
		$o = M("bookstore.order");
		return $o->count();
	}

}