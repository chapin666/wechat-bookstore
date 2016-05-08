<?php
namespace Admin\Model;

class Book {

	// Add Model to DB
	public function add($data) {
		$c = M("book");
		return $c->add($data);
	}

	// Save Model to DB
	public function save($data) {
		$c = M("book");
		return $c->save($data);
	}

	// Get books fron DB
	public function findAll() {
		$result = M("book")
			->join("LEFT JOIN book_category as c  ON c.id = book.book_category_id")
			->field("book.*,  c.name as book_category_name")
			->select();
		return $result;
	}

	public function findBookById($id) {
		$c = M("book");
		return $c->join('attachment ON attachment.id = book.attachment_id' )
			  ->field("book.*, attachment.location")
			   ->where('book.id = ' .  $id)->find();
	}


	// delete a record from book table.
	public function delete($id) {
 		$c = M("book");
	    	return $c->where("id=".$id)->delete();
	}


	// count
	public function count() {
		$c = M("book");
		return $c->count();
	}

}