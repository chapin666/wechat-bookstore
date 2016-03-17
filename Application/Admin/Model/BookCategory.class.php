<?php
namespace Admin\Model;

class BookCategory {

	public function findList() {
		$c = M("book_category");
		return $c->select();
	}

}