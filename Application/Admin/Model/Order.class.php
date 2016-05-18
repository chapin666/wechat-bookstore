<?php
namespace Admin\Model;

class Order {


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