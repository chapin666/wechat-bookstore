<?php
namespace Home\Controller;

use Home\Common\Constants\Constant;
use Home\Common\Controller\BaseController;
use Home\Common\Utils\CookieUtil;
use Home\Common\Utils\OrderUtil;
use Home\Common\Utils\Jssdk;
use Vendor\Wechat\Wechat;
use Admin\Model\ShopCart;
use Admin\Model\User;
use Admin\Model\Order;
use Admin\Model\Book;

class IndexController extends BaseController {

	/*
	 *  获取事件类型
	 */
	public function index() {
		$type = $this->weChat->getRev()->getRevType();
		switch($type) {
		    case Wechat::MSGTYPE_TEXT:
			    $this->weChat->text("我只是一个傻傻的机器人")->reply();
			    exit;
			    break;


		    case Wechat::MSGTYPE_EVENT:
			    $this->handleEvent();
			    exit;
			    break;


		    case Wechat::MSGTYPE_IMAGE:
			   
			    break;
		    default:
			    $this->weChat->text("help info")->reply();
		}
	}

	
	/*
	* 
	* 订阅/取消订阅事件
	*/
	private function handleEvent() {
		$eventObj = $this->weChat->getRev()->getRevEvent();
		$event = $eventObj['event'];
		$key = $eventObj['key'];
		
		switch ($event) {
			case Wechat::EVENT_SUBSCRIBE:
			
			// get user info by openId
			$openId = $this->weChat->getRevFrom();
			$info = $this->weChat->getUserInfo($openId);

			$userModel = new User();
			$userModel->add($info);

			$this->weChat->text("欢迎关注【微书店】，祝您购物愉快。" )->reply();
			break;
			case Wechat::EVENT_UNSUBSCRIBE:
			$openId = $this->weChat->getRevFrom();
			$userModel = new User();
			$userModel->delete($openId);
			$this->weChat->text("欢迎关注【微书店】，祝您购物愉快。您的ID为" . $authObject->openid)->reply();
			break;
			case Wechat::EVENT_MENU_CLICK:
			$this->menuEvent($key);			
			break;
		}
	}

	/*
	 * 菜单点击事件
	 */
	private function menuEvent($key) {
		switch ($key) {
			case Constant::MENU_0_0:
			
				break;
			case Constant::MENU_0_1:

				break;
			case Constant::MENU_0_2:

				break;
			case Constant::MENU_1_0:

				break;
			case Constant::MENU_1_1:

				break;
			case Constant::MENU_1_2:

				break;
			case Constant::MENU_2_0:
				$this->weChat->text('ok')->reply();
				break;
			case Constant::MENU_2_1:
				$this->weChat->text("您的个人信息")->reply();
				break;
			case Constant::MENU_2_2:
				$this->weChat->text("解绑帐号成功")->reply();
				break;
			default: 
			  	$this->weChat->text("发送指令：" . $key . "错误")->reply();
				break;	
		}
	}


	// 支付页面授权
	public function payment() {
		// save userInfo
		session('userName', $_POST['userName']);
		session('phoneNumber', $_POST['phoneNumber']);
		session('address', $_POST['address']);
		session('book_price_total', $_POST['book_price_total']);


		$url = $this->weChat->getOauthRedirect('http://bashrc.ngrok.cc/Home/Index/payresult', 1, 'snsapi_base');
		header("Location:" . $url); 
	}
	

	// 支付页面授权回调
	public function payresult() {
		
		$userName = session('userName');
		$phoneNumber = session('phoneNumber');
		$address = session('address');
		$book_price_total = session('book_price_total');

		// Get Code and state
		$queyString = explode("?", $_SERVER["REQUEST_URI"])[1];
		$parameters = explode("&", $queyString);
		$code = explode("=", $parameters[0])[1];
		$state = explode("=", $parameters[1])[1];
		// auth, get accessToken
		$accessToken = $this->weChat->getOauthAccessToken($code);


		// instance
		$cookieUtil = new CookieUtil();
		$userModel = new User();
		$orderModel = new Order();

		// 1 Get all order
		 $shopCartModel = new ShopCart();
		 $cookies = $cookieUtil->getAll();
		 $userId = $userModel->findUserByOpenId($accessToken['openid'])['uid'];


		 // 2 create order 
		 $orderUtil  = new OrderUtil();
		 $orderId = $orderUtil->getOrderId();


		 $order = array('name' => $userName, 'adress' => $address,
		 			'phone' => $phoneNumber, 'orderState' => 0,
		 			'order_id' => $orderId,  'user_uid' => $userId, 
		 			"create_time"=>date("Y-m-d H:i:s"), 'paymentWay'=>'微信支付',
		 			'total_price'=>$book_price_total);
		 $order_id = $orderModel->add($order);


		 // 3 save book item info to db
		 $books = array();
		 foreach ($cookies as $key => $value) {
		 	if ($key != "" && $value != "") {
		 		$bookNum = $value;
		 		$bookId = $key;
		 		$cart = array("book_id" => $bookId, 
		 			"user_id"=>$userId, 
		 			"amount" => $bookNum,
		 			"order_id" => $order_id,
		 			"create_time"=>date("Y-m-d H:i:s"));
		 		$shopCartModel->add($cart);
		 	}
		 }

		// delete cookie
		$cookieUtil->del();


		$this->success('新增成功', '/Home/Index/orderListAuth.html');
	}


	// 订单列表页面授权获openid
	public function orderListAuth() {
		$url = $this->weChat->getOauthRedirect('http://bashrc.ngrok.cc/Home/Index/orderList', 1, 'snsapi_base');
		header("Location:" . $url); 
	}


	// 订单页面回调列表
	public function orderList() {

		$userModel = new User();
		$orderModel = new Order();

		// Get Code and state
		$queyString = explode("?", $_SERVER["REQUEST_URI"])[1];
		$parameters = explode("&", $queyString);
		$code = explode("=", $parameters[0])[1];
		$state = explode("=", $parameters[1])[1];

		// auth, get accessToken
		$accessToken = $this->weChat->getOauthAccessToken($code);
		$userId = $userModel->findUserByOpenId($accessToken['openid'])['uid'];
		$orders = $orderModel->findOrderByUserId($userId);
		$this->assign("orders", $orders);
		$this->display();
	}



	public function selectAddress() {

		$jssdk = new Jssdk($this->options['appid'], $this->options['appsecret']);
		$datas = $jssdk->getSignPackage();


		 $this->assign("datas", $datas);
		 $this->display();
	}




}
