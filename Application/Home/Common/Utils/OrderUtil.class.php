<?php
namespace Home\Common\Utils;

class OrderUtil {

	private $orderStatus = array(0=>'等待付款', 1=>"已付款", 2=>'等待收货', 3=>'申请取消订单', 4=>'订单已取消', 5=>'订单已签收');

	public function getOrderId(){
		$orderId = date("Y-m-dH-i-s");
		$orderId = str_replace("-","", $orderId);
		$orderId .= rand(1000,999999);
		return $orderId;
	}

	function getOrderStatuByCode($code) {
		return $this->orderStatus[$code];
	}

}