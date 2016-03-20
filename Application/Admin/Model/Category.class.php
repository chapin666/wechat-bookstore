<?php
namespace Admin\Model;

class Category {

	public function findList() {
		$c = M("book_category");
		return $c->select();
	}


	public function save($data) {
		$c = M("book_category");
		return $c->add($data);
	}

}