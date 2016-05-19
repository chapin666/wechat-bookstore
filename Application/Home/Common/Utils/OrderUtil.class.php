<?php
namespace Home\Common\Utils;

class OrderUtil {

	public function getOrderId(){
		$orderId = date("Y-m-dH-i-s");
		$orderId = str_replace("-","", $orderId);
		$orderId .= rand(1000,999999);
		return $orderId;
	}

}