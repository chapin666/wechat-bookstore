<?php
namespace Admin\Model;

class ShopCart {

	// add
	public function add($data) {
		$s = M('shop_cart');
		$s->add($data);
	}


	public function findCarByOrderId($orderId) {
		$s = M('shop_cart');
		return $s->join("JOIN book as b  ON b.id = shop_cart.book_id")
			->join("LEFT JOIN attachment as a  ON a.id = b.id")
			->where("order_id = '" . $orderId . "'")->select();
	}

	public function findSellMostBook() {
		$s = M('shop_cart');
		$books = $s->query('select book_id,count(*) as c from shop_cart group by book_id order by c desc limit 1');
		$id = $books[0]['book_id'];

		$c = M("book");
		return $c->where("id='" . $id . "'")->find();
	}



	public function findSellLessBook() {
		$s = M('shop_cart');
		$books = $s->query('select book_id,count(*) as c from shop_cart group by book_id order by c asc limit 1');
		$id = $books[0]['book_id'];

		$c = M("book");
		return $c->where("id='" . $id . "'")->find();
	}



}