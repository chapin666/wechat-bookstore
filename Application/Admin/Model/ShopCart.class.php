<?php
namespace Admin\Model;

class ShopCart {

	// add
	public function add($data) {
		$s = M('shop_cart');
		$s->add($data);
	}



}