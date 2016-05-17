<?php
namespace Admin\Model;

class ShopCart {

	// add
	public funtion add($data) {
		$s = M('shop_cart');
		$s->add($data);
	}



}