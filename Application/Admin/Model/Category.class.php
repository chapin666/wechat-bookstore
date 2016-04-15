<?php
namespace Admin\Model;

class Category {

	public function findList() {
		$c = M("book_category");
		return $c->select();
	}

	public function findCategoryByName($name) {
		$c = M("book_category");

		return $c->where('name = \\'' .  $name .'\\'')->find();
	}


	public function save($data) {
		$c = M("book_category");
		return $c->add($data);
	}

}