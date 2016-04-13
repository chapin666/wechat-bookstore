<?php
namespace Admin\Model;

class Book {

	public function save($data) {
		$c = M("book");
		return $c->add($data);
	}

}