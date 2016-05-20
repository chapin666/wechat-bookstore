<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Model\Order;

class OrderController extends  Controller  {


	 public function sendOrder() {
        $id = I("id");
        $orderModel = new Order();
        $orderModel->changeOrderState($id, 2);
        $this->redirect('/Admin/Index/order'); 
    }
    




}