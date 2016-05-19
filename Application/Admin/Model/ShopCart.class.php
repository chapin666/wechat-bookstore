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



}