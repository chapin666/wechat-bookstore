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

	// Get books fron DB
	public function findLimit($firstRow, $listRows) {
		$result = M("book")
			->join("LEFT JOIN book_category as c  ON c.id = book.book_category_id")
			->field("book.*,  c.name as book_category_name")
			->limit($firstRow, $listRows)
			->select();
		return $result;
	}

	public function findBookById($id) {
		$c = M("book");
		return $c->join('attachment ON attachment.id = book.attachment_id' )
			  ->field("book.*, attachment.location")
			   ->where('book.id = ' .  $id)->find();
	}


	public function findBookByCategoryId($id) {
		$c = M("book");
		return  $c->join('attachment ON attachment.id = book.attachment_id' )
			  ->field("book.*, attachment.location")
			   ->where('book.book_category_id = ' .  $id)->select();
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


	public function subBookTotal($bookId, $num) {
		$c = M("book");
		$book = $c->where("id='" . $bookId . "'")->find();
		$sell_count = $book['sell_count'] + $num;
		$total_count = $book['total_count'] - $num;
		$c->where("id='" . $bookId . "'")->setField("sell_count", $sell_count);
		$c->where("id='" . $bookId . "'")->setField("total_count", $total_count);
	}

}