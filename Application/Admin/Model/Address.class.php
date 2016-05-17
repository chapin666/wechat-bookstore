<?php 
namespace Admin\Model;

class Address {

	public function add($params, $userId) {
		$a = M('user_address');
		$address = array();
		$address['country'] = $params['country'];
		$address['province'] = $params['province'];
		$address['city'] = $params['city'];
		$address['user_uid'] = $userId;
		$a->add($address);
	}


	

}